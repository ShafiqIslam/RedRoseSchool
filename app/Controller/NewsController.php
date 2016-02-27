<?php
App::uses('AppController', 'Controller');

class NewsController extends AppController {

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
	                        'News.title LIKE' => '%' . $keyword . '%',
	                        'News.news LIKE' => '%' . $keyword . '%',
	                        'News.created LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->News->recursive = 0;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('News.created' => 'DESC'),
        );

		$this->set('news', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			//AuthComponent::_setTrace($this->request->data);
			if (!empty($this->request->data['News']['featured_img']['name'])) {
                $file_name = $this->_upload($this->request->data['News']['featured_img'], 'feature_photos');
                $this->request->data['News']['featured_img'] = $file_name;
            } else {
                unset($this->request->data['News']['featured_img']);
            }
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The News has been published.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The News could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid News'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (!empty($this->request->data['News']['featured_img'])) {
                if (!empty($this->request->data['News']['featured_img']['name'])) {
	                $file_name = $this->_upload($this->request->data['News']['featured_img'], 'feature_photos');
	                $this->request->data['News']['featured_img'] = $file_name;
	            } else {
                    $options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
                    $data = $this->News->find('first', $options);
                    $this->request->data['News']['featured_img'] = $data['News']['featured_img'];
                }
            } else {
                unset($this->request->data['News']['featured_img']);
            }
            $this->News->id = $id;
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The News has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The News could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->News->delete()) {
			$this->Session->setFlash(__('The news has been deleted.'));
		} else {
			$this->Session->setFlash(__('The news could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function public_display($id=null) {
		$page = $subpage = $title_for_layout = null;

		$this->News->recursive = 0;
		$latest_news = $this->News->find('all', array(
			'order' => 'News.created DESC',
			'limit' => 5
		));
		$this->set(compact('latest_news'));

		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->layout = "public";
		$data = $this->News->find('all',array(
            'order' => array('News.created'),
            'limit' => 10
        ));
        $this->set(compact('id', 'data'));
		$this->render("../Pages/news");
	}
}
