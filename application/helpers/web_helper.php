<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

function pause($data = NULL)
{
	if ($data) {
		print_r($data);
		exit;
	} else {
		$ci = &get_instance();
		print_r($ci->db->last_query());
		exit;
	}
}
function de($plaintex)
{
	$password = 'm4ypartner';
	$method = 'aes-256-cbc';
	$password = substr(hash('sha256', $password, true), 0, 32);
	$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
	return $decrypted = openssl_decrypt(base64_decode($plaintex), $method, $password, OPENSSL_RAW_DATA, "jadirejekiberkah");
}
/*function tglmin($date){
	$xmasDay = new DateTime($date.' - 3 day');
	return $xmasDay->format('Y-m-d'); // 2010-12-25
}*/
function tglmin($date, $hari = 15)
{
	$xmasDay = new DateTime($date . ' - ' . $hari . ' day');
	return $xmasDay->format('Y-m-d'); // 2010-12-25
}
function toRupiah($str)
{
	if (is_numeric($str)) {
		return number_format($str, 0, ',', '.');
	} else
		return $str;
}
function hp_62($hp)
{
	if (substr($hp, 0, 1) == "0")
		return "62" . trim(ltrim(substr($hp, 1)));
	else if (substr($hp, 0, 2) == "62")
		return $hp;
	else
		return "Salah Format. Ex:62";
}
function hp_nol($hp)
{
	if (substr($hp, 0, 2) == "62")
		return "0" . trim(ltrim(substr($hp, 2)));
	else if (substr($hp, 0, 1) == "0")
		return $hp;
	else
		return $hp;
}
function hp_check($str)
{
	if (substr($str, 0, 1) == "0" || substr($str, 0, 2) == "62")
		return TRUE;
	else {
		$ci = get_instance();
		$ci->form_validation->set_message('hp_check', 'Nomor {field} di awali dengan 0 atau 62');
		return FALSE;
	}
}
function date_timestamp()
{
	$date = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
	return $date->getTimestamp();
}
function clean($string)
{
	$string = str_replace(array(";", "#", " "), ".", $string);
	return preg_replace('/[^A-Za-z0-9\.]/', '', $string);
}
function resp_error($code, $msg)
{
	return array("code" => $code, "msg" => $msg);
}
function respon_json($respon)
{
	$decode = json_decode($respon, true);
	if ($decode === null && json_last_error() !== JSON_ERROR_NONE) {
		return FALSE;
	} else {
		return $decode;
	}
}

function generateProduk($prefix = "P", $length = 5)
{
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $prefix . $randomString;
}
function generateAp($length = 10, $prefix = "AP")
{
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $prefix . $randomString;
}

function get_month_diff($start, $end = FALSE)
{
	$end or $end = time();

	$start = new DateTime("@$start");
	$end = new DateTime("@$end");
	$diff = $start->diff($end);

	return $diff->format('%y') * 12 + $diff->format('%m');
}

function date_sekarang($format = NULL)
{
	$date = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
	return $date->format(($format) ? $format : "Y-m-d H:i:s");
}
function timeAdd($add, $format = NULL)
{
	$date = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
	$date->modify('+' . (int) $add . ' minutes');
	if ($format)
		return $date->format($format);
	else
		return $date->getTimestamp();
}
function dateAdd($add, $format = NULL)
{
	$dt = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
	//echo $dt->format('Y-m-d'), PHP_EOL;
	$day = $dt->format('j');
	$dt->modify('first day of +' . (int) $add . ' month');
	$dt->modify('+' . (min($day, $dt->format('t')) - 1) . ' days');

	//return $dt->format('Y-m-d H');
	return $dt->format('Y-m-d H:i:s');
}
function reformatDate($date, $from_format = 'd/m/Y', $to_format = 'Y-m-d')
{
	$date_aux = date_create_from_format($from_format, $date);
	return date_format($date_aux, $to_format);
}
function validateDate($date, $format = 'Y-m')
{
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}

function existImg($folder, $name)
{
	$blankImg = BASE_URL("assets/image/blank.png");
	return ($name && @getimagesize(FCPATH . $folder . $name)) ? BASE_URL($folder . $name) : $blankImg;
}

function isOrderClosed($val)
{
	return ($val == 1) ? TRUE : FALSE;
}

function str_lreplace($search, $replace, $subject)
{
	$pos = strrpos($subject, $search);

	if ($pos !== false) {
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}

	return $subject;
}
//for slugify helper
function utf8_uri_encode($utf8_string, $length = 0)
{
	$unicode = '';
	$values = array();
	$num_octets = 1;
	$unicode_length = 0;

	$string_length = strlen($utf8_string);
	for ($i = 0; $i < $string_length; $i++) {

		$value = ord($utf8_string[$i]);

		if ($value < 128) {
			if ($length && ($unicode_length >= $length))
				break;
			$unicode .= chr($value);
			$unicode_length++;
		} else {
			if (count($values) == 0)
				$num_octets = ($value < 224) ? 2 : 3;

			$values[] = $value;

			if ($length && ($unicode_length + ($num_octets * 3)) > $length)
				break;
			if (count($values) == $num_octets) {
				if ($num_octets == 3) {
					$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
					$unicode_length += 9;
				} else {
					$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
					$unicode_length += 6;
				}

				$values = array();
				$num_octets = 1;
			}
		}
	}

	return $unicode;
}

