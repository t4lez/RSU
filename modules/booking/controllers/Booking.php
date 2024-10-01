<?php defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends MY_Admin
{
	var $userId;
	var $tblBooking;
	var $tblBookingKey;
	function __construct()
	{
		parent::__construct();
		$this->data['tpl'] = 'single';
		$this->userId = $this->ion_auth->user()->row()->user_id;

		// LOAD MODEL
		$this->load->model([
			"booking_mdl",
			"kelas/kelas_mdl",
			"ruangan/ruangan_mdl",
			"pasien/pasien_mdl"
		]);
		$this->tblBooking = $this->booking_mdl->tblData;
		$this->tblBookingKey = $this->booking_mdl->tblKey;
	}

#index menu booking
	function index()
	{
		$this->data['icon'] = 'fa fa-dashboard';
		$this->data['subicon'] = 'fa fa-dashboard';
		$this->data['tbl_title'] = 'Booking';
		$this->data['tbl_remark'] = 'Booking';
		$this->data['tbl_path'] = '/booking';
		$arrJoinRuangan = [
			[
				'table' => 'tbl_ruangan_kelas as k',
				'tableJoin' => 'k.kelasId = tbl_ruangan.kelasId',
				'joinType' => 'LEFT'
			]
		];
		$this->data['ruangan'] = $this->ruangan_mdl->get('*,k.namaKelas', [], $arrJoinRuangan);
		$this->data['pasien'] = $this->pasien_mdl->get();
		$this->data['kelas'] = $this->kelas_mdl->get();

		$this->data['content'] = $this->load->view('index', $this->data, true);
		$this->display();
	}

#fungsi ambil data booking
	function get_json()
	{
		$data = array($this->data['csrf']['name'] => $this->data['csrf']['hash'], 'total' => 0, 'rows' => array());
		$limit = isset($_GET['limit']) ? $_GET['limit'] : null;
		$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
		$search = (isset($_GET['search'])) ? $_GET['search'] : '';
		$sort = (isset($_GET['sort'])) ? $_GET['sort'] : "$this->tblBookingKey";
		$order = (isset($_GET['order'])) ? $_GET['order'] : 'desc';
		$filterKelas = $this->input->get('filterKelas');
		$filterRuangan = $this->input->get('filterRuangan');
		$select = "$this->tblBooking.*";
		$arrwhere = NULL;
		$arrlike = NULL;
		$arrJoin = [];
		$groupBy = "$this->tblBooking.$this->tblBookingKey";
		if (is_numeric($filterKelas))
			$arrwhere["$this->tblBooking.kelasId"] = $filterKelas;
		if (is_numeric($filterRuangan))
			$arrwhere["$this->tblBooking.ruanganId"] = $filterRuangan;
		if ($search <> '') {
			$arrlike = array(
				"lower($this->tblBooking.namaRuangan)" => strtolower($search),
				"lower($this->tblBooking.namaKelas)" => strtolower($search),
				"lower($this->tblBooking.namaPasien)" => strtolower($search),
			);
		}

		$row = $this->booking_mdl->data_by_id(
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
		$jml = $this->booking_mdl->get_count_record($select, $arrwhere, $arrlike, $arrJoin);
		$data = array("total" => $jml, "rows" => $row, "from" => $offset);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

#rules/aturan iputan form
	private function rules()
	{
		return [
			['field' => 'ruanganId', 'label' => 'Kelas', 'rules' => "trim|required"],
			['field' => 'statusPasien', 'label' => 'Status', 'rules' => 'trim|required'],
			['field' => 'pasienId', 'label' => 'Pasien', 'rules' => 'trim|required'],
			['field' => 'nama', 'label' => 'Nama', 'rules' => 'trim|required|max_length[60]'],
			['field' => 'noHp', 'label' => 'Nomor Telepon', 'rules' => 'trim|required|hp_check|alpha_dash'],
			['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'trim|required|max_length[100]'],
		];
	}

#fungsi/action nambah booking
	function add()
	{
		$rules = $this->rules();
		$status = $this->input->post('statusPasien');
		if ($status == '0') {
			unset($rules[2]);
		} else {
			unset($rules[3]);
			unset($rules[4]);
			unset($rules[5]);
		}
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$resp = array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $this->form_validation->error_array());
		} else {
			$ruanganId = $this->input->post('ruanganId');
			if ($this->booking_mdl->check_available_room($ruanganId)) {
				$ruangan = $this->ruangan_mdl->get('tbl_ruangan.*,k.namaKelas', ['tbl_ruangan.ruanganId' => $ruanganId], [
					[
						'table' => 'tbl_ruangan_kelas as k',
						'tableJoin' => 'k.kelasId=tbl_ruangan.kelasId',
						'joinType' => 'LEFT'
					]
				], true);
				$namaRuangan = $ruangan->namaRuangan ?? '';
				$namaKelas = $ruangan->namaKelas ?? '';
				$kelasId = $ruangan->kelasId ?? 0;
				$arrErr = [];
				if ($status == '0') {
					$nama = $this->input->post('nama');
					$alamat = $this->input->post('alamat');
					$telepon = str_replace("_", "", $this->input->post('noHp'));
					$telepon = hp_nol($telepon);
					$cek = $this->pasien_mdl->cekWhereKode(null, array('noHp' => $telepon));
					if ($cek) {
						if ($cek->noHp == $telepon)
							$arrErr["telepon"] = "Nomor Telepon Sudah Terdaftar, Gunakan Nomor lain";
					}
				} else {
					$pasienId = $this->input->post('pasienId');
					$pasien = $this->pasien_mdl->get('*', ['pasienId' => $pasienId], [], true);
					$nama = $pasien->nama ?? '';
					$alamat = $pasien->alamat ?? '';
					$telepon = $pasien->noHp ?? '';
				}
			} else {
				$arrErr["ruanganId"] = "Ruangan sudah penuh";
			}
			if ($arrErr) {
				$resp = array('success' => false, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Process Failed', 'errors' => $arrErr);
			} else {
				if ($status == '0') {
					$arrInsert = array("nama" => $nama, "alamat" => $alamat, "noHp" => $telepon, 'createAt' => date('Y-m-d H:i:s'));
					$insertErr = $this->pasien_mdl->insertErr($arrInsert);
					$pasienId = $this->db->insert_id();
				}
				$arrInsert = array("pasienId" => $pasienId, "ruanganId" => $ruanganId, "kelasId" => $kelasId, "namaPasien" => $nama, "alamat" => $alamat, "namaKelas" => $namaKelas, "namaRuangan" => $namaRuangan, 'createAt' => date('Y-m-d H:i:s'));
				$insertErr = $this->booking_mdl->insertErr($arrInsert);
				if ($insertErr) {
					$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Gagal. " . $insertErr);
				} else
					$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Menambahkan Data");
			}

		}
		header('Content-Type: application/json');
		echo json_encode($resp);
	}

#fungsi/action ubah status kamar
	function status()
	{
		$resp = array('success' => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Invalid');

		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim');
		if ($this->form_validation->run() === FALSE) {
			$resp = array('success' => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => validation_errors());
		} else {
			$kode = $this->input->post('kode');
			$status = $this->input->post('status');
			if ($this->booking_mdl->isDataExist($kode)) {
				$arrwhere = array("bookingId" => $kode);
				if ($this->booking_mdl->updateErr($arrwhere, array("status" => $status))) {
					$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Gagal. ");
				} else {
					$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Mengubah Status Pasien");
				}
			} else
				$resp = array("success" => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Invalid Data.");
		}
		echo json_encode($resp);
	}
}
