<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	

	public function index()
	{
		$this->load->model('queries');
		$chkAdminExist = $this->queries->chkAdminExist();
		$this->load->view('home', ['chkAdminExist'=>$chkAdminExist]);
	}
	public function adminRegister()
	{
		$this->load->model('queries');
		$roles = $this->queries->getroles();
		$this->load->view('register', ['roles'=>$roles]);
	}
	public function adminSignup()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('role_id', 'Role', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confpwd', 'Password Confirmation', 'required');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if( $this->form_validation->run() ){
			$data = $this->input->post();
			$data['password'] = sha1($this->input->post('password'));
			$data['confpwd'] = sha1($this->input->post('confpwd'));
			$this->load->model('queries');
			if($this->queries->registerAdmin($data)){
				$this->session->set_flashdata('message', 'Admin Registered Successfully');
				return redirect("welcome/adminRegister");
			}
			else{
				$this->session->set_flashdata('message', 'Failed to Register Admin!');
				return redirect("welcome/adminRegister");
			}
		}
		else{
			$this->adminRegister();     
		}
	}

	public function login()
	{
		
		$this->load->view('login');
	}


	public function signin()
	{
		$this->form_validation->set_rules('email', 'Email', 'Required');
		$this->form_validation->set_rules('password', 'Password', 'Required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if( $this->form_validation->run() ){
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$this->load->model('queries');
			$userExist = $this->queries->adminExist($email, $password);
			
			if( $userExist){
				if($userExist->user_id == '7'){
					$sessionData = [
						'user_id' => $userExist->user_id,
						'username' => $userExist->username,
						'email' => $userExist->email,
						'role_id' => $userExist->role_id,
					];
					$this->session->set_userdata($sessionData);
					return redirect("Admin/dashboard");
				}
				else if($userExist->user_id > '7'){
					$sessionData = [
						'user_id' => $userExist->user_id,
						'username' => $userExist->username,
						'email' => $userExist->email,
						'college_id' => $userExist->college_id,
						'role_id' => $userExist->role_id,
					];
					$this->session->set_userdata($sessionData);
					return redirect("Users/dashboard");
				}
				else{
					$this->session->set_flashdata('message', 'Email or Password is Incorrect');
					return redirect("Welcome/login");
				}
				

				
				
			}
		}
		else{
			$this->login();
		}
	}
	public function logout()
	{
		$this->session->unset_userdata("user_id");
		return redirect("Welcome/login");
	}
	
}