//for slugify helper
function seems_utf8($str)
{
	$length = strlen($str);
	for ($i = 0; $i < $length; $i++) {
		$c = ord($str[$i]);
		if ($c < 0x80)
			$n = 0; # 0bbbbbbb
		elseif (($c & 0xE0) == 0xC0)
			$n = 1; # 110bbbbb
		elseif (($c & 0xF0) == 0xE0)
			$n = 2; # 1110bbbb
		elseif (($c & 0xF8) == 0xF0)
			$n = 3; # 11110bbb
		elseif (($c & 0xFC) == 0xF8)
			$n = 4; # 111110bb
		elseif (($c & 0xFE) == 0xFC)
			$n = 5; # 1111110b
		else
			return false; # Does not match any model
		for ($j = 0; $j < $n; $j++) { # n bytes matching 10bbbbbb follow ?
			if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
				return false;
		}
	}
	return true;
}

//for slugify : text with spacec to text-with-space
function slugify($title = '')
{
	//return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', trim($txt))));

	$title = strip_tags($title);
	// Preserve escaped octets.
	$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
	// Remove percent signs that are not part of an octet.
	$title = str_replace('%', '', $title);
	// Restore octets.
	$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

	if (seems_utf8($title)) {
		if (function_exists('mb_strtolower')) {
			$title = mb_strtolower($title, 'UTF-8');
		}
		$title = utf8_uri_encode($title, 200);
	}

	$title = strtolower($title);
	$title = preg_replace('/&.+?;/', '', $title); // kill entities
	$title = str_replace('.', '-', $title);
	$title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
	$title = preg_replace('/\s+/', '-', $title);
	$title = preg_replace('|-+|', '-', $title);
	$title = trim($title, '-');

	return $title;
}

function upload($path = null, $allow_type = '*', $max_size = null)
{
	if (!file_exists($path)) {
		mkdir($path, 0775);
		umask(012);
	}
	if (!is_writable(dirname($path)))
		umask(012);

	$CI = &get_instance();
	$CI->load->library('upload');
	$config['upload_path'] = $path;
	$config['allowed_types'] = $allow_type;
	$config['encrypt_name'] = true;
	if ($max_size) {
		$config['max_size'] = $max_size;
	}
	$CI->upload->initialize($config);
}

function check_file_upload($file, $allow_type = '*', $max_file = null, $optional = true)
{
	$CI = &get_instance();
	$CI->load->helper('number');
	$file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
	$file_size = $file['size'];
	$file_type = $file['type'];
	$mime_type = $file['tmp_name'] ? mime_content_type($file['tmp_name']) : '';
	$max_file = $max_file ? $max_file * 1000 : null;
	$allow_type = explode('|', $allow_type);
	$str_error = "";
	$mime_config = &get_mimes();
	if ($optional) {
		if ($file['name']) {
			if ($file_size > $max_file && $max_file) {
				$str_error = "Ukuran file terlalu besar max " . byte_format($max_file) . "!";
				// } elseif ((!in_array($file_ext, $allow_type) || $file_type != $mime_type) && $allow_type != '*') {
			} elseif ((!in_array($file_ext, $allow_type) || !in_array($mime_type, is_array($mime_config[$file_ext]) ? $mime_config[$file_ext] : [$mime_config[$file_ext]])) && $allow_type != '*') {
				if ($mime_type == 'application/x-empty') {
					$str_error = "Isi file kosong!";
				} else {
					$str_error = "Format file tidak didukung!";
				}
			}
		}
	} else {
		if (!$file['name']) {
			$str_error = "File belum diupload!";
		} elseif ($file_size > $max_file && $max_file) {
			$str_error = "Ukuran file terlalu besar max " . byte_format($max_file) . "!";
			// } elseif ((!in_array($file_ext, $allow_type) || $file_type != $mime_type) && $allow_type != '*') {
		} elseif ((!in_array($file_ext, $allow_type) || !in_array($mime_type, is_array($mime_config[$file_ext]) ? $mime_config[$file_ext] : [$mime_config[$file_ext]])) && $allow_type != '*') {
			if ($mime_type == 'application/x-empty') {
				$str_error = "Isi file kosong!";
			} else {
				$str_error = "Format file tidak didukung!";
			}
		}
	}
	if ($str_error) {
		return $str_error;
	} else {
		return '';
	}
}
function summary_text($text = '', $length = 0, $separator = '...')
{
	if (strlen($text) > $length && $length != 0) {
		return substr($text, 0, $length) . $separator;
	}
	return $text;
}
function formatSizeUnits($bytes)
{
	if ($bytes >= 1073741824) {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	} elseif ($bytes >= 1048576) {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	} elseif ($bytes >= 1024) {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	} elseif ($bytes > 1) {
		$bytes = $bytes . ' bytes';
	} elseif ($bytes == 1) {
		$bytes = $bytes . ' byte';
	} else {
		$bytes = '0 bytes';
	}

	return $bytes;
}

function nice_time($date)
{
	if (empty($date)) {
		return false;
	}
	$periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "dekade");
	$lengths = array("60", "60", "24", "7", "4.35", "12", "10");
	$now = time();
	$unix_date = strtotime($date);

	// check validity of date
	if (empty($unix_date)) {
		return false;
	}
	// is it future date or past date
	if ($now > $unix_date) {
		$difference = $now - $unix_date;
		$tense = "yang lalu";
	} else {
		$difference = $unix_date - $now;
		$tense = "dari sekarang";
	}

	for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
		$difference /= $lengths[$j];
	}

	$difference = round($difference);

	if ($difference != 1) {
		//$periods[$j].= "s";
	}

	return "$difference $periods[$j] {$tense}";
}

function image_name($name, $directory, $extension = 'png', $type = 'initials')
{
	$filename = bin2hex(random_bytes(16)) . "." . $extension;
	$data = file_get_contents("https://avatars.dicebear.com/api/$type/$name.$extension");
	file_put_contents("$directory/$filename", $data);
	return $filename;
}

function distance($lat1, $lon1, $lat2, $lon2, $unit)
{
	if (($lat1 == $lat2) && ($lon1 == $lon2)) {
		return 0;
	} else {
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}
}
