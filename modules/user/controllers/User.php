<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Admin
{
	var $userId;
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->in_group(1)) {
			redirect('dashboard');
		}
		$this->data['tpl'] = 'single';
		$this->userId = $this->ion_auth->user()->row()->user_id;

		// LOAD MODEL
		$this->load->model("users_mdl");
	}

#fungsi index menu users
	function index()
	{
		$this->data['icon'] = 'fa fa-dashboard';
		$this->data['subicon'] = 'fa fa-dashboard';
		$this->data['tbl_title'] = 'User';
		$this->data['tbl_remark'] = 'User';
		$this->data['tbl_path'] = '/user';

		$this->data['groups'] = $this->db->get('tbl_groups')->result();
		$this->data['ls_groups'] = $this->users_mdl->getGroups();
		$this->data['content'] = $this->load->view('index', $this->data, true);
		$this->display();
	}

#fungsi ambil data users
	function get_json()
	{
		$ret = array(
			$this->data['csrf']['name'] => $this->data['csrf']['hash'],
			'total' => 0,
			'rows' => array()
		);
		$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$search = (isset($_GET['search'])) ? $_GET['search'] : '';
		$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'tbl_users.id';
		$order = (isset($_GET['order'])) ? $_GET['order'] : 'desc';

		// BASE QUERY
		$this->db->select('
			tbl_users.id,
			tbl_users.username,
			tbl_users.email, 
			tbl_users.first_name,
			tbl_users.last_name,
			tbl_users.company,
			tbl_users.phone,
			tbl_users_groups.group_id,
			tbl_groups.name as `groups`
		')->from('tbl_users')
			->join('tbl_users_groups', 'tbl_users_groups.user_id=tbl_users.id', 'left')
			->join('tbl_groups', 'tbl_groups.id=tbl_users_groups.group_id', 'left');

		// SEARCH
		if ($search <> '') {
			$keyword = strtolower($search);
			$this->db
				->like('lower(tbl_users.username)', $keyword)
				->or_like('lower(tbl_users.email)', $keyword)
				->or_like('lower(tbl_users.first_name)', $keyword)
				->or_like('lower(tbl_users.last_name)', $keyword)
				->or_like('lower(tbl_groups.name)', $keyword);
		}

		// FILTER
		if (is_numeric($_GET['filterGroup'])) {
			$this->db->where(['tbl_users_groups.group_id' => $_GET['filterGroup']]);
		}

		// $userLoginGrop = $this->session->userdata["user_group"];
		// if ($userLoginGrop != 10) {
		// 	$this->db->where(['groups.id !=' => 10]);
		// }

		$ret['total'] = $this->db->count_all_results(null, false);
		// PAGINATION
		$this->db->order_by($sort, $order);
		$this->db->limit($limit, $offset);
		$ret['rows'] = $this->db->get()->result_array();

		header('Content-Type: application/json');
		echo json_encode($ret);
	}

#fungsi tambah menu users
	function add()
	{
		$this->load->library('form_validation');

		$ret = array(
			$this->data['csrf']['name'] => $this->data['csrf']['hash'],
			'resp' => false,
			'msg' => 'Gagal Menambah Data'
		);

		$this->form_validation->set_rules('first_name', 'Nama depan', 'trim|htmlspecialchars|required', [
			'required' => '%s tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('last_name', 'Nama belakang', 'trim|htmlspecialchars', [
			'required' => '%s tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('company', 'Perusahaan / deskripsi', 'trim|htmlspecialchars', [
			'required' => '%s tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('phone', 'No telepon', 'trim|htmlspecialchars|required', [
			'required' => '%s tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('username', 'Username', 'trim|htmlspecialchars|required|is_unique[tbl_users.username]', [
			'required' => '%s tidak boleh kosong!',
			'is_unique' => '%s sudah tersedia!',
			/*'check_dash_lower' => '%s tidak valid, harus huruf kecil semua dan gunakan underscore untuk space'*/
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|htmlspecialchars|required|valid_email|is_unique[tbl_users.email]', [
			'required' => '%s tidak boleh kosong!',
			'is_unique' => '%s sudah tersedia!',
			'valid_email' => '%s tidak valid!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|htmlspecialchars|required', [
			'required' => '%s tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('groups', 'Grup', 'trim|htmlspecialchars|required|integer', [
			'required' => '%s tidak boleh kosong!',
			'integer' => '%s tidak valid!'
		]);
		// $this->form_validation->set_rules('orgs', 'Orgs', 'required|integer');

		if ($this->form_validation->run() === FALSE) {

			$ret = array(
				$this->data['csrf']['name'] => $this->data['csrf']['hash'],
				'resp' => false,
				'msg' => validation_errors(),
				'error' => $this->form_validation->error_array()
			);
		} else {
			$username = strtolower($_POST['username']);
			$password = $_POST['password'];
			$email = strtolower($_POST['email']);
			$group_ids = $this->input->post('groups');


			$bidang_id = $this->input->post('bidang');
			$seksi_id = $this->input->post('seksi');
			$telepon = str_replace("_", "", $this->input->post('phone'));
			$telepon = hp_nol($telepon);
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $telepon
			);


			if ($this->ion_auth->register($username, $password, $email, $additional_data, array($group_ids))) {
				$this->session->set_flashdata('message', $this->ion_auth->messages());

				$user_id = $this->getLastInserted('tbl_users', 'id');
				$ret = array(
					$this->data['csrf']['name'] => $this->data['csrf']['hash'],
					'resp' => true,
					'msg' => 'Berhasil Menambah Data!'
				);
			} else {
				$ret = array(
					$this->data['csrf']['name'] => $this->data['csrf']['hash'],
					'resp' => true,
					'msg' => $this->ion_auth->errors()
				);
			}
		}
		echo json_encode($ret);
	}

	function getLastInserted($table, $id)
	{
		$this->db->select_max($id);
		$Q = $this->db->get($table);
		$row = $Q->row_array();
		return $row[$id];
	}

#fungsi edit users
	function edit()
	{
		$id = $this->input->post('id');
		$this->load->library('form_validation');

		$ret = array(
			$this->data['csrf']['name'] => $this->data['csrf']['hash'],
			'resp' => false,
			'msg' => 'Gagal Mengubah Data'
		);

		$user = $this->db->get_where('tbl_users', ['id' => $id])->row();
		if ($user) {
			if ($user->email == $this->input->post('email')) {
				$rule_email = "trim|htmlspecialchars|required|valid_email";
			} else {
				$rule_email = "trim|htmlspecialchars|required|valid_email|is_unique[tbl_users.email]";
			}
			if ($user->username == $this->input->post('username')) {
				$rule_username = "trim|htmlspecialchars|required";
			} else {
				$rule_username = "trim|htmlspecialchars|required|is_unique[tbl_users.username]";
			}
			$this->form_validation->set_rules('first_name', 'Nama depan', 'trim|htmlspecialchars|required', [
				'required' => '%s tidak boleh kosong!'
			]);
			$this->form_validation->set_rules('last_name', 'Nama belakang', 'trim|htmlspecialchars', [
				'required' => '%s tidak boleh kosong!'
			]);
			$this->form_validation->set_rules('company', 'Perusahaan / deskripsi', 'trim|htmlspecialchars', [
				'required' => '%s tidak boleh kosong!'
			]);
			$this->form_validation->set_rules('phone', 'No telepon', 'trim|htmlspecialchars|required', [
				'required' => '%s tidak boleh kosong!'
			]);
			$this->form_validation->set_rules('username', 'Username', $rule_username, [
				'required' => '%s tidak boleh kosong!',
				'is_unique' => '%s sudah tersedia!'
			]);
			$this->form_validation->set_rules('email', 'Email', $rule_email, [
				'required' => '%s tidak boleh kosong!',
				'is_unique' => '%s sudah tersedia!',
				'valid_email' => '%s tidak valid!'
			]);
			$this->form_validation->set_rules('groups', 'Grup', 'trim|htmlspecialchars|required|integer', [
				'required' => '%s tidak boleh kosong!',
				'integer' => '%s tidak valid!'
			]);
			$this->form_validation->set_rules('id', 'User ID', 'trim|integer|required');
			if ($this->form_validation->run() === FALSE) {
				$ret = array(
					$this->data['csrf']['name'] => $this->data['csrf']['hash'],
					'resp' => false,
					'msg' => validation_errors(),
					'error' => $this->form_validation->error_array()
				);
			} else {
				$id = $this->input->post('id');

				$org_id = $this->input->post('orgs');
				$bidang_id = $this->input->post('bidang');
				$seksi_id = $this->input->post('seksi');
				$telepon = str_replace("_", "", $this->input->post('phone'));
				$telepon = hp_nol($telepon);
				$data_edit = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'phone' => $telepon
				);

				if (strlen($this->input->post('password')) >= 0)
					$data_edit['password'] = $this->input->post('password');

				$this->ion_auth->update($id, $data_edit);

				//Update the groups user belongs to
				$groups = $this->input->post('groups');
				if (isset($groups) && !empty($groups)) {
					$this->ion_auth->remove_from_group('', $id);
					$this->ion_auth->add_to_group($groups, $id);
				}

				//Update the orgs user belongs to
				// $orgs = $this->input->post('orgs');
				// if (isset($orgs) && !empty($orgs)) {
				// 	$this->db->delete('tbl_users_orgs', array('user_id' => $id));

				// 	$data['user_id'] = $id;
				// 	$data['org_id'] = $org_id;
				// 	$this->db->insert('tbl_users_orgs', $data);
				// }

				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$ret = array(
					$this->data['csrf']['name'] => $this->data['csrf']['hash'],
					'resp' => true,
					'msg' => 'Berhasil Mengubah Data!'
				);
			}
		}
		echo json_encode($ret);
	}

	// function del_old()
	// {
	// 	$id = $_POST['id'];
	// 	//delete records
	// 	$this->db->delete('users', array('id' => $id));
	// 	$ret = array(
	// 		$this->data['csrf']['name'] => $this->data['csrf']['hash'],
	// 		'resp' => true,
	// 		'msg' => 'Berhasil Menghapus Data!'
	// 	);

	// 	echo json_encode($ret);
	// }

#fungsi hapus users
	function del()
	{
		$ret = array(
			$this->data['csrf']['name'] => $this->data['csrf']['hash'],
			'resp' => true,
			'msg' => 'Berhasil Menghapus Data!'
		);
		foreach ($this->input->post('data') ?? [] as $id) {
			$this->db->delete('tbl_users', array('id' => $id));
		}
		echo json_encode($ret);
	}

	function get_users_orgs()
	{
		$user_id = $_POST['id'];

		$this->db->select('*');
		$this->db->from('tbl_users_orgs');
		$this->db->where('user_id', $user_id);

		$ls_data = $this->db->get()->result_array();

		$ret['data_orgs'] = $ls_data;

		echo json_encode($ret);
	}

	function get_users_groups()
	{
		$user_id = $_POST['id'];

		$this->db->select('*');
		$this->db->from('tbl_users_groups');
		$this->db->where('user_id', $user_id);

		$ls_data = $this->db->get()->result_array();

		$ret['rows'] = $ls_data;

		echo json_encode($ret);
	}
}
