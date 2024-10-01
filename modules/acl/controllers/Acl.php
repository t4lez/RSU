<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

#turunan dari core class my_controller
class Acl extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
#buat action form login
	function login()
	{
		if ($this->ion_auth->logged_in()) {
			redirect(site_url('dashboard'), 'refresh');
		} else {
			$username = $this->input->post("user_name") ?? '';
			$password = $this->input->post("user_password") ?? '';
			if ($this->form_validation->valid_email($username)) {
				$this->ion_auth_model->identity_column = 'email';
			} else {
				$this->ion_auth_model->identity_column = 'username';
			}
			if ($this->ion_auth->login($username, $password)) {
				$this->session->set_flashdata(array("status" => "success", "msg" => "Selamat datang {$this->ion_auth->user()->row()->first_name}."));
				redirect(site_url('dashboard'), 'refresh');
			} else {
				$this->session->set_flashdata(array("status" => "warning", "msg" => $this->ion_auth->errors()));
				redirect(site_url('login'));
			}
		}
	}

#buat action user logout
	function logout()
	{
		$this->ion_auth->logout();
		session_destroy();
		redirect(site_url());
	}
}
