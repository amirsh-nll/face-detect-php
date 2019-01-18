<?php
	
	/**
	* 	Class Name : Web
	*	Author : A.shokri
	*	Date : 2018/04/21
	*/

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Web extends CI_Controller
	{

		public function index()
		{
			$data = array(
				'base'			=>	base_url()
			);
			$this->load->view("ui/intro", $data);
		}

		public function recognition()
		{
			if($this->session->has_userdata("recognition"))
			{
				$recognition = $this->session->userdata("recognition");
				$this->session->unset_userdata("recognition");
			}
			else
				$recognition = -1;

			if($this->session->has_userdata("success_face"))
			{
				$success_face = $this->session->userdata("success_face");
				$this->session->unset_userdata("success_face");
			}
			else
				$success_face = -1;

			$data = array(
				'base'			=>	base_url(),
				'recognition'	=>	$recognition,
				'success_face'	=>	$success_face
			);
			$this->load->view("ui/recognition", $data);
		}

		public function directory()
		{
			$this->load->model('face_model');
			$data = array(
				'base'			=>	base_url(),
				'faces'			=>	$this->face_model->get()
			);
			$this->load->view("ui/directory", $data);
		}

		public function statictics()
		{
			$this->load->model('face_model');
			$this->load->library('chart');
			$data = array(
				'base'			=>	base_url(),
				'faces'			=>	$this->face_model->get()
			);
			$this->load->view("ui/statictics", $data);
		}


		public function uploading()
		{

			$config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name']			= true;
            $config['max_size']             = 8192;
            $config['max_width']            = 20000;
            $config['max_height']           = 20000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image'))
            {
            	$this->session->set_userdata("recognition", 0);
            	redirect(base_url() . "recognition");
            }
           	else
            {
            	$data = array('upload_data' => $this->upload->data());
            	if(empty($this->upload->data('file_name')))
				{
					$this->session->set_userdata("recognition", 1);
            		redirect(base_url() . "recognition");
				}
				else
				{
					$this->load->library('face');
					$file_name = $this->upload->data('file_name');
					$face = $this->face->detect(base_url(), $file_name);

					if(!($face===0))
					{
						if($face[0]['faceId']==null)
						{
							$this->session->set_userdata("recognition", 3);
            				redirect(base_url() . "recognition");
						}

						$this->load->model("face_model");
						$this->face_model->insert($face[0]['faceId'], $file_name, $face[0]['faceAttributes']['gender'], round($face[0]['faceAttributes']['age']));
						$this->session->set_userdata("success_face", array(
							"face_id" 	=> $face[0]['faceId'],
							"file_name"	=> $file_name, 
							"gender" 	=> $face[0]['faceAttributes']['gender'],
							"age" 		=> round($face[0]['faceAttributes']['age'])
						));
						$this->session->set_userdata("recognition", 7);
					}
					else
						$this->session->set_userdata("recognition", 2);

	            	redirect(base_url() . "recognition");
				}
				
            }
		}

	}

?>