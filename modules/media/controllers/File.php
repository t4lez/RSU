<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends MY_Admin
{
	var $userId;
	var $folder;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('file_manager_mdl');
		$this->userId = $this->ion_auth->user()->row()->user_id;
		$this->folder = 'file-manager';
	}

	/**
	 * --------------------------------------------------------------------------
	 * File Manager Image Upload
	 * --------------------------------------------------------------------------
	 */

	//upload file manager image
	public function upload_file_manager_image()
	{
		$data = [
			$this->data['csrf']['name'] => $this->data['csrf']['hash'],
			'error' => '',
		];
		// check request only ajax
		$this->input->is_ajax_request() ? true : show_404();
		$file = $_FILES['file'];
		$file_name = null;
		$max_size = 1024;
		$allow_format = 'jpg|jpeg|png|webp|avif';
		$path = config_item('data_path') . $this->folder;
		$data['error'] = check_file_upload($file, $allow_format, $max_size, true);
		upload($path, $allow_format, $max_size);
		if ($this->upload->do_upload('file')) {
			$file_name = $this->upload->data('file_name');
		}

		if (!empty($file_name)) {
			$payload = [
				'nama' => $file_name,
				'createBy' => $this->userId,
			];
			$this->file_manager_mdl->insert($payload);
		}
		echo json_encode($data);
	}

	//get file manager images
	public function get_file_manager_images()
	{
		$path = base_url("uploads/$this->folder");
		$data = [
			$this->data['csrf']['name'] => $this->data['csrf']['hash'],
			'result' => 0,
			'content' => ''
		];
		$images = $this->file_manager_mdl->get(['tbl_file_manager.createBy' => $this->userId]);
		if (!empty($images)) {
			foreach ($images as $image) {
				$src = "$path/$image->nama";
				$data['content'] .= "<div class='col-file-manager' id='ckimg_col_id_$image->fileManagerId'>";
				$data['content'] .= "<div class='file-box' data-file-id='$image->fileManagerId' data-file-path='$src'>";
				$data['content'] .= "<div class='image-container'>";
				$data['content'] .= "<img src='$src' alt='' class='img-responsive img-fluid'>";
				$data['content'] .= "</div></div> </div>";
				$this->session->set_userdata("fm_last_ckimg_id", $image->fileManagerId);
			}
		}
		$data['result'] = 1;
		echo json_encode($data);
	}

	//delete file manager image
	public function delete_file_manager_image()
	{
		// check request only ajax
		$this->input->is_ajax_request() ? true : show_404();
		$data = [
			$this->data['csrf']['name'] => $this->data['csrf']['hash'],
		];
		$path = config_item('data_path') . $this->folder;
		$fileManagerId = $this->input->post('file_id', true);
		$where = ['tbl_file_manager.fileManagerId' => $fileManagerId, 'tbl_file_manager.createBy' => $this->userId];
		$result = $this->file_manager_mdl->get($where, true);
		if ($result) {
			$this->file_manager_mdl->delete($fileManagerId);
			// hapus file lama jika berhasil upload
			file_exists("$path/$result->nama") && $result->nama ? unlink("$path/$result->nama") : false;
		}
		echo json_encode($data);
	}
}

/* End of file File.php */
