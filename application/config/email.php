<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['protocol']     = 'smtp';
$config['smtp_host']    = 'ssl://smtp.gmail.com';
$config['smtp_port']    = '465';
$config['smtp_timeout'] = '7';
$config['smtp_user']    = '';
$config['smtp_pass']    = '';
$config['charset']      = 'utf-8';
$config['newline']      = "\r\n";
$config['mailtype']     = 'html';
$config['smtp_crypto']  = 'ssl';
$config['wordwrap']     = TRUE;


/* End of file email.php */
