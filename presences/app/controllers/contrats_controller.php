<?php
class ContratsController extends AppController {

	var $name = 'Contrats';
	var $helpers = array('Html', 'Form', 'Javascript', 'DatePicker');
	var $components = array('Email');

	function beforeFilter() {
		// Liste des pages o� l'authentification n'est pas requise
		$this->Auth->allow(array('view', 'index'));
	}

  // méthode interne pour retourner une liste de fanfarons selon leur presences au contrat $id
  function fanfarons($contratId) {

    $result['valide'] = 1;
		// Calcul des pr�sents
		$instrus = $this->Contrat->Fanfaron->Instrument->find("list");
		foreach($instrus as $instrument_id => $instrument_name) {
			$presents[$instrument_id]['instrument'] =  $instrument_name;
			$contrats_fanfarons = $this->Contrat->ContratsFanfaron->find("all",
				array(
					"recursive" => 0,
					"conditions" => "Fanfaron.instrument_id = ".$instrument_id." AND contrat_id=".$contratId." AND statut='Oui'",
  					"order" => 'instrument_id'
				)
			);

			$peutetres[$instrument_id]['instrument'] =  $instrument_name;
			$contrats_fanfarons_pe = $this->Contrat->ContratsFanfaron->find("all",
				array(
					"recursive" => 0,
					"conditions" => "Fanfaron.instrument_id = ".$instrument_id." AND contrat_id=".$contratId." AND statut LIKE 'P%'",
						"order" => 'instrument_id'
				)
			);

      if ($instrument_id != 7 and empty($contrats_fanfarons)) {
        $result['valide'] = 0;
      } 
			foreach($contrats_fanfarons as $contrats_fanfaron) {
				if(!isset($presents[$instrument_id]['fanfarons'])) {
					$presents[$instrument_id]['fanfarons'] = $contrats_fanfaron['Fanfaron']['name'];
				}
				else {
					$presents[$instrument_id]['fanfarons'] .= ", ".$contrats_fanfaron['Fanfaron']['name'];
				}
			}

			 foreach($contrats_fanfarons_pe as $contrats_fanfaron_pe) {
				 if(!isset($peutetres[$instrument_id]['fanfarons'])) {
					 $peutetres[$instrument_id]['fanfarons'] = $contrats_fanfaron_pe['Fanfaron']['name'];
				 }
				 else {
					 $peutetres[$instrument_id]['fanfarons'] .= ", ".$contrats_fanfaron_pe['Fanfaron']['name'];
				 }
			 }
    }

    $result['presents'] = $presents;
    $result['peutetres'] = $peutetres;
    return  $result;
  }

  function index() {

		$this->Contrat->recursive = 0;
		$this->paginate = array(
					"conditions" => "date_debut>=CURDATE() OR date_fin>=CURDATE()",
					  "recursive" => 1,
					  "order" => 'date_debut'
			);
		$contrats = $this->paginate();

    $presents = array(-1 => '');
    $peutetres = array(-1 => '');
    foreach ($contrats as $contrat) {
      $id = $contrat['Contrat']['id'];
      $fanfarons = $this->fanfarons($id);
      $presents[$id] = $fanfarons['presents'];
      $peutetres[$id] = $fanfarons['peutetres'];
      $valide[$id] = $fanfarons['valide'];
    }
		$this->set('presents', $presents);
		$this->set('peutetres', $peutetres);
    $this->set('contrats', $contrats);
    $this->set('valide', $valide);
  }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Contrat.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Contrat->recursive = 0;
		$this->set('contrat', $this->Contrat->read(null, $id));
    
    $fanfarons = $this->fanfarons($id);
		$this->set('presents', $fanfarons['presents']);
		$this->set('peutetres', $fanfarons['peutetres']);

	}

	function admin_index() {
		$this->Contrat->recursive = 0;
		$this->paginate = array(
					'order' => array('date_debut' => 'desc')
			);

		$contrats = $this->paginate();

		foreach ($contrats as &$contrat) {
			// Nombre de pr�sents
			$cond = "contrat_id = '".$contrat['Contrat']['id']."'";
            $contrat['Contrat']['presents'] = $this->Contrat->ContratsFanfaron->findCount($cond);

            // Jouable ?
            $contrat['Contrat']['jouable'] = "peut �tre";
		}

		$this->set('contrats', $contrats);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Contrat.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('contrat', $this->Contrat->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Contrat->create();
			if ($this->Contrat->save($this->data)) {
				$this->Session->setFlash(__('The Contrat has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Contrat could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Contrat', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Contrat->save($this->data)) {
				$this->Session->setFlash(__('The Contrat has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Contrat could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Contrat->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Contrat', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contrat->del($id)) {
			$this->Session->setFlash(__('Contrat deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function admin_relancer($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Contrat invalide', true));
			$this->redirect(array('action'=>'index'));
		}
		elseif (!empty($this->data)) {
			// Envoi du mail
			// On ne garde que les helpers utiles pour le template de mail
			$this->helpers = array('Html');
			// envoi de l'email
			$this->Email->to = $this->data['Contrat']['to'];
   			$this->Email->from = $this->data['Contrat']['from'];
    		$this->Email->subject = $this->data['Contrat']['subject'];
    		$this->Email->replyTo = $this->data['Contrat']['from'];
		    $this->Email->template = 'default';
		    $this->Email->sendAs = 'both';
		    $this->Email->charset = 'iso-8859-1';

		    $this->set('message', $this->data['Contrat']['message']);

		    if($this->Email->send()) {
		    	$this->Session->setFlash(__('Mail de relance envoy�', true));

		    	// Mise � jour de la date d'envoi
		    	$this->data = $this->Contrat->read(null, $id);
		  		$this->data['Contrat']['relance'] = date("d/m/Y");
				$this->Contrat->save($this->data);
		    }
		    else {
		    	$this->Session->setFlash(__('Envoi du mail de relance �chou�', true));
		    }

		    $this->redirect(array('action'=>'admin_index'));
		    exit();
		}


		// Premi�re arriv�e sur la page
		$this->data = $this->Contrat->read(null, $id);
	    $subject = "[Relance] Pr�sence au plan : ".$this->data['Contrat']['title'];
	    $from = $_SESSION['Auth']['User']['email'];

	    // Ensemble des gens qui n'ont pas r�pondus
	    $to = "";
		$fanfarons = $this->Contrat->Fanfaron->find("all");

	    foreach($fanfarons as $fanfaron) {
	    	$repondu = 0;
	    	foreach($fanfaron['Contrat'] as $contrat) {
	    		if($contrat['id'] != $id) continue;
	    		if($contrat['ContratsFanfaron']['statut'] != "") {
	    			$repondu = 1;
	    		}
	    	}
	    	if($repondu == 0) {
	    		$to .= $fanfaron['Fanfaron']['email'].", ";
	    	}
	    }

		$message = "Chers Krapos,\n\nMerci de pr�ciser votre pr�sence au plan \"".$this->data['Contrat']['title']."\"\n\n";
		$message .="http://krapolyon.free.fr/presences/index.php/contrats/view/".$id."\n\n";
		$message .="Bises,\n".$_SESSION['Auth']['User']['firstname']."\n";

		$this->set('contrat_id', $id);
		$this->set(compact('message', 'to', 'from', 'subject'));
	}
}
?>
