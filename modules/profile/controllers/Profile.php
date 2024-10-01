<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Admin
{
	var $userId;
	function __construct()
	{
		parent::__construct();
		$this->data['tpl'] = 'single';
		$this->userId = $this->ion_auth->user()->row()->user_id;

		// LOAD MODEL
		$this->load->model('user_mdl');
	}

#fungsi index profile
	function index()
	{
		$this->data['icon'] = 'fa fa-dashboard';
		$this->data['subicon'] = 'fa fa-dashboard';
		$this->data['tbl_title'] = 'Profile';
		$this->data['tbl_remark'] = 'Profile';
		$this->data['tbl_path'] = '/profile';

		$data = $this->data;
		$data['profile'] = $this->user_mdl->get('*', ['id' => $this->userId], [], true);

		$this->data['content'] = $this->load->view('index', $data, true);
		$this->display();
	}

#rule form profile
	private function rules()
	{
		return [
			['field' => 'first_name', 'label' => 'Nama depan', 'rules' => 'trim|required'],
			['field' => 'last_name', 'label' => 'Nama belakang', 'rules' => 'trim|required'],
			['field' => 'password', 'label' => 'Password', 'rules' => 'required'],
			['field' => 'password_conf', 'label' => 'Konfirmasi password', 'rules' => 'matches[password]'],
		];
	}

#fungsi update profile
	function update()
	{
		// check request only ajax
		$this->input->is_ajax_request() ? true : show_404();
		// loop post data from request ajax
		foreach ($this->input->post() as $key => $value) {
			$$key = $value;
		}
		// default result
		$result = [
			$this->data['csrf']['name'] => $this->data['csrf']['hash'],
			'success' => false,
			'message' => 'Gagal Merubah Data!'
		];

		// validation request
		$rules = $this->rules();
		if (!$password) {
			unset($rules[2]);
			unset($rules[3]);
		}
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			// throw error per field
			$result['error'] = $this->form_validation->error_array();
		} else {
			$phone = str_replace("_", "", $phone);
			$phone = hp_nol(preg_replace('/\D/', '', $phone));
			//pause($phone);
			$payload = [
				'first_name' => $first_name,
				'last_name' => $last_name,
				'phone' => $phone,
				'company' => $company,
			];

			if ($password) {
				$payload['password'] = password_hash($password, PASSWORD_BCRYPT);
			}
			// update
			$res = $this->user_mdl->update($payload, $this->userId);
			if ($res) {
				$result['success'] = true;
				$result['message'] = 'Berhasil Merubah Data!';
			}
		}
		header('Content-Type: application/json');
		echo json_encode($result);
	}
}

/* End of file User.php */
