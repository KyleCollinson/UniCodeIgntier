<?php
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
		$this->load->model('admin_model');
		$this->load->model('dashboard_model');

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
	//	$this->load->library('encryption');
    }

 public function index()
	{
		/* $this->encryption->initialise(
        array(
                'cipher' => 'aes-192',
                'mode' => 'cbc',
				'driver' =>'opensll'
			)
        ); */
		$this->register();
	}
	
	public function register()
	{
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		
	$data['title'] = 'Register';
	
	if ($this->form_validation->run()==FALSE)
	{
			$this->load->view('templates/header',$data);
			$this->load->view('user/register');
			$this->load->view('templates/footer');
	}else{
			if ($this->user_model->set_user())
			{
				$this->session->set_flashdata('msg_success','Registration was Successful!');
				redirect('user/register');
			} else{
					$this->session->set_flashdata('msg_error', 'Error! Please try agian later.');
					redirect('user/register');
			}
		}
	}
    public function login(){
        $email = $this->input->post('email',TRUE);
        $password = $this->input->post('password',TRUE)
		
		//$usertype = $this->input->get('usertype',TRUE);
			//Tried, but wouldnt decrypt anywhere. and couldnt figure out why.
		$validate = $this->user_model->get_user_login($email,$password);
	
		
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		$this->form_validation->set_rules('usertype', 'usertype');
		

        $data['title'] = 'Login';

      if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('user/login', $data);
            $this->load->view('templates/footer');

        } else {
				
		if ($validate->num_rows()>0){
			$data = $validate->row_array();
			$name =$data['surname'];
			$email=$data['email'];
			$level=$data['usertype'];
			$sesdata = array(
			'email'=>$email,
			'level' =>$level,
			'is_logged_in' =>true,
			);
			
			$this->session->set_userdata($sesdata);
			//access for admins
			if($level =='1'){
				redirect('admin');
			}
			//access level for general users
			elseif($level=='0'){
				redirect('dashboard');
			}else{
			$this->session->set_flashdata('msg_error','Login credentials does not match!');
            redirect('user/login');
			}
		}
         	
					
              /*  $this->session->set_userdata($user_data);
				
                //$this->session->set_flashdata('msg_success','Login Successful!', 'user_id');
               // redirect('dashboard');
            } else {
              //  $this->session->set_flashdata('msg_error','Login credentials does not match!');
              //  redirect('user/login');
				
            } */
        }
	
	}
   public function logout(){
        if ($this->session->userdata('is_logged_in')) {

            $this->session->unset_userdata('email');
            $this->session->unset_userdata('is_logged_in');
            $this->session->unset_userdata('user_id');
			$this->session->unset_userdata('usertype');
			
        }
        redirect('user/login');
    }
}
