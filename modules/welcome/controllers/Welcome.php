<?php defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'setting/banner_mdl',
			'ruangan/ruangan_mdl',
			'booking/booking_mdl',
			'kelas/kelas_mdl'
		]);
	}

#fungsi index tampilan depan
	public function index()
	{
		$this->data['tpl'] = 'index';
		$this->data['banners'] = $this->banner_mdl->get();
		$this->data['jumlah_kamar'] = $this->ruangan_mdl->count_all();
		$this->data['populars'] = $this->ruangan_mdl->get_popular_by_kelas();
		$this->data['kelas'] = $this->kelas_mdl->data_by_id(null, null, 'namaKelas', 'ASC', '*');
		$date = new DateTime();

		$totalRuang = $this->ruangan_mdl->count_ruang();
		$totalKelas = $this->ruangan_mdl->count_kelas();
		$subKelas = ceil($totalRuang/$totalKelas);
		$kolom = ($subKelas>3) ? $subKelas : 3;
		$this->data['inReload'] = (($kolom*3)+1)*1000;
		$this->data['inSecond'] = ($kolom*3)+1;
		//pause($this->data['inReload']);
        $this->data['current_date'] = $date->format('j F Y');
        $this->data['current_time'] = $date->format('H:i:s');
		$this->display();
	}

	public function serviceHome()
	{
		$res = $this->ruangan_mdl->get_popular_by_kelas();
		$total = count($res); 
		$totalKamar = $this->ruangan_mdl->count_all();
		$html="";
		if($total > 0){
			foreach ($res as $key => $row) {
				$html .= '<div class="swiper-slide item card px-2 border-0 shadow" style="width: 200px;">
						<div class="row gx-0 gy-3 py-2">
							<div class="bg-rpda text-rpda py-3 col-md-4 d-flex align-items-center justify-content-center rounded flex-column"
								style="background-color:'.$row->backgroundColor.';">
								<h2 class="title fw-bold m-0" style="color: '.$row->foregroundColor.';">
									'.$row->total.'
								</h2>
								<p class="subtitle m-0" style="color: '. $row->foregroundColor.';">Total Kamar
								</p>
							</div>
							<div class="col-md-8">
								<div class="info card-body py-0">
									<h3 class="fw-bold m-0">Ruang</h3>
									<p class="text-rpda fw-bold m-0"
										style="color: '. $row->foregroundColor.' !important;">
										'. $row->namaRuangan.'
									</p>
									<h3 class="fw-bold m-0">Kelas</h3>
									<p class="text-rpda fw-bold m-0"
										style="color: '. $row->foregroundColor.' !important;">
										'. $row->namaKelas.'
									</p>
								</div>
							</div>
						</div>
					</div>';	
			}
		}else
			$html = '<div class="swiper-slide item card px-2 border-0 shadow" style="width: 200px;">
						<div class="row gx-0 gy-3 py-2">
							<div class="bg-rpda text-rpda py-3 col-md-4 d-flex align-items-center justify-content-center rounded flex-column" style="">
								<h2 class="title fw-bold m-0" style="">0</h2>
								<p class="subtitle m-0" style="">Total Kamar
								</p>
							</div>
							<div class="col-md-8">
								<div class="info card-body py-0">
									<h3 class="fw-bold m-0">Ruang</h3>
									<p class="text-rpda fw-bold m-0" style=""></p>
									<h3 class="fw-bold m-0">Kelas</h3>
									<p class="text-rpda fw-bold m-0" style=""></p>
								</div>
							</div>
						</div>
					</div>';

		$data = array("total" => $total, "totalKamar" => $totalKamar, "html" => $html);
		header('Content-Type: application/json');
		echo json_encode($data);
	}


	public function serviceHomeRuang(){

		$totalRuang = $this->ruangan_mdl->count_ruang();
		$totalKelas = $this->ruangan_mdl->count_kelas();
		$subKelas = ceil($totalRuang/$totalKelas);
		$kolom = ($subKelas>3) ? $subKelas : 3;
		$inReload = (($kolom*3)+1)*1000;
		$inSecond = ($kolom*3)+1;

		$html = "";
		$ckelas = 0;
		$cruang = $this->ruangan_mdl->count_ruang();
		$kelas = $this->kelas_mdl->data_by_id(null, null, 'namaKelas', 'ASC', '*');
		foreach ($kelas as $ky => $row){
			$html .= '<div class="swiper" id="swiper'.$row->kelasId.'">';
				$ruangan = $this->ruangan_mdl->data_by_id(null, null, 'urutan', 'ASC', '*', ['kelasId' => $row->kelasId], );
				
				$html .='<div class="swiper-wrapper py-3">';
					foreach ($ruangan as $key => $data){
						$html .='<div class="swiper-slide item card px-2 border-0 shadow" style="width: 200px;">
							<div class="row gx-0 gy-3 py-2">
								<div class="bg-rpda text-rpda py-3 col-md-4 d-flex align-items-center justify-content-center rounded flex-column"
									style="background-color: '. $data->backgroundColor.';">
									<h2 class="title fw-bold m-0"
										style="color: '. $data->foregroundColor.';">
										'. $this->booking_mdl->check_available_room($data->ruanganId).'
									</h2>
									<p class="subtitle m-0" style="color: '. $data->foregroundColor.';">
										Kamar tersisa
									</p>
								</div>
								<div class="col-md-8">
									<div class="info card-body py-0">
										<h3 class="fw-bold m-0">Ruang</h3>
										<p class="text-rpda fw-bold m-0 nameRuang" style="color: '. $data->foregroundColor.';">
											'. $data->namaRuangan.'
										</p>
										<h3 class="fw-bold m-0">Kelas</h3>
										<p class="text-rpda fw-bold m-0"
											style="color: '. $data->foregroundColor.';">
											'. $row->kelasId.'
										</p>
									</div>
								</div>
							</div>
						</div>';
					}
				$html .='</div>
			</div>
			<script>
				$(document).ready(function () {
				new Swiper(`#swiper'.$row->kelasId.'`, {
											autoplay: true,
											slidesPerView: 1,
											spaceBetween: 30,
											loop: true,
											autoplay: {
											   delay: 3600,
											},
											grabCursor: true,
											// If we need pagination
											pagination: {
												el: `.swiper-pagination`,
											},
											navigation: {
												nextEl: `.swiper-button-next`,
												prevEl: `.swiper-button-prev`,
											},
											// And if we need scrollbar
											scrollbar: {
												el: `.swiper-scrollbar`,
											},
											breakpoints: {
												768: {
													slidesPerView: 2,
													spaceBetween: 20,
												},
												992: {
													slidesPerView: 3,
													spaceBetween: 30,
												},
											},
										});
				});
			</script>';
			
		}

		$data = array("total" => 0, "totalKelas" =>$ckelas, "totalKamar" => $cruang,"interval" => $inSecond, "html" => $html);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

}

/* End of file Welcome.php */
