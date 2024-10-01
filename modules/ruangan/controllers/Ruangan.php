<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends MY_Admin
{
	var $userId;
	var $tblRuangan;
	var $tblRuanganKey;
	function __construct()
	{
		parent::__construct();
		$this->data['tpl'] = 'single';
		$this->userId = $this->ion_auth->user()->row()->user_id;

		// LOAD MODEL
		$this->load->model([
			"ruangan_mdl",
			"kelas/kelas_mdl",
			"booking/booking_mdl"
		]);
		$this->tblRuangan = $this->ruangan_mdl->tblData;
		$this->tblRuanganKey = $this->ruangan_mdl->tblKey;
	}

#fungsi index menu ruangan
	function index()
	{
		$this->data['icon'] = 'fa fa-dashboard';
		$this->data['subicon'] = 'fa fa-dashboard';
		$this->data['tbl_title'] = 'Ruangan';
		$this->data['tbl_remark'] = 'Ruangan';
		$this->data['tbl_path'] = '/ruangan';

		$this->data['kelas'] = $this->kelas_mdl->get();

		$this->data['content'] = $this->load->view('index', $this->data, true);
		$this->display();
	}

#fungsi ambil data menu ruangan
	function get_json()
	{
		$data = array($this->data['csrf']['name'] => $this->data['csrf']['hash'], 'total' => 0, 'rows' => array());
		$limit = isset($_GET['limit']) ? $_GET['limit'] : null;
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$search = (isset($_GET['search'])) ? $_GET['search'] : '';
		//$sort = (isset($_GET['sort'])) ? $_GET['sort'] : "$this->tblRuangan.urutan asc,$this->tblRuanganKey desc";
		$sort = (isset($_GET['sort'])) ? $_GET['sort'] : "k.namaKelas asc, $this->tblRuangan.urutan asc";
		$order = (isset($_GET['order'])) ? $_GET['order'] : '';
		$filterKelas = $this->input->get('filterKelas');
		$select = "$this->tblRuangan.*, k.namaKelas,0 as jumlahKamarTersedia,0 as jumlahKamarTerpakai";
		$arrwhere = NULL;
		$arrlike = NULL;
		$arrJoin = [
			[
				'table' => 'tbl_ruangan_kelas as k',
				'tableJoin' => "k.kelasId=$this->tblRuangan.kelasId",
				'joinType' => 'LEFT'
			]
		];
		$groupBy = "$this->tblRuangan.$this->tblRuanganKey,";
		if (is_numeric($filterKelas))
			$arrwhere["$this->tblRuangan.kelasId"] = $filterKelas;
		if ($search <> '') {
			$arrlike = array(
				"lower($this->tblRuangan.namaRuangan)" => strtolower($search),
				"$this->tblRuangan.jumlahKamar" => $search,
				"lower(k.namaKelas)" => strtolower($search),
			);
		}

		$row = array_map(
			function ($row) {
				$jumlahKamarTersedia = $this->booking_mdl->check_available_room($row->ruanganId);
				$row->jumlahKamarTersedia = $jumlahKamarTersedia;
				$row->jumlahKamarTerpakai = $row->jumlahKamar - $jumlahKamarTersedia;
				return $row;
			},
			$this->ruangan_mdl->data_by_id(
				$limit,
				$offset,
				$sort,
				$order,
				$select,
				$arrwhere,
				$arrJoin,
				$arrlike,
				$groupBy
			)
		);

		$jml = $this->ruangan_mdl->get_count_record($select, $arrwhere, $arrlike, $arrJoin);
		$data = array("total" => $jml, "rows" => $row, "from" => $offset);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

#rule inputan form ruangan
	private function rules()
	{
		return [
			// ['field' => 'namaRuangan', 'label' => 'Nama', 'rules' => "trim|required|max_length[60]|is_unique[$this->tblRuangan.namaRuangan]"],
			['field' => 'namaRuangan', 'label' => 'Nama', 'rules' => "trim|required|max_length[60]"],
			['field' => 'kelasId', 'label' => 'Kelas', 'rules' => "trim|required"],
			['field' => 'jumlahKamar', 'label' => 'Jumlah Kamar', 'rules' => 'trim|required'],
			['field' => 'backgroundColor', 'label' => 'Warna Background', 'rules' => 'trim|required'],
			['field' => 'foregroundColor', 'label' => 'Warna Foreground', 'rules' => 'trim|required'],
			['field' => 'urutan', 'label' => 'Urutan Ruangan', 'rules' => 'trim|required|numeric'],
		];
	}

#fungsi tambah menu ruangan
	function add()
	{
		$rules = $this->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$resp = array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $this->form_validation->error_array());
		} else {
			$jumlahKamar = $this->input->post('jumlahKamar');
			$namaRuangan = $this->input->post('namaRuangan');
			$kelasId = $this->input->post('kelasId');
			$backgroundColor = $this->input->post('backgroundColor');
			$foregroundColor = $this->input->post('foregroundColor');
			$urutan = $this->input->post('urutan');

			$arrErr = [];
			$cek = $this->ruangan_mdl->cekWhereKode(array('namaRuangan' => $namaRuangan, "kelasId" => $kelasId, "urutan" => $urutan));
			if ($cek) {
				$arrErr["namaRuangan"] = "Nama sudah terdaftar";
				$arrErr["kelasId"] = "Kelas sudah terdaftar";
			}
			if ($arrErr) {
				header('Content-Type: application/json');
				echo json_encode(array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $arrErr));
				exit;
			}

			$arrInsert = array("namaRuangan" => $namaRuangan, "jumlahKamar" => $jumlahKamar, "kelasId" => $kelasId, "backgroundColor" => $backgroundColor, "foregroundColor" => $foregroundColor, "urutan" => $urutan, 'createAt' => date('Y-m-d H:i:s'));
			$insertErr = $this->ruangan_mdl->insertErr($arrInsert);
			if ($insertErr) {
				$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Gagal. " . $insertErr);
			} else
				$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Menambahkan Data");
		}
		header('Content-Type: application/json');
		echo json_encode($resp);
	}

