<?php
class admin extends CI_Controller {
public function __construct()
{
parent::__construct();
		$this->load->model(array('admin_model','user_model'));
		$this->load->helper(array('url_helper','text'));
		$this->load->library('session');
		$this->load->library('pagination');
		
		if($this->session->userdata('is_logged_in') !== TRUE){
		redirect('login');
	}
}

public function index(){
	if($this->session->userdata('level')=== '1'){
		
		//$this->load->view('admin/index');
		
	}else{
		echo("ACCESS IS DENIED");
		redirect(site_url('dashboard'));
	}
	 
	$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Admin View';
		$data['admin'] = $this->admin_model->get_user();
		$this->load->view('templates/header' );
		$this->load->view('admin/index',$data);
		$this->load->view('templates/footer');
}
public function view($slug = NULL){
	$data['user'] = $this->admin_model->get_user($slug);

	if (empty($data['users'])){
		show_404();
	}

	$data['title'] = $data['user']['title'];

	$this->load->view('templates/header', $data);
	$this->load->view('admin/view', $data);
	$this->load->view('templates/footer');
}


public function edit_users(){
		if (!$this->session->userdata('is_logged_in'))
	{
		redirect(site_url('user/login'));
	}else {
		$data['id'] = $this->session->userdata['id'];
		  }
	$id = $this->uri->segment(3);

	if (empty($id)){
		show_404();
	}

	$this->load->helper('form');
	$this->load->library('form_validation');

	$data['title'] = 'Edit a users details';
	$data['users'] = $this->admin_model->get_user_by_id($id);

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');

	
	if ($this->form_validation->run() === FALSE){
	$this->load->view('templates/header', $data);
	$this->load->view('admin/edit', $data);
	$this->load->view('templates/footer');

	}else{

	$this->admin_model->get_user($id);
	redirect(site_url('admin'));
	}
}

public function delete($id){
	
		$this->db->where('id', $id);
		return $this->db->delete('user');
		redirect(site_url('admin'));	
}

public function edit(){
		if (!$this->session->userdata('is_logged_in'))
	{
		redirect(site_url('user/login'));
	}
	$id = $this->uri->segment(3);

	if (empty($id)){
		show_404();
	}
	$this->load->helper('form');
	$this->load->library('form_validation');

	$data['title'] = 'Edit a user item';
	$data['admin_item'] = $this->user_model->get_user_by_id($id);
	
/* if ($data['dashboard_item']['user_id'] != $this->session->userdata('user_id'))
	{
		$currentClass = $this->router->fetch_class(); //class = controller
		redirect(site_url($currentClass));
	} */	
	if ($this->form_validation->run() === FALSE){
	$this->load->view('templates/header', $data);
	$this->load->view('admin/edit', $data);
	$this->load->view('templates/footer');

	}else{

	$this->user_model->set_user($id);
	redirect(site_url('admin'));
	}
	}
public function promote($id){

	$id = $this->uri->segment(3);
	$this->admin_model->promote($id);
	redirect(site_url('admin'));
}
public function demote($id){
	$id = $this->uri->segment(3);
	$this->admin_model->demote($id);
	redirect(site_url('admin'));
}
}