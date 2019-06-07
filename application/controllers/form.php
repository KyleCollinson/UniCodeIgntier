<?php

class Form extends CI_Controller {

	Public function index()
	{
		$this->load->helper(array('form','url'));
		
		$this->load->libary('form_validation');
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('login');
				
		} else
		{
			$this->load->view('formsuccess');
		}
	}