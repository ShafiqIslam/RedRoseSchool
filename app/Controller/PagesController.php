<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array();

	public function display($arg1 = null, $arg2 = null) {
		echo "live push testing..."; die();
		$this->layout = "public";
		$path = func_get_args();
		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$this->loadModel('General');
		$this->General->recursive = 0;
		$general_data = $this->General->find('first');
		$this->set(compact('general_data'));

		$this->loadModel('SliderImage');
		$this->SliderImage->recursive = 0;
		$sliderImages = $this->SliderImage->find('all',array(
            'order' => array('SliderImage.order')
        ));
		$this->set(compact('sliderImages'));

		$this->loadModel('News');
		$this->News->recursive = 0;
		$latest_news = $this->News->find('all', array(
			'order' => 'News.created DESC',
			'limit' => 5
		));
		$this->set(compact('latest_news'));

		$this->loadModel('Notice');
		$this->Notice->recursive = 0;
		$notices = $this->Notice->find('all',array(
            'order' => array('Notice.created'),
            'limit' => 5
        ));
		$this->set(compact('notices'));

		$this->loadModel('CalendarEntry');
		$this->CalendarEntry->recursive = 0;
		$calendar_entries = $this->CalendarEntry->find('all');
		foreach ($calendar_entries as $key => $item) {
			if(empty($item['CalendarEntry']['date'])) $item['CalendarEntry']['date'] = "1990-01-01";
			if(empty($item['CalendarEntry']['title'])) $item['CalendarEntry']['title'] = "";
			if(empty($item['CalendarEntry']['entry'])) $item['CalendarEntry']['entry'] = "";

			$calendar_data[$key]['date'] = $item['CalendarEntry']['date'] . " 00:00:00";
			$calendar_data[$key]['title'] = $item['CalendarEntry']['title'];
			$calendar_data[$key]['description'] = $item['CalendarEntry']['entry'];
		}
		#AuthComponent::_setTrace($calendar_data);
		$this->set(compact('calendar_data'));

		$this->loadModel('Link');
		$this->Link->recursive = 0;
		$links = $this->Link->find('all',array(
            'conditions' => array('Link.type' => 'Important'),
            'limit' => 10
        ));
        $all_links = $this->Link->find('all');
		$this->set(compact('links'));
		$this->set(compact('all_links'));

		$this->loadModel('ClassName');
		$this->ClassName->recursive = 0;
		$classNames = $this->ClassName->find('list');
		$this->set(compact('classNames'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
