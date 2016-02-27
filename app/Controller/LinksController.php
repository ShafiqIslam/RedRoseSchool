<?php
App::uses('AppController', 'Controller');

class LinksController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('videos', 'games');
    }

	public function admin_index() {
		$conditions = array();
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'Link.name LIKE' => '%' . $keyword . '%',
	                        'Link.type LIKE' => '%' . $keyword . '%',
	                        'Link.link LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->Link->recursive = 0;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('Link.created' => 'DESC'),
        );

		$this->set('links', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Link']['image']['name'])) {
                $file_name = $this->_upload($this->request->data['Link']['image'], 'link_photos');
                $this->request->data['Link']['image'] = $file_name;
            } else {
                unset($this->request->data['Link']['image']);
            }
			$this->Link->create();
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('The link has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->Link->exists($id)) {
			throw new NotFoundException(__('Invalid link'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (!empty($this->request->data['Link']['image'])) {
                if (!empty($this->request->data['Link']['image']['name'])) {
	                $file_name = $this->_upload($this->request->data['Link']['image'], 'link_photos');
	                $this->request->data['Link']['image'] = $file_name;
	            } else {
                    $options = array('conditions' => array('Link.' . $this->Link->primaryKey => $id));
                    $data = $this->Link->find('first', $options);
                    $this->request->data['Link']['image'] = $data['Link']['image'];
                }
            } else {
                unset($this->request->data['Link']['image']);
            }
            $this->Link->id = $id;
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('The link has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Link.' . $this->Link->primaryKey => $id));
			$this->request->data = $this->Link->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Link->id = $id;
		if (!$this->Link->exists()) {
			throw new NotFoundException(__('Invalid link'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Link->delete()) {
			$this->Session->setFlash(__('The link has been deleted.'));
		} else {
			$this->Session->setFlash(__('The link could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function videos($id=null) {
		$videos = $this->Link->find('all', array('conditions'=>array('Link.type'=>'Videos')));
		if($id==null) {
			$id = $videos[0]['Link']['id'];
		}
		
		$video = $this->Link->find('first', array('conditions'=>array('Link.id'=>$id)));
		
		if($video['Link']['type']!="Videos") {
			return $this->redirect(array('action' => 'videos'));
		}

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
        $this->set(compact('id', 'videos', 'video'));

		$this->render("../Pages/videos");

	}

	public function games() {
		$games = $this->Link->find('all', array('conditions'=>array('Link.type'=>'games')));

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
        $this->set(compact('id', 'games'));
		$this->render("../Pages/games");

	}
}
