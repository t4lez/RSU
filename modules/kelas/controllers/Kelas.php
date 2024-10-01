<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends MY_Admin
{
	var $userId;
	var $tblKelas;
	var $tblKelasKey;
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->in_group(1)) {
			redirect('dashboard');
		}
		$this->data['tpl'] = 'single';
		$this->userId = $this->ion_auth->user()->row()->user_id;

		// LOAD MODEL
		$this->load->model([
			"kelas_mdl",
		]);
		$this->tblKelas = $this->kelas_mdl->tblData;
		$this->tblKelasKey = $this->kelas_mdl->tblKey;
	}

#fungsi index menu kelas
	function index()
	{
		$this->data['icon'] = 'fa fa-dashboard';
		$this->data['subicon'] = 'fa fa-dashboard';
		$this->data['tbl_title'] = 'Kelas';
		$this->data['tbl_remark'] = 'Kelas';
		$this->data['tbl_path'] = '/kelas';

		$this->data['kelas'] = $this->kelas_mdl->get();

		$this->data['content'] = $this->load->view('index', $this->data, true);
		$this->display();
	}

#fungsi ambil data menu kelas
	function get_json()
	{
		$data = array($this->data['csrf']['name'] => $this->data['csrf']['hash'], 'total' => 0, 'rows' => array());
		$limit = isset($_GET['limit']) ? $_GET['limit'] : null;
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$search = (isset($_GET['search'])) ? $_GET['search'] : '';
		$sort = (isset($_GET['sort'])) ? $_GET['sort'] : "$this->tblKelasKey";
		$order = (isset($_GET['order'])) ? $_GET['order'] : 'desc';
		$filterKelas = $this->input->get('filterKelas');
		$select = "$this->tblKelas.*";
		$arrwhere = NULL;
		$arrlike = NULL;
		$arrJoin = NULL;
		$groupBy = "$this->tblKelas.$this->tblKelasKey";
		if (is_numeric($filterKelas))
			$arrwhere["$this->tblKelas.kelasId"] = $filterKelas;
		if ($search <> '') {
			$arrlike = array(
				"lower($this->tblKelas.namaKelas)" => strtolower($search),
			);
		}

		$row = $this->kelas_mdl->data_by_id(
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
		$jml = $this->kelas_mdl->get_count_record($select, $arrwhere, $arrlike, $arrJoin);
		$data = array("total" => $jml, "rows" => $row, "from" => $offset);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

#rules inputan form kelas
	private function rules()
	{
		return [
			['field' => 'namaKelas', 'label' => 'Nama', 'rules' => "trim|required|max_length[60]|is_unique[$this->tblKelas.namaKelas]"],
		];
	}

#fungsi tambah menu kelas
	function add()
	{
		$rules = $this->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$resp = array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $this->form_validation->error_array());
		} else {
			$namaKelas = $this->input->post('namaKelas');

			$arrInsert = array("namaKelas" => $namaKelas, 'createAt' => date('Y-m-d H:i:s'));
			$insertErr = $this->kelas_mdl->insertErr($arrInsert);
			if ($insertErr) {
				$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Gagal. " . $insertErr);
			} else
				$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Menambahkan Data");
		}
		header('Content-Type: application/json');
		echo json_encode($resp);
	}

#fungsi update menu kelas
	function update()
	{
		$resp = array('success' => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Invalid');
		$id = $this->input->post('kelasId');
		$namaKelas = $this->input->post('namaKelas');
		$rules = $this->rules();
		$cek = $this->kelas_mdl->cekWhereKode(array("$this->tblKelasKey !=" => $id), array('namaKelas' => $namaKelas));
		if (!$cek) {
			$rules[0]['rules'] = 'trim|required|max_length[60]';
		}
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() === FALSE) {
			$resp = array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $this->form_validation->error_array());
		} else {
			$arrErr = [];

			if ($arrErr) {
				header('Content-Type: application/json');
				echo json_encode(array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $arrErr));
				exit;
			}

			$arrUpdate = array("namaKelas" => $namaKelas);

			if ($this->kelas_mdl->isDataExist($id)) {
				$updatetErr = $this->kelas_mdl->updateErr(array("$this->tblKelasKey" => $id), $arrUpdate);
				if ($updatetErr) {
					$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Gagal. " . $updatetErr);
				} else
					$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Merubah Data");
			} else
				$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Invalid Data.");
		}
		echo json_encode($resp);
	}

#fungsi hapus menu kelas
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
					$this->kelas_mdl->deleteErr($id);
				}
				$resp = array('success' => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Berhasil Menghapus Data');
			}
		}
		echo json_encode($resp);
	}
}
