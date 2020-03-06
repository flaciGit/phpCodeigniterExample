<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function create()
	{
		$this->load->view('common/header');
		$this->load->view('pages/create');
		$this->load->view('common/footer');
	}

	public function createwithajax()
	{
		$this->load->view('common/header');
		$this->load->view('pages/createajax');
		$this->load->view('common/footer');
	}

	public function createuser()
	{
		
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_message('name', 'Faulty/missing name!');
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_message('username', 'Faulty/missing username!');
		
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_message('password', 'Faulty/missing password!');
		
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_message('email', 'Faulty/missing emal!!');
		
		$this->form_validation->set_rules('intro', 'intro', 'required');
		$this->form_validation->set_message('intro', 'Faulty/missing intro!');
		
		if ($this->form_validation->run() == FALSE || $this->UserModel->uniqueUsername($_POST['username']) == FALSE){
			
			if(validation_errors())
				$data['resultMessage'] = validation_errors();
			if(!$this->UserModel->uniqueUsername($_POST['username']))
				$data['resultMessage'] = "Username is not unique!";
			

			$this->load->view('common/header');
			$this->load->view('pages/result', $data);
			$this->load->view('common/footer');
			
			return 0;
		}
		
		
		if(isset($_POST) && !empty($_POST)){
			
			$newUser = array (
				'name' => $_POST['name'],
				'username' => $_POST['username'],
				'email'=> $_POST['email'],
				'password' => sha1($_POST['password']),
				'intro' => $_POST['intro']
				
			);
			$this->UserModel->insert($newUser);
			
			$data['resultMessage'] = 'Successfull submit!';
		}else{
			$data['resultMessage'] = 'Error while submitting user!';
		}
		
		$this->load->view('common/header');
		$this->load->view('pages/result', $data);
		$this->load->view('common/footer');

		return 0;
	}

	public function createuserwithajax()
	{
		
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_message('name', 'Faulty/missing name!');
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_message('username', 'Faulty/missing username!');
		
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_message('password', 'Faulty/missing password!');
		
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_message('email', 'Faulty/missing emal!!');
		
		$this->form_validation->set_rules('intro', 'intro', 'required');
		$this->form_validation->set_message('intro', 'Faulty/missing intro!');
	
		
		if ($this->form_validation->run() == FALSE || $this->UserModel->uniqueUsername($_POST['username']) == FALSE){
			
			if(validation_errors()){
				$response = array("response" => validation_errors());
				$this->output->set_status_header(500)->set_content_type('application/json')->set_output(json_encode($response));
				return json_encode($response);
			}
			if(!$this->UserModel->uniqueUsername($_POST['username'])){
				$response = array("response" => "Username is not unique!");
				$this->output->set_status_header(500)->set_content_type('application/json')->set_output(json_encode($response));
				return json_encode($response);
			}
		}
		
		if(isset($_POST) && !empty($_POST)){
			
			$newUser = array (
				'name' => $_POST['name'],
				'username' => $_POST['username'],
				'email'=> $_POST['email'],
				'password' => sha1($_POST['password']),
				'intro' => $_POST['intro']
				
			);
			$this->UserModel->insert($newUser);
			
			$response = array("response" => "Successfull submit!");
			$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
			return json_encode($response);
		}else{
			$response = array("response" => "Failed submit!");
			$this->output->set_status_header(500)->set_content_type('application/json')->set_output(json_encode($response));
			return json_encode($response);
		}

	}

	public function delete($id = null)
	{
		if(isset($id) && !empty($id)){
			
			$this->UserModel->delete($id);
			
			$data['resultMessage'] = 'Successfull delete!';
		}else{
			$data['resultMessage'] = 'Error while deleting user!';
		}
		
		$this->load->view('common/header');
		$this->load->view('pages/result', $data);
		$this->load->view('common/footer');
	}
	
	public function update($id = null)
	{
		
		if(isset($id) && !empty($id) && $this->UserModel->getById($id) != null ){
			
			$data['userToUpdate'] = $this->UserModel->getById($id);
			$this->load->view('common/header');
			$this->load->view('pages/update', $data);
			$this->load->view('common/footer');
			
		}else{

			$data['resultMessage'] = 'User is not found!';
			
			$this->load->view('common/header');
			$this->load->view('pages/result', $data);
			$this->load->view('common/footer');
		}
	}
	
	public function updateuser($id = null)
	{
		
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_message('name', 'Faulty/missing name!');
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_message('username', 'Faulty/missing username!');
		
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_message('password', 'Faulty/missing password!');
		
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_message('email', 'Faulty/missing emal!!');
		
		$this->form_validation->set_rules('intro', 'intro', 'required');
		$this->form_validation->set_message('intro', 'Faulty/missing intro!');
		
		if ($this->form_validation->run() == FALSE){
			
			if(validation_errors())
				$data['resultMessage'] = validation_errors();

			$this->load->view('common/header');
			$this->load->view('pages/result', $data);
			$this->load->view('common/footer');

			return 0;
		}
		
		if(isset($id) && !empty($id) && $this->UserModel->getById($id) != null ){
			
			$editedUser = array (
				'id' => $id,
				'name' => $_POST['name'],
				'username' => $_POST['username'],
				'email'=> $_POST['email'],
				'password' => sha1($_POST['password']),
				'intro' => $_POST['intro']
			);
			
			$this->UserModel->update($editedUser);
			$data['resultMessage'] = 'Successfull editing!';
			
		}else{
			$data['resultMessage'] = 'User is not found!';
		}
					
		$this->load->view('common/header');
		$this->load->view('pages/result', $data);
		$this->load->view('common/footer');
		

	}
	
	public function list($page = 0)
	{
		$data['users'] = $this->UserModel->getAll();
		
		$this->load->view('common/header');
		$this->load->view('pages/list', $data);
		$this->load->view('common/footer');
	}
	
	
}
