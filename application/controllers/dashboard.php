<?php
class Dashboard extends CI_Controller {

public function __construct()
{
parent::__construct();

		$this->load->model(array('dashboard_model','user_model'));

		$this->load->helper('url_helper');
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->library('pagination');
}

public function index(){
	
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Listings View';
		$data['dashboard'] = $this->dashboard_model->get_dashboard();
		$this->load->view('templates/header' );
		$this->load->view('dashboard/index',$data);
		$this->load->view('templates/footer');
}
public function view($slug = NULL){
	$data['dashboard_item'] = $this->dashboard_model->get_dashboard($slug);

	if (empty($data['dashboard_item'])){
		show_404();
	}

	$data['title'] = $data['dashboard_item']['title'];

	$this->load->view('templates/header', $data);
	$this->load->view('dashboard/view', $data);
	$this->load->view('templates/footer');
}

public function create(){
	if (!$this->session->userdata('is_logged_in'))
	{
		$this->session->set_flashdata('msg_error','user not logged in, please log in');
		//redirect(site_url('user/login'));
	}
	$this->load->helper('form');
	$this->load->library('form_validation');

	$data['title'] = 'Create a Car listing';

	$this->form_validation->set_rules('brand', 'Brand', 'required');
	$this->form_validation->set_rules('model', 'Model', 'required');
	$this->form_validation->set_rules('colour', 'Colour', 'required');
	$this->form_validation->set_rules('date_added', 'Date_Added', 'required');
	$this->form_validation->set_rules('year_made', 'Year_Made', 'required');

	if ($this->form_validation->run() === FALSE){
	$message = "you are not logged in, please log in to view your listings";	
	$this->load->view('templates/header', $data);
	$this->load->view('dashboard/create', $message);
	$this->load->view('templates/footer');
	
	

	}else{

	$this->dashboard_model->set_dashboard();
	$this->load->view('templates/header');
	$this->load->view('dashboard/success');
	$this->load->view('templates/footer');
	}
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

	$data['title'] = 'Edit a dashboard item';
	$data['dashboard_item'] = $this->dashboard_model->get_dashboard_by_id($id);
	
/* if ($data['dashboard_item']['user_id'] != $this->session->userdata('user_id'))
	{
		$currentClass = $this->router->fetch_class(); //class = controller
		redirect(site_url($currentClass));
	} */	
	$this->form_validation->set_rules('brand', 'Brand', 'required');
	$this->form_validation->set_rules('model', 'Model', 'required');
	$this->form_validation->set_rules('colour', 'Colour', 'required');
	$this->form_validation->set_rules('date_added', 'Date_Added', 'required');
	$this->form_validation->set_rules('year_made', 'Year_Made', 'required');
	
	if ($this->form_validation->run() === FALSE){
	$this->load->view('templates/header', $data);
	$this->load->view('dashboard/edit', $data);
	$this->load->view('templates/footer');

	}else{

	$this->dashboard_model->set_dashboard($id);
	redirect( site_url('dashboard'));
	}
}

public function delete(){
		if (!$this->session->userdata('is_logged_in'))
	{
		redirect(site_url('user/login'));
	}
	$id = $this->uri->segment(3);

	if (empty($id)){
		show_404();
	}
	$dashboard_item = $this->dashboard_model->get_dashboard_by_id($id);
	
/* if ($data['dashboard_item']['user_id'] != $this->session->userdata('user_id'))
	{
		$currentClass = $this->router->fetch_class(); //class = controller
		redirect(site_url($currentClass));
	} */
	$this->dashboard_model->delete_dashboard($id);
	redirect(base_url().'index.php/dashboard');
	}
}