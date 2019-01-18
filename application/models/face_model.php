<?php

	/**
	* Class Name : Face_Model
	* Author : A.shokri
	* Date : 2018/04/21
	*/

	defined('BASEPATH') OR exit('No direct script access allowed');

	class face_model extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
		}

		public function get()
		{
			$this->db->order_by('id', 'DESC');
			$result = $this->db->get('face');

			if($result->num_rows())
			{
				$result = $result->result_array();
				return $result;
			}
			else
				return false;
		}

		public function insert($face_id, $file, $gender, $age)
		{
			$timespan = time();
			$description = $this->input->user_agent();

			$data = array(
					'face_id'		=> $face_id,
					'file'			=> $file,
			        'gender'		=> $gender,
			        'age' 			=> $age,
			        'timespan' 		=> $timespan,
			        'description'	=> $description
			);

			if($this->db->insert('face', $data))
				return true;
			else
				return false;
		}

	}

?>