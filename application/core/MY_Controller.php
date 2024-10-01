<?php (defined('BASEPATH')) or exit('No direct script access allowed');
class MY_Controller extends MX_Controller
{
	var $data;
	var $CI;
	var $MYCFG;
	var $parentMenu;

	function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);

		$this->CI = &get_instance();
		$this->MYCFG = $this->CI->config->item('app');
		$this->data['MYCFG'] = $this->MYCFG;

		//generate csrf
		$this->data['csrf']['name'] = $this->CI->security->get_csrf_token_name();
		$this->data['csrf']['hash'] = $this->CI->security->get_csrf_hash();

		$this->data['content'] = (isset($this->data['content'])) ? $this->data['content'] : 'Content Goes Here';
	}

	function __nocache()
	{
		$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
	}

	function __current_session_user()
	{
		if ($this->ion_auth->logged_in()) {
			$this->session->userdata['username'] = $this->ion_auth->user()->row()->username;
			$this->session->userdata['first_name'] = $this->ion_auth->user()->row()->first_name;
			$this->session->userdata['last_name'] = $this->ion_auth->user()->row()->last_name;
			$this->session->userdata['phone'] = $this->ion_auth->user()->row()->phone;

			$usr_groups = $this->ion_auth->get_users_groups()->result();
			$this->session->userdata['user_group'] = $usr_groups[0]->id;
			$this->session->userdata['group_name'] = $usr_groups[0]->name;
		}
	}

	function displayName($param = "sss")
	{
		$this->parentMenu = $param;
		return $param;
	}

	function display()
	{
		$tpl = $this->data['tpl'];
		$this->load->view($tpl, $this->data);
	}

}

class MY_Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
			redirect('/logout');
		$this->__current_session_user();
		$this->path_theme = 'adminpanel';
	}

	function display()
	{		
		$this->data['MYCFG'] = $this->MYCFG;
		$tpl = $this->path_theme . '/' . $this->data['tpl'];
		$this->load->view($tpl, $this->data);
	}

}
