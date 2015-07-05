<?php
	/**
	* The admin controller controls all the elements in admin area.
	*/
	class Admin extends CI_Controller
	{
		
		public function index()
		{
			$this->load->view('templates/header.php');
			$this->load->view('admin/index.php');
			$this->load->view('templates/footer.php');

		}
		public function insert_question()
		{
			$question = $this->input->post('question');
			$option_a = $this->input->post('option_a');
			$option_b = $this->input->post('option_b');
			$option_c = $this->input->post('option_c');
			$option_d = $this->input->post('option_d');
			$answer = $this->input->post('answer');
			$level = $this->input->post('level');

			$this->load->model('admin_model');

			$result = $this->admin_model->insert_question($question,$option_a,$option_b,$option_c,$option_d,$answer,$level);
			$this->load->view('templates/header.php');
			$this->load->view('admin/index.php');
			$this->load->view('templates/footer.php');
		}
	}
?>