#fungsi update menu ruangan
	function update()
	{
		$resp = array('success' => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Invalid');
		$id = $this->input->post('ruanganId');
		$jumlahKamar = $this->input->post('jumlahKamar');
		$namaRuangan = $this->input->post('namaRuangan');
		$kelasId = $this->input->post('kelasId');
		$backgroundColor = $this->input->post('backgroundColor');
		$foregroundColor = $this->input->post('foregroundColor');
		$urutan = $this->input->post('urutan');
		$rules = $this->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() === FALSE) {
			$resp = array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $this->form_validation->error_array());
		} else {
			$arrErr = [];
			$cek = $this->ruangan_mdl->cekWhereKode(["$this->tblRuanganKey !=" => $id, 'namaRuangan' => $namaRuangan, "kelasId" => $kelasId, "urutan" => $urutan]);
			if ($cek) {
				$arrErr["namaRuangan"] = "Nama sudah terdaftar";
				$arrErr["kelasId"] = "Kelas sudah terdaftar";
			}
			if ($arrErr) {
				header('Content-Type: application/json');
				echo json_encode(array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $arrErr));
				exit;
			}
			$arrUpdate = array("jumlahKamar" => $jumlahKamar, "namaRuangan" => $namaRuangan, "kelasId" => $kelasId, "backgroundColor" => $backgroundColor, "foregroundColor" => $foregroundColor, "urutan" => $urutan);
			$ruangan = $this->ruangan_mdl->cekWhereKode(['ruanganId' => $id]);
			if ($ruangan) {
				$kamarTerpakai = $ruangan->jumlahKamar - $this->booking_mdl->check_available_room($id);
				if ($jumlahKamar >= $kamarTerpakai) {
					$updatetErr = $this->ruangan_mdl->updateErr(array("$this->tblRuanganKey" => $id), $arrUpdate);
					if ($updatetErr) {
						$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Gagal. " . $updatetErr);
					} else
						$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Merubah Data");
				} else {
					$arrErr["jumlahKamar"] = "Jumlah Kamar minimal $kamarTerpakai";
				}

				if ($arrErr) {
					header('Content-Type: application/json');
					echo json_encode(array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $arrErr));
					exit;
				}
			} else
				$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Invalid Data.");
		}
		echo json_encode($resp);
	}

#fungsi hapus menu ruangan
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
					$this->ruangan_mdl->deleteErr($id);
				}
				$resp = array('success' => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Berhasil Menghapus Data');
			}
		}
		echo json_encode($resp);
	}
}
