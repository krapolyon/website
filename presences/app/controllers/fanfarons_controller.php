<?php
class FanfaronsController extends AppController {

	var $name = 'Fanfarons';
	var $helpers = array('Html', 'Form');

	function beforeFilter() {
		// Liste des pages oï¿½ l'authentification n'est pas requise
		$this->Auth->allow(array('menu', 'index', 'edit', 'edit_presence', 'new_presence'));
	}

	function index() {
		if($this->Session->read('isAdministrateur')) {
			$this->redirect('/admin/');
		}

		$this->Fanfaron->recursive = 1;
		$this->paginate = array(
					'limit' => 120,
					'order' => array('Fanfaron.instrument_id' => 'asc','Fanfaron.name' => 'asc')
			);

		$fanfarons = $this->paginate();
		$this->set('fanfarons', $fanfarons);

		$contrats = $this->Fanfaron->Contrat->find("all",
				array(
					"conditions" => "date_debut>=CURDATE() OR date_fin>=CURDATE()",
					  "recursive" => 1,
					  "order" => 'date_debut'
				)
			);

		// Calcul des prï¿½sents
		$instruments = $this->Fanfaron->Instrument->find("list");

		foreach($contrats as &$contrat) {
			$contrat['OK'] = 1;
			$contrat['Presents']['oui'] = 0;
			$contrat['Presents']['peutetre'] = 0;
			foreach($instruments as $instrument_id => $instrument_name) {
				$contrat['Instrument'][$instrument_id]['name'] = $instrument_name;
				$contrat['Instrument'][$instrument_id]['oui'] = $this->Fanfaron->ContratsFanfaron->find("count",
					array(
						"recursive" => 1,
						"conditions" => "Fanfaron.instrument_id = ".$instrument_id." AND contrat_id=".$contrat['Contrat']['id']." AND statut='Oui'"
					)
				);
				$contrat['Instrument'][$instrument_id]['peutetre'] = $this->Fanfaron->ContratsFanfaron->find("count",
					array(
						"recursive" => 1,
						"conditions" => "Fanfaron.instrument_id = ".$instrument_id." AND contrat_id=".$contrat['Contrat']['id']." AND statut LIKE 'P%'"
					)
				);
				$contrat['Presents']['oui'] += $contrat['Instrument'][$instrument_id]['oui'];
				$contrat['Presents']['peutetre'] += $contrat['Instrument'][$instrument_id]['peutetre'];

			}

			foreach($contrat['Instrument'] as $instru_id => &$instru) {
				if($instru['oui'] == 0) {
					// Recherche de supplï¿½ant

					$suppleants = $this->Fanfaron->FanfaronsInstrument->find("all",
						array(
							"recursive" => 2,
							"conditions" => "instrument_id = ".$instru_id
						)
					);
					foreach($suppleants as $suppleant) {
						$suppleant_f = $this->Fanfaron->read(null, $suppleant['FanfaronsInstrument']['fanfaron_id']);

						if($contrat['Instrument'][$suppleant_f['Fanfaron']['instrument_id']]['oui'] > 1) {

							foreach($contrat['Fanfaron'] as &$fanfaron) {
								if($fanfaron['ContratsFanfaron']['fanfaron_id'] == $suppleant['FanfaronsInstrument']['fanfaron_id']) {
									if($fanfaron['ContratsFanfaron']['statut'] == "Oui") {
										$fanfaron['ContratsFanfaron']['statut'] = "Oui (".$instru['name'].")";
										$instru['oui'] = "1 (".$suppleant_f['Fanfaron']['name'].")";
										$contrat['Instrument'][$suppleant_f['Fanfaron']['instrument_id']]['oui'] -= 1;
										break;
									}
									else {
										// Supplï¿½ant non prï¿½sent
									}
								}
							}
							break;
						}
					}
				}
			}

			foreach($contrat['Instrument'] as $instru_id => &$instru) {
				if($instru['oui'] == 0 && $instru_id != 7) {
				//if($instru['oui'] == 0) {
        		// Contrat non assurï¿½
					$contrat['OK'] = 0;
					break;
				}
			}
		}

		// On rï¿½cupï¿½re les ENUM
		$statuts = $this->Fanfaron->ContratsFanfaron->getEnumValues('statut');
		$this->set('statuts', $statuts);


		$this->set('contrats', $contrats);
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Id invalide', true));
			$this->redirect(array('action'=>'index'));
		}

