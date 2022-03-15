<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Main_modal extends MY_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->banners = $this->config->item('banners');
		$this->heads = $this->config->item('heads');
		$this->gallery = $this->config->item('gallery');
		$this->staff = $this->config->item('staff');
		$this->events = $this->config->item('events');
		$this->news = $this->config->item('news');
	}

	public function getBanners()
    {
        return $this->getAll('banners', "CONCAT('".$this->banners."', banner) banner", []);
    }

	public function getHeads()
    {
        return $this->getAll('heads', "name, hoddo, CONCAT('".$this->heads."', img) img", []);
    }

	public function getEvents()
    {
        return $this->getAll('events', "title", ['is_deleted' => 0], 'id DESC', 10);
    }

	public function getEventList($start, $limit)
    {
        return $this->db->select("title, description, CONCAT('".$this->events."', image) image, DATE_FORMAT(CONCAT(e_date, ' ', e_time), '%d-%m-%Y %h:%i %p') date, place")
                        ->from('events')
                        ->where(['is_deleted' => 0])
                        ->order_by('id DESC')
                        ->limit($limit, $start)
                        ->get()->result_array();
    }

	public function getNewsList($start, $limit)
    {
        return $this->db->select("id, title, CONCAT('".$this->news."', image) image")
                        ->from('news')
                        ->where(['is_deleted' => 0])
                        ->order_by('id DESC')
                        ->limit($limit, $start)
                        ->get()->result_array();
    }

	public function getNews()
    {
        return $this->getAll('news', "id, title", ['is_deleted' => 0], 'id DESC', 10);
    }

	public function getImageGallery()
    {
        return $this->getAll('image_gallery', "CONCAT('".$this->gallery."', image) image", ['is_deleted' => 0], 'id DESC', 8);
    }

	public function getVideoGallery()
    {
        return $this->getAll('video_gallery', "name, v_url", ['is_deleted' => 0], 'id DESC', 8);
    }

	public function getGallery($slug)
    {
        $img = $video = [];
        if ($slug) {
            $img = $this->db->select("CONCAT('".$this->gallery."', image) image, i.name")
                            ->from('image_gallery i')
                            ->where(['i.is_deleted' => 0])
                            ->where(['k.slug' => $slug])
                            ->join('kacheries k', 'k.id = i.k_id')
                            ->order_by('i.id DESC')
                            ->get()->result_array();
                            
            $video = $this->db->select("v.name, v_url")
                                ->from('video_gallery v')
                                ->where(['v.is_deleted' => 0])
                                ->where(['k.slug' => $slug])
                                ->join('kacheries k', 'k.id = v.k_id')
                                ->order_by('v.id DESC')
                                ->get()->result_array();
        }else{
            $img = $this->getAll('image_gallery', "CONCAT('".$this->gallery."', image) image, name", ['is_deleted' => 0], 'id DESC', 12);
            $video = $this->getAll('video_gallery', "name, v_url", ['is_deleted' => 0], 'id DESC', 8);
        }

        return ['imgs' => $img, 'videos' => $video];
    }

	public function getStaff($slug)
    {
        $this->db->select("CONCAT('".$this->staff."', image) image, s.name, s.mobile, s.hoddo")
                            ->from('staff s')
                            ->where(['s.is_deleted' => 0]);
                            
        if ($slug) $this->db->where(['k.slug' => $slug])->join('kacheries k', 'k.id = s.k_id')->limit(10);

        return $this->db->order_by('s.id DESC')->get()->result_array();
    }

	public function getVisitors()
    {
		if (!$this->main->get('app_configs', 'value', ['cong_name' => 'visitors']))
			$this->main->add(['cong_name' => 'visitors', 'value' => 0], 'app_configs');
			
		$visitors = $this->main->check('app_configs', ['cong_name' => 'visitors'], 'value');
		$this->main->update(['cong_name' => 'visitors'], ['value' => ($visitors + 1)], 'app_configs');
		return $visitors;
    }
}