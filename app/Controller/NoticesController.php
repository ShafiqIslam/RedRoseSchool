<?php
App::uses('AppController', 'Controller');

class NoticesController extends AppController {

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
	                        'Notice.title LIKE' => '%' . $keyword . '%',
	                        'Notice.notice LIKE' => '%' . $keyword . '%',
	                        'Notice.created LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->Notice->recursive = 0;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('Notice.created' => 'DESC'),
        );

		$this->set('notices', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			//AuthComponent::_setTrace($this->request->data);
			if (!empty($this->request->data['Notice']['featured_img']['name'])) {
                $file_name = $this->_upload($this->request->data['Notice']['featured_img'], 'feature_photos');
                $this->request->data['Notice']['featured_img'] = $file_name;
            } else {
                unset($this->request->data['Notice']['featured_img']);
            }
			$this->Notice->create();
			if ($this->Notice->save($this->request->data)) {
				$this->Session->setFlash(__('The notice has been published.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notice could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (!empty($this->request->data['Notice']['featured_img'])) {
                if (!empty($this->request->data['Notice']['featured_img']['name'])) {
	                $file_name = $this->_upload($this->request->data['Notice']['featured_img'], 'feature_photos');
	                $this->request->data['Notice']['featured_img'] = $file_name;
	            } else {
                    $options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
                    $data = $this->Notice->find('first', $options);
                    $this->request->data['Notice']['featured_img'] = $data['Notice']['featured_img'];
                }
            } else {
                unset($this->request->data['Notice']['featured_img']);
            }
            $this->Notice->id = $id;
			if ($this->Notice->save($this->request->data)) {
				$this->Session->setFlash(__('The notice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
			$this->request->data = $this->Notice->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Notice->id = $id;
		if (!$this->Notice->exists()) {
			throw new NotFoundException(__('Invalid notice'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Notice->delete()) {
			$this->Session->setFlash(__('The notice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The notice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function public_display($id=null) {
		#AuthComponent::_setTrace($id);
		$page = $subpage = $title_for_layout = null;

		$this->loadModel('News');
		$this->News->recursive = 0;
		$latest_news = $this->News->find('all', array(
			'order' => 'News.created DESC',
			'limit' => 5
		));
		$this->set(compact('latest_news'));

		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->layout = "public";
		$data = $this->Notice->find('all',array(
            'order' => array('Notice.created'),
            'limit' => 10
        ));
        $this->set(compact('id', 'data'));
		$this->render("../Pages/notice");
	}
}
