<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $this->alphalib->settings['webName']; ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url("assets/frontend"); ?>/plugins/boostrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url("assets/frontend"); ?>/plugins/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="<?= base_url("assets/frontend"); ?>/css/style.css">
	<script src="<?= base_url("assets/frontend"); ?>/plugins/jquery/jquery-3.7.1.min.js"></script>
	<link rel="shortcut icon" href="<?= base_url("uploads/logo/{$this->alphalib->settings['webFavicon']}"); ?>"
		type="image/x-icon">
</head>

<body>
	<nav class="navbar shadow">
		<div class="container">
			<a class="navbar-brand d-flex align-items-center gap-3" href="#">
				<img src="<?= base_url("uploads/logo/" . $this->alphalib->settings['webLogo']); ?>" alt="Logo"
					width="70" height="70" class="d-inline-block align-text-top">
				<p class="text-wrap fw-bold m-0 title"> <?=$this->alphalib->settings['webName'];?>
				</p>
			</a>
		</div>
	</nav>
	<main>
		<div class="container">
			<div id="carouselExampleControls" class="carousel slide mt-5 rounded-3 hero" data-bs-ride="carousel">
				<div class="carousel-inner h-100">
					<?php foreach ($banners as $key => $banner): ?>
						<div class="carousel-item h-100 <?= $key == 0 ? 'active' : ''; ?>">
							<img src="<?= base_url("uploads/banner/$banner->image"); ?>"
								class="img-fluid h-100 d-block w-100" alt="Banner <?= $key; ?>">
						</div>
					<?php endforeach ?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
					data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
					data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
			<!-- <div class="p-5 mt-5 rounded-3 hero" style="background-image: url('./assets/hero.png');">
				<div class="container-fluid py-5">
				</div>
			</div> -->
			<div class="mt-5 counter">
				<div class="d-flex justify-content-between align-items-center">
					<h1 class="title fw-bold">Informasi Kamar</h1>
					<img src="<?= base_url("assets/frontend/"); ?>/zoom.svg" data-bs-toggle="modal"
						href="#modalInfoDetail" role="button" class="action" width="30" height="30" alt="">
				</div>
				<div class="swiper mt-2" id="swiperPopular">
					<div class="swiper-wrapper py-3" id="cardHome">
					</div>
				</div>
				
			</div>
			<div class="my-5 counter d-flex flex-column align-items-center">
				<button class="btn btn-sm mb-3 px-4" style="background-color: #5EA3F0;color: white;">
					Total Kamar
				</button>
				<button class="btn rounded" style="background-color: #5EA3F0;color: white;padding: 7px 22px 7px 22px;">
					<span id="spanTotal" class="bg-white fw-bold" style="color: #004CA1; border: #004CA1 solid 3px;font-size: 30px;border-radius: 15px;padding: 3px 20px 3px 20px;">
						<?= $jumlah_kamar; ?>
					</span>
				</button>
			</div>
		</div>
		

		<style>
			.swiper {
				width: 100%;
				height: auto;
			}
			.nameRuang{
				white-space: nowrap;
			}
		</style>
		<!-- Modal Detail -->
		<div class="modal fade" id="modalInfoDetail" data-bs-backdrop="static" data-bs-keyboard="false"
			aria-hidden="true" aria-labelledby="modalInfoDetailLable" tabindex="-1">
			<div class="modal-dialog modal-fullscreen">
				<div class="modal-content">
					<div class="modal-header px-0 container-xl border-0">
						<div class="logo d-flex align-items-center gap-3">
							<img src="<?= base_url("uploads/logo/" . $this->alphalib->settings['webLogo']); ?>"
								alt="Logo" width="70" height="70" class="d-inline-block align-text-top">
							<p class="title text-wrap fw-bold m-0"><?=$this->alphalib->settings['webName'];?>
							</p>
						</div>
						
						<div>
							<button class="btn btn-sm fw-bold bg-info text-warning btn-timeleft">
								<span id="timeleft" class="text-danger"><? echo $inSecond;?></span>

						<button class="btn btn-sm text-uppercase fw-bold fs-5"
								style="background-color: #5EA3F0;color: white;margin-left: 30px;margin-right: 20px;">
								<div class="" id="clock"><?php echo $current_date; ?></div>
						</button>
						<img src="<?= base_url("assets/frontend/"); ?>/zoom.svg" data-bs-dismiss="modal"
							aria-label="Close" class="action" width="30" height="30" alt="">
						</div>
						
					</div>
					<div class="counter modal-body px-0 container-xl">
						<div class="position-relative border px-4 py-3" style="overflow-y: visible;">
							<button class="btn btn-sm position-absolute"
								style="top: -15px;right: 0;left: 0;width: max-content;margin-inline: auto;background-color: #5EA3F0;color: white;">
								INFORMASI KETERSEDIAAN KAMAR PASIEN
							</button>
							<!-- <button class="btn btn-sm text-uppercase fw-bold fs-5 btn-timeleft"
								style="background-color: #5EA3F0;color: white;margin-left: 30px;margin-right: 20px;">
								<div id="timeleft"><? echo $inSecond;?></div> -->
						</button>
							<!-- Slider main container -->
							<div id="cardRuang">
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</main>
	<script>
		
		var timeRuangUpdate=<? echo $inSecond;?>;
        function startTime() {
            var today = new Date();
            var y = today.getFullYear();
            var mo = today.getMonth();
            var d = today.getDate();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            mo = monthNames[mo];
            d = checkTime(d);
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('clock').innerHTML = d + " " + mo + " " + y + " " + h + ":" + m + ":" + s;
        }

        function checkTime(i) {
            if (i < 10) { i = "0" + i; } // Menambahkan nol di depan angka yang kurang dari 10
            return i;
        }

        // Update time every second
        setInterval(startTime, 1000);
        
        
    </script>
	<script type="text/javascript">
		/*ini untuk resize font*/
		$(document).ready(function () {
			/*$('#modalInfoDetail').on('shown.bs.modal', function(){
			  // code here
			});*/

			for(const element of document.getElementsByClassName("nameRuang")){
			        var size = parseInt(getComputedStyle(element).getPropertyValue('font-size'));
			        const parent_width = parseInt(getComputedStyle(element.parentElement).getPropertyValue('width'))
			        while(element.offsetWidth > parent_width)
			        {
			            element.style.fontSize = size + "px"
			            size -= 1
			        }
			}

			/*untuk auto load*/
			getHome('<?=base_url('welcome/servicehome')?>'); 
			getDataRuang('<?=base_url('welcome/serviceHomeRuang')?>'); 

			/*fungsi get data home awal*/
			function getHome(url) {
				$.getJSON(url, function(data) {
	  	        $('#cardHome').fadeOut(1500, function() {
				    $(this).html(data.html).fadeIn(200);
				});
				$('#spanTotal').fadeOut(1500, function() {
				    $(this).html(data.totalKamar).fadeIn(200);
				});
			  });
			}
			setInterval(function() {
			  	getHome('<?=base_url('welcome/servicehome')?>'); 
			}, 10000);

			new Swiper('#swiperPopular', {
				// Optional parameters
				autoplay: true,
				slidesPerView: 1,
				spaceBetween: 30,
				loop: true,
				grabCursor: true,
				/*autoplay: 50000,*/
				// If we need pagination
				pagination: {
					el: '.swiper-pagination',
				},
				// Navigation arrows
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
				// And if we need scrollbar
				scrollbar: {
					el: '.swiper-scrollbar',
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

			/*untuk get data ruang/modal*/
			function getDataRuang(url) {
				$.getJSON(url, function(data) {
	  	        $('#cardRuang').fadeOut(1500, function() {
				    $(this).html(data.html).fadeIn(200);
				    timeRuangUpdate = data.interval;
				    $(".btn-timeleft").addClass("d-none");
				    //$("#btn-timeleft").hide();
				});
			  });
			}

			var interval = setInterval(setRefreshInterval, 1000);
			function setRefreshInterval()
			{
			     timeRuangUpdate--
			     /*console.log('running');
			     console.log(timeRuangUpdate);*/
			  	if (timeRuangUpdate == 1) {
			        clearInterval(interval);
			        getDataRuang('<?=base_url('welcome/serviceHomeRuang')?>'); 
			        interval = setInterval(setRefreshInterval, 1000);
			    }
			    if (timeRuangUpdate >0 && timeRuangUpdate < 6) {
			    	$(".btn-timeleft").removeClass("d-none");
			    	$("#timeleft").html(timeRuangUpdate);
			    }
			}

			/*setInterval(function() {
			  	getDataRuang('<?=base_url('welcome/serviceHomeRuang')?>'); 
			}, <? echo $inReload;?>);*/
		});
		
	</script>
	
	<script src="<?= base_url("assets/frontend/"); ?>/plugins/swiper/swiper-bundle.min.js"></script>
	<script src="<?= base_url("assets/frontend/"); ?>/plugins/boostrap/popper.min.js"></script>
	<script src="<?= base_url("assets/frontend/"); ?>/plugins/boostrap/bootstrap.min.js"></script>
	
</body>

</html>