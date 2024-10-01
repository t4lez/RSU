<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
    var $date;
    var $ulpId;

    function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $this->date = date("Y-m-d");
    }

    

}