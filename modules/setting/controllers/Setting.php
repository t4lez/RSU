<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Admin
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
		$this->load->model([
			'banner_mdl',
			'config_mdl',
			'media/file_manager_mdl'
		]);
	}

	#fungsi index menu setting
	function index()
	{
		$this->data['icon'] = 'fa fa-dashboard';
		$this->data['subicon'] = 'fa fa-dashboard';
		$this->data['tbl_title'] = 'Setting';
		$this->data['tbl_remark'] = 'Setting';
		$this->data['tbl_path'] = '/setting';

		$data = $this->data;
		$data['css'] = css_asset('styles.css', 'file-uploader');
		$data['css'] .= css_asset('jquery.dm-uploader.min.css', 'file-uploader');
		$data['css'] .= css_asset('file-manager.css', 'file-manager');
		$data['js'] = js_asset('jquery.dm-uploader.min.js', 'file-uploader');
		$data['js'] .= js_asset('ui.js', 'file-uploader');
		$data['js'] .= js_asset('file-manager.js', 'file-manager');
		$data['banners'] = $this->banner_mdl->get();

		$data['fileManager'] = $this->file_manager_mdl->get(['createBy' => $this->ion_auth->user()->row()->user_id]);
		$this->data['content'] = $this->load->view('index', $data, true);
		$this->display();
	}

	#rule form setting
	private function rules()
	{
		return [
			['field' => 'webName', 'label' => 'Nama', 'rules' => 'trim|htmlspecialchars|required|max_length[200]'],
			['field' => 'jmlRuang', 'label' => 'Jumlah Ruang', 'rules' => 'trim|htmlspecialchars|numeric|required|max_length[3]'],
			/*['field' => 'webDescription', 'label' => 'Deskripsi', 'rules' => 'trim|required'],
			['field' => 'webAddress', 'label' => 'Alamat', 'rules' => 'trim|htmlspecialchars|required'],
			['field' => 'webWhatsapp', 'label' => 'No Whatsapp', 'rules' => 'trim|htmlspecialchars|required'],*/
		];
	}

	#action update setting
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
			'message' => 'Gagal Mengubah Data!'
		];
		// validation request
		$rules = $this->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			// throw error per field
			$result['error'] = $this->form_validation->error_array();
		} else {
			$payload = $this->input->post();
			unset($payload['ci_csrf_token']);
			foreach ($payload as $key => $value) {
				$value = $key == 'webWhatsapp' ? str_replace(' ', '', $webWhatsapp) : $value;
				$this->config_mdl->updateErr(['keyKode' => $key], ['keyValue' => $value]);
			}
			$result['success'] = true;
			$result['message'] = 'Berhasil Merubah Data!';
		}
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	#fungsi update logo/favicon
	public function update_single()
	{
		$resp = array('success' => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Invalid');
		$webFavicon = $_FILES['webFavicon'];
		$webLogo = $_FILES['webLogo'];
		$webLogoSecondary = $_FILES['webLogoSecondary'];
		$max_size = 1024;
		$allow_format = 'jpg|jpeg|png|ico|icon';
		$path = config_item('data_path') . "logo";
		$error_webFavicon = check_file_upload($webFavicon, $allow_format, $max_size);
		$error_webLogo = check_file_upload($webLogo, $allow_format, $max_size);
		$error_webLogoSecondary = check_file_upload($webLogoSecondary, $allow_format, $max_size);
		$file_error = [];
		$error_webFavicon ? $file_error['webFavicon'] = $error_webFavicon : true;
		$error_webLogo ? $file_error['webLogo'] = $error_webLogo : true;
		$error_webLogoSecondary ? $file_error['webLogoSecondary'] = $error_webLogoSecondary : true;
		if ($file_error) {
			$resp['errors'] = $file_error;
		} else {
			$arrUpdate = [];
			if ($webFavicon['name']) {
				upload($path, $allow_format, $max_size);
				if ($this->upload->do_upload('webFavicon')) {
					$arrUpdate['webFavicon'] = $this->upload->data('file_name');
				}
			}
			if ($webLogo['name']) {
				upload($path, $allow_format, $max_size);
				if ($this->upload->do_upload('webLogo')) {
					$arrUpdate['webLogo'] = $this->upload->data('file_name');
				}
			}
			if ($webLogoSecondary['name']) {
				upload($path, $allow_format, $max_size);
				if ($this->upload->do_upload('webLogoSecondary')) {
					$arrUpdate['webLogoSecondary'] = $this->upload->data('file_name');
				}
			}
			$pengaturan = $this->alphalib->settings;
			foreach ($arrUpdate as $key => $val) {
				if (isset($pengaturan[$key])) {
					$errUpdate = $this->config_mdl->updateErr(['keyKode' => $key], ['keyValue' => $val]);
					if (!$errUpdate) {
						$pengaturan[$key] && file_exists("$path/$pengaturan[$key]") ? unlink("$path/$pengaturan[$key]") : false;
					}
				} else
					$insertErr = $this->config_mdl->insertErr(['keyKode' => $key, 'keyValue' => $val, 'keyStatus' => 1]);
			}
			$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Mengubah Data.");
		}
		echo json_encode($resp);
	}

	#fungsi upload banner/slider
	public function update_multiple()
	{
		$resp = array('success' => FALSE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], 'msg' => 'Invalid');
		$allow_format = 'jpg|jpeg|png';
		$path = config_item('data_path') . "banner";
		$max_size = 1024;
		$file_error = [];
		for ($i = 1; $i <= 5; $i++) {
			$banner = $_FILES["banner$i"];
			$error_banner = check_file_upload($banner, $allow_format, $max_size);
			$error_banner ? $file_error["banner$i"] = $error_banner : true;
		}
		if ($file_error) {
			$resp['errors'] = $file_error;
		} else {
			for ($i = 1; $i <= 5; $i++) {
				if ($_FILES["banner$i"]['name']) {
					upload($path, $allow_format, $max_size);
					if ($this->upload->do_upload("banner$i")) {
						$old_image = $this->banner_mdl->get('*', ['bannerId' => $i], [], true)->image ?? '';
						$file_name = $this->upload->data('file_name');
						$errUpdate = $this->banner_mdl->updateErr(['bannerId' => $i], ['image' => $file_name]);
						if (!$errUpdate) {
							$old_image && file_exists("$path/$old_image") ? unlink("$path/$old_image") : false;
						}
					}
				}
			}
			$resp = array("success" => TRUE, $this->data['csrf']['name'] => $this->data['csrf']['hash'], "msg" => "Berhasil Mengubah Data.");
		}
		echo json_encode($resp);
	}
}

/* End of file Proyek.php */
