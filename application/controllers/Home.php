<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_controller {

	protected $visitors;
	
	public function index()
	{
		$data['title'] = 'Home';
        $data['name'] = 'home';
        $data['banners'] = $this->main->getBanners();
        $data['heads'] = $this->main->getHeads();
        $data['events'] = $this->main->getEvents();
        $data['news'] = $this->main->getNews();
        $data['image_gallery'] = $this->main->getImageGallery();
        $data['video_gallery'] = $this->main->getVideoGallery();
		
		return $this->template->load('template', 'home', $data);
	}

	public function about_us()
	{
		$data['title'] = 'About Us';
        $data['name'] = 'about_us';
		
		return $this->template->load('template', 'about_us', $data);
	}

	public function gallery($slug='')
	{
        $data['title'] = 'Gallery';
        $data['name'] = 'gallery';
        $data['kacheries'] = $this->main->getAll('kacheries', 'name, slug', ['is_deleted' => 0]);
        $data['gallery'] = $this->main->getGallery($slug);
        
        return $this->template->load('template', 'gallery', $data);
	}

	public function staff($slug='')
	{
        $data['title'] = 'Staff';
        $data['name'] = 'staff';
        $data['kacheries'] = $this->main->getAll('kacheries', 'name, slug', ['is_deleted' => 0]);
        $data['staff'] = $this->main->getStaff($slug);
        
        return $this->template->load('template', 'staff', $data);
	}

	public function events()
	{
		$this->load->library('pagination');
		$this->load->model(admin('events_model'));

		$config = [
			'base_url' => current_url(),
			'total_rows' => $this->events_model->count(),
			'per_page' => 10,
			'use_page_numbers' => TRUE,
			'page_query_string' => TRUE,
			'cur_tag_open' => '<a class="active" href="javascript:;">',
			'cur_tag_close' => '</a>',
		];
		
		$this->pagination->initialize($config);
		$start = $this->input->get('per_page') ? ($this->input->get('per_page') - 1) * $config['per_page'] : 0;
        $data['title'] = 'Events';
        $data['name'] = 'events';
        $data['events'] = $this->main->getEventList($start, $config['per_page']);
		
		return $this->template->load('template', 'events', $data);
	}

	public function news()
	{
		$this->load->library('pagination');
		$this->load->model(admin('news_model'));

		$config = [
			'base_url' => current_url(),
			'total_rows' => $this->news_model->count(),
			'per_page' => 2,
			'use_page_numbers' => TRUE,
			'page_query_string' => TRUE,
			'cur_tag_open' => '<a class="active" href="javascript:;">',
			'cur_tag_close' => '</a>',
		];
		
		$this->pagination->initialize($config);
		$start = $this->input->get('per_page') ? ($this->input->get('per_page') - 1) * $config['per_page'] : 0;
        $data['title'] = 'News';
        $data['name'] = 'news';
        $data['news'] = $this->main->getNewsList($start, $config['per_page']);
		
		return $this->template->load('template', 'news', $data);
	}

	public function news_detail(int $id)
	{
		$data['title'] = 'News';
        $data['name'] = 'news';
		$path = $this->config->item('news');
        $data['news'] = $this->main->get('news', "id, title, description, CONCAT('".$path."', image) image", ['id' => d_id($id)]);
		
		return $this->template->load('template', 'news_detail', $data);
	}

	public function contact_us()
	{
		$data['title'] = 'Contact Us';
        $data['name'] = 'contact_us';
		$data['kacheries'] = $this->main->getAll('kacheries', "name, mobile, email, address", ['is_deleted' => 0]);
		
		return $this->template->load('template', 'contact_us', $data);
	}

	public function event($slug)
	{
        $data['title'] = 'Event';
        $data['name'] = 'events';
        $data['event'] = $this->main->getEvent($slug);
        
		if ($data['event'] && $slug)
			return $this->template->load('template', 'event', $data);
		else
			return $this->template->load('template', 'events', $data);
	}

	public function mahila_samakhya()
	{
        $data['title'] = 'Event';
        $data['name'] = 'events';
        
		return $this->template->load('template', 'mahila_samakhya', $data);
	}
	
	public function work_vistar()
	{
        $data['title'] = 'Event';
        $data['name'] = 'events';
        
		return $this->template->load('template', 'work_vistar', $data);
	}
	
	public function kamgiri()
	{
        $data['title'] = 'Event';
        $data['name'] = 'events';
        
		return $this->template->load('template', 'kamgiri', $data);
	}

	public function kendro()
	{
        $data['title'] = 'Event';
        $data['name'] = 'events';
        
		return $this->template->load('template', 'kendro', $data);
	}
}