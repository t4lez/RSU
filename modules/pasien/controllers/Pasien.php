<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends MY_Admin
{
	var $userId;
	var $tblPasien;
	var $tblPasienKey;
	function __construct()
	{
		parent::__construct();
		$this->data['tpl'] = 'single';
		$this->userId = $this->ion_auth->user()->row()->user_id;

		// LOAD MODEL
		$this->load->model("pasien_mdl");
		$this->tblPasien = $this->pasien_mdl->tblData;
		$this->tblPasienKey = $this->pasien_mdl->tblKey;
	}

#fungsi index menu pasien
	function index()
	{
		$this->data['icon'] = 'fa fa-dashboard';
		$this->data['subicon'] = 'fa fa-dashboard';
		$this->data['tbl_title'] = 'Pasien';
		$this->data['tbl_remark'] = 'Pasien';
		$this->data['tbl_path'] = '/pasien';

		$this->data['content'] = $this->load->view('index', $this->data, true);
		$this->display();
	}

#fungsi ambil data menu pasien
	function get_json()
	{
		$data = array($this->data['csrf']['name'] => $this->data['csrf']['hash'], 'total' => 0, 'rows' => array());
		$limit = isset($_GET['limit']) ? $_GET['limit'] : null;
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$search = (isset($_GET['search'])) ? $_GET['search'] : '';
		$sort = (isset($_GET['sort'])) ? $_GET['sort'] : "$this->tblPasienKey";
		$order = (isset($_GET['order'])) ? $_GET['order'] : 'desc';
		// $filterStatus = $this->input->get('filterStatus');
		$select = "$this->tblPasien.*";
		$arrwhere = NULL;
		$arrlike = NULL;
		$arrJoin = NULL;
		$groupBy = NULL;
		// if (is_numeric($filterStatus))
		// 	$arrwhere[$this->tblData . ".isAktif"] = $filterStatus;
		if ($search <> '') {
			$arrlike = array(
				"lower($this->tblPasien.nama)" => strtolower($search),
				"lower($this->tblPasien.noHp)" => strtolower($search),
				"lower($this->tblPasien.alamat)" => strtolower($search),
			);
		}

		$row = $this->pasien_mdl->data_by_id(
			$limit,
			$offset,
			$sort,
			$order,
			$select,
			$arrwhere,
			$arrJoin,
			$arrlike,
			$groupBy
		);
		$jml = $this->pasien_mdl->get_count_record($select, $arrwhere, $arrlike);
		$data = array("total" => $jml, "rows" => $row, "from" => $offset);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

#rule input form pasien
	private function rules()
	{
		return [
			['field' => 'nama', 'label' => 'Nama', 'rules' => 'trim|required|max_length[60]'],
			['field' => 'noHp', 'label' => 'Nomor Telepon', 'rules' => 'trim|required|hp_check|alpha_dash'],
			['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'trim|required|max_length[100]'],
		];
	}

#fungsi tambah menu pasien
	function add()
	{
		$rules = $this->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$resp = array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $this->form_validation->error_array());
		} else {
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$telepon = str_replace("_", "", $this->input->post('noHp'));
			$telepon = hp_nol($telepon);
			$arrErr = [];
			$cek = $this->pasien_mdl->cekWhereKode(null, array('noHp' => $telepon));
			if ($cek) {
				if ($cek->noHp == $telepon)
					$arrErr["telepon"] = "Nomor Telepon Sudah Terdaftar, Gunakan Nomor lain";
			}

			if ($arrErr) {
				$resp = array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $arrErr);
			} else {
				$arrInsert = array("nama" => $nama, "alamat" => $alamat, "noHp" => $telepon, 'createAt' => date('Y-m-d H:i:s'));
				$insertErr = $this->pasien_mdl->insertErr($arrInsert);
				if ($insertErr) {
					$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Gagal. " . $insertErr);
				} else
					$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Menambahkan Data" . $nama);
			}
		}
		header('Content-Type: application/json');
		echo json_encode($resp);
	}

#fungsi update menu paisen
	function update()
	{
		$resp = array('success' => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Invalid');
		$telepon = str_replace("_", "", $this->input->post('noHp'));
		$telepon = hp_nol($telepon);
		$rules = $this->rules();

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() === FALSE) {
			$resp = array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $this->form_validation->error_array());
		} else {
			$id = $this->input->post('pasienId');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$arrErr = [];

			$cek = $this->pasien_mdl->cekWhereKode(array("$this->tblPasienKey !=" => $id), array('noHp' => $telepon));
			if ($cek) {
				if ($cek->noHp == $telepon)
					$arrErr["noHp"] = "Nomor Telepon Sudah Terdaftar, Gunakan Nomor lain";
			}
			if ($arrErr) {
				header('Content-Type: application/json');
				echo json_encode(array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $arrErr));
				exit;
			}

			$arrUpdate = array("nama" => $nama, "noHp" => $telepon, "alamat" => $alamat);

			if ($this->pasien_mdl->isDataExist($id)) {
				$updatetErr = $this->pasien_mdl->updateErr(array($this->tblPasienKey => $id), $arrUpdate);
				if ($updatetErr) {
					$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Gagal. " . $updatetErr);
				} else
					$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Merubah Data");
			} else
				$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Invalid Data.");
		}
		echo json_encode($resp);
	}

#fungsi hapus menu pasien
	function delete()
	{
		$this->input->is_ajax_request() ? true : show_404();
		$this->form_validation->set_rules('kode[]', 'Kode', 'trim|xss_clean|required|max_length[30]');
		if ($this->form_validation->run() === FALSE)
			$resp = array('success' => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => validation_errors());
		else {
			$kode = $this->input->post('kode');
			if (is_array($kode) && count($kode)) {
				foreach ($kode as $id) {
					$this->pasien_mdl->deleteErr($id);
				}
				$resp = array('success' => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Berhasil Menghapus Data');
			}
		}
		echo json_encode($resp);
	}
}
