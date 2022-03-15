<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Heads extends Admin_controller  {

    public function __construct()
	{
		parent::__construct();
		$this->path = $this->config->item('heads');
	}

	private $table = 'heads';
	protected $redirect = 'heads';
	protected $title = 'Head';
	protected $name = 'heads';
	
	public function index()
	{
		$data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['url'] = $this->redirect;
        $data['operation'] = "List";
        $data['data'] = $this->main->getAll($this->table, 'id, name, hoddo, CONCAT("'.$this->path.'", img) img', []);
		
		return $this->template->load('template', "$this->redirect/home", $data);
	}

	public function update($id)
	{
        $this->form_validation->set_rules($this->validate);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "Update";
            $data['url'] = $this->redirect;
            $data['data'] = $this->main->get($this->table, 'name, hoddo, img', ['id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                'name'  => $this->input->post('name'),
                'hoddo' => $this->input->post('hoddo')
            ];

            if (!empty($_FILES['image']['name'])) {
                $image = $this->uploadImage('image');
                if ($image['error'] == TRUE)
                    flashMsg(0, "", $image["message"], "$this->redirect/update/$id");
                else{
                    if (is_file($this->path.$this->input->post('image')))
                        unlink($this->path.$this->input->post('image'));
                    $post['img'] = $image['message'];
                }
            }
            
            $id = $this->main->update(['id' => d_id($id)], $post, $this->table);

            flashMsg($id, "$this->title updated.", "$this->title not updated. Try again.", $this->redirect);
        }
	}

    protected $validate = [
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 chars allowed.",
            ],
        ],
        [
            'field' => 'hoddo',
            'label' => 'Hoddo',
            'rules' => 'required|max_length[200]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 200 chars allowed.",
            ],
        ]
    ];
}