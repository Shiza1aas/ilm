<?php
	/**
	* Admin.php model for the handling admin activities.
	*/
	class Admin_model extends CI_Model
	{
		
		function insert_question($question,$option_a,$option_b,$option_c,$option_d,$answer,$level)
		{
			$data = array(
				'question' => $question,
				'option_a' => $option_a,
				'option_b' => $option_b,
				'option_c' => $option_c,
				'option_d' => $option_d,
				'answer' => $answer,
				'level' => $level
				);
			$str = $this->db->insert_string('question', $data);
			$this->db->query($str);		
			return 1;
		}

	}
	?>