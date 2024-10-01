<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->ion_auth->logged_in())
			redirect(site_url('dashboard'), 'refresh');
	}

#fungsi load tampilan/view login
	function index()
	{
		$this->data['tpl'] = 'auth/login';
		$this->display();
	}
}
