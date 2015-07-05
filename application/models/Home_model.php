<?php
	/**
	*  model for the handling home activities.
	*/
	class Home_model extends CI_Model
	{
		
		public function select_question()
		{
			$this->db->order_by('question_id', 'RANDOM');
			$this->db->limit(1);
			$query = $this->db->get('question');

			if ($query->num_rows() > 0)
			{
				foreach ($query->result_array() as $row)
				{
					$data[] = $row;
				}
			}
			$query->free_result();
			return $data;
		}

		public function login($username,$password = "")
		{
			if ( $password == "")
			{
				$data = array(
					'user_name' => $username,
					);
			}
			else
			{
				$data = array(
					'user_name' => $username,
					'user_password' => sha1($password),
					);
			}

			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($data);

			$query = $this->db->get();

			if ($query->num_rows() > 0)
			{
				$newdata = array(
					'username'  => $username,
					);

				$this->session->set_userdata($newdata);

				return true;
			}

			return false;

		}

		public function signup($username,$password)
		{
			// check whether username exists already

			if ( $this->login($username))
				return false;

			$date = date('Y-m-d H:i:s');
			$join_date = strtotime($date);


			$data = array(
				'user_name' => $username,
				'user_password' => sha1($password),
				'user_join_date' => $join_date
				);

			$this->db->insert('user', $data);

			$newdata = array(
				'username'  => $username,
				);

			$this->session->set_userdata($newdata);
			
			return true;	
		}

	}
	?>