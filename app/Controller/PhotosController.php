<?php
App::uses('AppController', 'Controller');

class PhotosController extends AppController {

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
	                        'Photo.image LIKE' => '%' . $keyword . '%',
	                        'Photo.caption LIKE' => '%' . $keyword . '%',
	                        'Photo.description LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->Photo->recursive = 1;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('Photo.created' => 'DESC'),
        );

		$this->set('photos', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Photo']['image']['name'])) {
                $file_name = $this->_upload($this->request->data['Photo']['image'], 'upload_photos');
                $this->request->data['Photo']['image'] = $file_name;
            } else {
                unset($this->request->data['Photo']['image']);
            }
			$this->Photo->create();
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
            if (!empty($this->request->data['Photo']['image'])) {
                if (!empty($this->request->data['Photo']['image']['name'])) {
	                $file_name = $this->_upload($this->request->data['Photo']['image'], 'upload_photos');
	                $this->request->data['Photo']['image'] = $file_name;
	            } else {
                    $options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
                    $data = $this->Photo->find('first', $options);
                    $this->request->data['Photo']['image'] = $data['Photo']['image'];
                }
            } else {
                unset($this->request->data['Photo']['image']);
            }

            $this->Photo->id = $id;
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		} else {
			$this->loadModel('SliderImage');
			$result = $this->SliderImage->find('all', array(
					'conditions' => array('SliderImage.photo_id' => $id)
				)
			);
			if(!empty($result)) {
				$this->set('is_slider', true);
			} else {
				$this->set('is_slider', false);
			}
			$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
			$this->request->data = $this->Photo->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$this->request->allowMethod('post', 'delete');
		$this->Photo->recursive = 1;
		if ($this->Photo->delete()) {
			$this->Session->setFlash(__('The photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_add_to_slider($id=null) {
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$this->request->allowMethod('post', 'delete');
		$this->loadModel('SliderImage');

		$orders = $this->SliderImage->find('all', array(
			"fields" => array('MAX(SliderImage.order) as max_order')
		));
		$data['SliderImage']['order'] = $orders[0][0]['max_order'] + 1;
		$data['SliderImage']['photo_id'] = $id;
		$this->SliderImage->create();
		if ($this->SliderImage->save($data)) {
			$this->Session->setFlash(__('The photo has been added to slider.'));
		} else {
			$this->Session->setFlash(__('The photo could not be added to slider. Please, try again.'));
		}
		return $this->redirect(array('action' => 'edit', $id));
	}

	public function public_display($type=0) {
		$path = func_get_args();
		$type = !empty($path) ? $path[0] : 0;
		$page = $subpage = $title_for_layout = "gallery";

		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->layout = "public";
		
		$this->Photo->recursive = -1;
		$data = $this->Photo->find('all', array(
			'conditions' => array('Photo.type' => $type),
            'order' => array('Photo.created'),
            'limit' => 10
        ));

        $this->loadModel('News');
		$this->News->recursive = 0;
		$latest_news = $this->News->find('all', array(
			'order' => 'News.created DESC',
			'limit' => 5
		));
		$this->set(compact('latest_news'));

        #AuthComponent::_setTrace($data);
        $this->set(compact('type', 'data'));
		$this->render("../Pages/gallery");
	}
}
