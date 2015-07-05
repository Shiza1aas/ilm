<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->model('home_model');
		// $data['question'] = $this->home_model->select_question();
		// print_r($data);
		$this->load->view('templates/header');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}

	public function select_question()
	{
		$this->load->model('home_model');
		$json['question'] = $this->home_model->select_question();
		echo json_encode($json);
	}

// Sign up function for sign up
	public function signup()
	{
		$signup_username = $_POST['signup_username'];
		$signup_password = $_POST['signup_password'];
		$signup_repeat_password = $_POST['signup_repeat_password'];

		json_decode($signup_username); 
		json_decode($signup_password); 
		json_decode($signup_repeat_password);

		if ( strlen($signup_username) < 5 || strlen($signup_password) < 5 || ($signup_password != $signup_repeat_password))
		{
			$json['signup'] = false;
		} 
		else
		{
			$this->load->model('home_model');
			$json['signup'] = $this->home_model->signup($signup_username,$signup_password);
		}
		echo json_encode($json);
				
	}

	public function login()
	{
		$login_username = $_POST['login_username'];
		$login_password = $_POST['login_password'];

		json_decode($login_username); 
		json_decode($login_password); 
		
		$this->load->model('home_model');
		$json['login'] = $this->home_model->login($login_username,$login_password);
		echo json_encode($json);
				
	}
}
