<?php
App::uses('AppController', 'Controller');

class SuggestionsController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('public_display');
    }

	public function admin_index() {
		$conditions = array();
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'Suggestion.title LIKE' => '%' . $keyword . '%',
	                        'Suggestion.filename LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->Suggestion->recursive = 1;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('Suggestion.class_name_id'),
        );

        $this->set('keyword', $keyword);
		$this->set('suggestions', $this->Paginator->paginate());
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Suggestion']['file']['name'])) {
                $file_name = $this->_upload_file($this->request->data['Suggestion']['file'], 'suggestions');
                if(!$file_name) {
					$this->Session->setFlash(__('You must upload a pdf file.'));
					return $this->redirect(array('action' => 'add'));
                }
                $this->request->data['Suggestion']['file'] = $file_name;
            } else {
                unset($this->request->data['Suggestion']['file']);
            }
			$this->Suggestion->create();
			if ($this->Suggestion->save($this->request->data)) {
				$this->Session->setFlash(__('The suggestion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The suggestion could not be saved. Please, try again.'));
			}
		}
		$classNames = $this->Suggestion->ClassName->find('list');
		$this->set(compact('classNames'));
	}

	public function admin_edit($id = null) {
		if (!$this->Suggestion->exists($id)) {
			throw new NotFoundException(__('Invalid suggestion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (!empty($this->request->data['Suggestion']['file'])) {
                if (!empty($this->request->data['Suggestion']['file']['name'])) {
	                $file_name = $this->_upload_file($this->request->data['Suggestion']['file'], 'suggestions');
	                if(!$file_name) {
						$this->Session->setFlash(__('You must upload a pdf file.'));
						return $this->redirect(array('action' => 'add'));
	                }
	                $this->request->data['Suggestion']['file'] = $file_name;
	            } else {
                    $options = array('conditions' => array('Suggestion.' . $this->Suggestion->primaryKey => $id));
                    $data = $this->Suggestion->find('first', $options);
                    $this->request->data['Suggestion']['file'] = $data['Suggestion']['file'];
                }
            } else {
                unset($this->request->data['Suggestion']['file']);
            }
            $this->Suggestion->id = $id;
			if ($this->Suggestion->save($this->request->data)) {
				$this->Session->setFlash(__('The suggestion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The suggestion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Suggestion.' . $this->Suggestion->primaryKey => $id));
			$this->request->data = $this->Suggestion->find('first', $options);
		}
		$classNames = $this->Suggestion->ClassName->find('list');
		$this->set(compact('classNames'));
	}

	public function admin_delete($id = null) {
		$this->Suggestion->id = $id;
		if (!$this->Suggestion->exists()) {
			throw new NotFoundException(__('Invalid suggestion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Suggestion->delete()) {
			$this->Session->setFlash(__('The suggestion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The suggestion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function public_display () {
		$this->Suggestion->recursive = 1;
        $suggestions = $this->Suggestion->find('all', array(
            	'order' => array('Suggestion.class_name_id','Suggestion.modified DESC')
            )
        );

        $page = $subpage = $title_for_layout = 'academic';
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        $this->loadModel('News');
		$this->News->recursive = 0;
		$latest_news = $this->News->find('all', array(
			'order' => 'News.created DESC',
			'limit' => 5
		));
		$this->set(compact('latest_news'));

        $this->set(compact('suggestions'));
        $this->layout = 'public';
        $this->render('../Pages/suggestions');
	}
}
