<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/*
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : ibeae
 * Email : warunggiras42@gmail.com
 * Description : 
 * ***************************************************************
 */
class Alphalib
{
	private $appVersion = '1.0.0';
	private static $timezone = 'Asia/Jakarta';

	var $settings;

	private $ci = "";

	public function __construct($options = array())
	{
		$this->ci = &get_instance();
		$this->get_setting();
	}

	function get_setting()
	{
		$row = $this->ci->db->get('tbl_config');
		if ($row->num_rows() > 0) {
			foreach ($row->result() as $value) {
				$this->settings[$value->keyKode] = $value->keyValue;
			}
			//return $this->settings = $row->row();
		} else
			return FALSE;
	}

	

}
