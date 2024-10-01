<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dashboard extends MY_Admin
{
	var $userId;
	function __construct()
	{
		parent::__construct();
		$this->data['tpl'] = 'single';
		$this->userId = $this->ion_auth->user()->row()->user_id;

		// LOAD MODEL
		$this->load->model([
			'ruangan/ruangan_mdl',
			'pasien/pasien_mdl'
		]);
	}

#fungsi load data dashboard
	function index()
	{
		$this->data['icon'] = 'fa fa-dashboard';
		$this->data['subicon'] = 'fa fa-dashboard';
		$this->data['tbl_title'] = 'Dashboard';
		$this->data['tbl_remark'] = 'Dashboard';
		$this->data['tbl_path'] = '/dashboard';

		$this->data['ruangan_tersedia'] = $this->ruangan_mdl->count_available();
		$this->data['ruangan_terpakai'] = $this->ruangan_mdl->count_exist();
		$this->data['jumlah_kamar'] = $this->ruangan_mdl->count_all();
		$this->data['jumlah_pasien'] = $this->pasien_mdl->count_all();

		$this->data['content'] = $this->load->view('index', $this->data, true);
		$this->display();
	}
}
