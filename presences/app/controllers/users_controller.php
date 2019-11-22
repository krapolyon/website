<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->paginate['order'] = array('User.name' => 'asc');
		$this->set('users', $this->paginate());	
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Utilisateur invalide.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('Utilisateur enregistré', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Un problème est survenu : l\'utilisateur n\'est pas enregistré', true));
			}
		}
		$groups = $this->User->Group->find('list', array('order' => 'id ASC'));
		$this->set(compact('groups'));
	}

	function admin_edit($id = null) {		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Utilisateur invalide', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			// Mot de passe
			if($this->data['User']['password']=='2955b3f4765b0697dd30a2f241dc0834a1d08b46') unset($this->data['User']['password']);
						
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('Utilisateur enregistré', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Un problème est survenu : l\'utilisateur n\'est pas enregistré', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list', array('order' => 'id ASC'));
		$this->set(compact('groups'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('Utilisateur supprimé', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function login() {
        if (!empty($this->data)) {
            $someone = $this->User->findByUsername($this->data['User']['username']);
            if(!empty($someone['User']['password']) && $someone['User']['password'] == $this->data['User']['password']) {
                $this->Session->write('User', $someone['User']);
                $this->redirect('/admin/');
            }
            else {
                $this->Session->setFlash(__('Login ou mot de passe incorrect.', true));
            }
        }
	}
	
	function admin_login() {
        if (!empty($this->data)) {
            $someone = $this->User->findByUsername($this->data['User']['username']);
            if(!empty($someone['User']['password']) && $someone['User']['password'] == $this->data['User']['password']) {
                $this->Session->write('User', $someone['User']);
                $this->redirect('/admin/');
            }
            else {
                $this->Session->setFlash(__('Login ou mot de passe incorrect.', true));
            }
        }
	}
	
	function logout() {
		$this->Session->del('Permissions');
		$this->Session->destroy();
		$this->redirect('/');
	}
	
	function admin_logout() {
		$this->Session->del('Permissions');
		$this->Session->destroy();
		$this->redirect('/');
	}
	
}
?>
