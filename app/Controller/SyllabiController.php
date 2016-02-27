<?php
App::uses('AppController', 'Controller');

class SyllabiController extends AppController {

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
	                        'Syllabus.title LIKE' => '%' . $keyword . '%',
	                        'Syllabus.filename LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->Syllabus->recursive = 1;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('Syllabus.class_name_id'),
        );

        $this->set('keyword', $keyword);
		$this->set('syllabi', $this->Paginator->paginate());
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Syllabus']['file']['name'])) {
                $file_name = $this->_upload_file($this->request->data['Syllabus']['file'], 'syllabi');
                if(!$file_name) {
					$this->Session->setFlash(__('You must upload a pdf file.'));
					return $this->redirect(array('action' => 'add'));
                }
                $this->request->data['Syllabus']['file'] = $file_name;
            } else {
                unset($this->request->data['Syllabus']['file']);
            }
			$this->Syllabus->create();
			if ($this->Syllabus->save($this->request->data)) {
				$this->Session->setFlash(__('The syllabus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The syllabus could not be saved. Please, try again.'));
			}
		}
		$classNames = $this->Syllabus->ClassName->find('list');
		$this->set(compact('classNames'));
	}

	public function admin_edit($id = null) {
		if (!$this->Syllabus->exists($id)) {
			throw new NotFoundException(__('Invalid syllabus'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (!empty($this->request->data['Syllabus']['file'])) {
                if (!empty($this->request->data['Syllabus']['file']['name'])) {
	                $file_name = $this->_upload_file($this->request->data['Syllabus']['file'], 'syllabi');
	                if(!$file_name) {
						$this->Session->setFlash(__('You must upload a pdf file.'));
						return $this->redirect(array('action' => 'add'));
	                }
	                $this->request->data['Syllabus']['file'] = $file_name;
	            } else {
                    $options = array('conditions' => array('Syllabus.' . $this->Syllabus->primaryKey => $id));
                    $data = $this->Syllabus->find('first', $options);
                    $this->request->data['Syllabus']['file'] = $data['Syllabus']['file'];
                }
            } else {
                unset($this->request->data['Syllabus']['file']);
            }
            $this->Syllabus->id = $id;
			if ($this->Syllabus->save($this->request->data)) {
				$this->Session->setFlash(__('The syllabus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The syllabus could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Syllabus.' . $this->Syllabus->primaryKey => $id));
			$this->request->data = $this->Syllabus->find('first', $options);
		}
		$classNames = $this->Syllabus->ClassName->find('list');
		$this->set(compact('classNames'));
	}

	public function admin_delete($id = null) {
		$this->Syllabus->id = $id;
		if (!$this->Syllabus->exists()) {
			throw new NotFoundException(__('Invalid syllabus'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Syllabus->delete()) {
			$this->Session->setFlash(__('The syllabus has been deleted.'));
		} else {
			$this->Session->setFlash(__('The syllabus could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function public_display () {
		$this->Syllabus->recursive = 1;
        $syllabi = $this->Syllabus->find('all', array(
            	'order' => array('Syllabus.class_name_id', 'Syllabus.modified DESC')
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

        $this->set(compact('syllabi'));
        $this->layout = 'public';
        $this->render('../Pages/syllabus');
	}
}