		if (!empty($this->data)) {
			foreach($this->data['ContratsFanfaron'] as $presence) {
				$this->Fanfaron->ContratsFanfaron->save($presence);
			}

				$this->Session->setFlash(__('Merci', true));
				$this->redirect(array('action'=>'index'));

		} else {
			$this->data = $this->Fanfaron->read(null, $id);
		}

		$contrats = $this->Fanfaron->Contrat->find("all",
				array(
					"conditions" => "date_debut>=CURDATE()",
					  "recursive" => 1,
					  "order" => 'date_debut'
				)
			);
		$this->set('contrats', $contrats);

		// On rï¿½cupï¿½re les ENUM
		$statuts = $this->Fanfaron->ContratsFanfaron->getEnumValues('statut');
		$this->set('statuts', $statuts);

	}

	function edit_presence($presence_id, $statut) {
		if($presence_id != null && $statut != "") {
			$this->data = $this->Fanfaron->ContratsFanfaron->read(null, $presence_id);

			if($statut == "Peut-%C3%AAtre") {
				$statut = "Peut-être";
			}
			$this->data['ContratsFanfaron']['statut'] = $statut;
			$this->data['ContratsFanfaron']['ip'] = $_SERVER['REMOTE_ADDR'];
			if ($this->Fanfaron->ContratsFanfaron->save($this->data)) {
				$this->Session->setFlash(__('Statut changÃ©. Merci.', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Problï¿½me : statut non changï¿½', true));
			}
		}
	}

	function new_presence($contrat_id, $fanfaron_id, $statut) {
		if($contrat_id != null && $fanfaron_id != null && $statut != "") {

			if($statut == "Peut-%C3%AAtre") {
				$statut = "Peut-être";
			}
			$this->Fanfaron->ContratsFanfaron->create();
			$this->data['ContratsFanfaron']['statut'] = $statut;
			$this->data['ContratsFanfaron']['fanfaron_id'] = $fanfaron_id;
			$this->data['ContratsFanfaron']['contrat_id'] = $contrat_id;
			$this->data['ContratsFanfaron']['ip'] = $_SERVER['REMOTE_ADDR'];
			if ($this->Fanfaron->ContratsFanfaron->save($this->data)) {
				$this->Session->setFlash(__('Statut changÃ©. Merci.', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Problï¿½me : statut non changï¿½', true));
			}
		}
	}

	function admin_index() {
		$this->Fanfaron->recursive = 1;
		$this->paginate = array(
					'order' => array('Fanfaron.name' => 'asc')
			);
		$this->set('fanfarons', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Fanfaron.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('fanfaron', $this->Fanfaron->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Fanfaron->create();
			if ($this->Fanfaron->save($this->data)) {
				$this->Session->setFlash(__('The Fanfaron has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Fanfaron could not be saved. Please, try again.', true));
			}
		}
		$instruments = $this->Fanfaron->Instrument->find('list');
		$autre_instruments = $this->Fanfaron->AutreInstrument->find('list');
		$this->set(compact('contrats', 'instruments','autre_instruments'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Fanfaron', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Fanfaron->save($this->data)) {
				$this->Session->setFlash(__('The Fanfaron has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Fanfaron could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Fanfaron->read(null, $id);
		}
		$instruments = $this->Fanfaron->Instrument->find('list');
		$autre_instruments = $this->Fanfaron->AutreInstrument->find('list');
		$this->set(compact('contrats', 'instruments','autre_instruments'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Fanfaron', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Fanfaron->del($id)) {
			$this->Session->setFlash(__('Fanfaron deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

  function menu() {
		$this->paginate = array(
					'limit' => 120,
					'order' => array('Fanfaron.instrument_id' => 'asc','Fanfaron.name' => 'asc')
			);
		$this->set('fanfarons', $this->paginate());
  }

}
?>
