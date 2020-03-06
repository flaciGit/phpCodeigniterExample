<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function index($page = 0)
	{
		$data['dates'] = $this->CalendarModel->getAll();
		$data['activities'] = $this->CalendarModel->getAllActivities();
		$data['js_to_load'] = array("calendar.js"); // array to prepare for multiple file include (?)
		
		$this->load->view('common/header');
		$this->load->view('pages/calendar', $data);
		$this->load->view('common/footer');
	}

	public function createdate()
	{
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_message('title', 'Faulty/missing title!');
		
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_message('description', 'Faulty/missing description!');
		
		$this->form_validation->set_rules('start_date', 'start_date', 'required');
		$this->form_validation->set_message('start_date', 'Faulty/missing start date!');
		
		$this->form_validation->set_rules('end_date', 'end_date', 'required');
		$this->form_validation->set_message('end_date', 'Faulty/missing description!');
		
		$this->form_validation->set_rules('activity', 'activity', 'required');
		$this->form_validation->set_message('activity', 'Faulty/missing description!');
		
		
		if ($this->form_validation->run() == FALSE){
			
			if(validation_errors())
				$data['resultMessage'] = validation_errors();

			$this->load->view('common/header');
			$this->load->view('pages/result', $data);
			$this->load->view('common/footer');

			return 0;
		}
		
		if(isset($_POST) && !empty($_POST)){
			
			$newUser = array (
				'title' => $_POST['title'],
				'description' => $_POST['description'],
				'start_date' => strtotime($_POST['start_date']),
				'end_date' => strtotime($_POST['end_date']),
				'activity_id' => $_POST['activity']

			);
			$this->CalendarModel->insert($newUser);
			
			$data['resultMessage'] = 'Successfull submit!';
		}else{
			$data['resultMessage'] = 'Error while trying to submit!';
		}
		
		$this->load->view('common/header');
		$this->load->view('pages/result', $data);
		$this->load->view('common/footer');

		return 0;
	}

	public function deletedate($id = null)
	{
		if(isset($id) && !empty($id)){
			
			$this->CalendarModel->delete($id);
			
			$data['resultMessage'] = 'Successfull delete!';
		}else{
			$data['resultMessage'] = 'Error while deleting date!';
		}
		
		$this->load->view('common/header');
		$this->load->view('pages/result', $data);
		$this->load->view('common/footer');
	}
	
	
}
