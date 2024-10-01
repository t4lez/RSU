<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login - App</title>
	<meta charset="utf-8" />
	<meta name="description" content="Auth" />
	<meta name="keywords" content="Auth" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="canonical" href="<?= base_url(); ?>" />
	<link rel="shortcut icon" href="<?= base_url("uploads/logo/{$this->alphalib->settings['webFavicon']}"); ?>" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<?php echo css_asset('plugins.bundle.css'); ?>
	<?= css_asset('style.bundle.css'); ?>
	<?= css_asset('ripple.css', 'ripple'); ?>
	<?= css_asset('style.css'); ?>
	<style>
		.bg-login {
			background-image: url(<?= image_asset_url("misc_login.png") ?>);
		}

		[data-theme="dark"] .bg-login {
			background-image: url(<?= image_asset_url("misc_login_dark.png") ?>);
		}
	</style>
</head>

<body data-kt-name="metronic" id="kt_body" class="app-blank app-blank">
	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<!-- LEFT KONTEN -->
			<div
				class="bg-login d-flex flex-column flex-lg-row-fluid w-lg-50 h-100 py-3 px-0 justify-content-center bgi-size-cover bgi-position-center bgi-no-repeat">
				<!-- KONTEN -->
				<div class="d-flex flex-center flex-column flex-lg-row-fluid">
					<div class="w-lg-500px p-10">
						<!-- LOGO -->
						<div class="w-80px h-80px">
							<img width="100%" height="100%" class="img-fluid"
								src="<?= base_url("uploads/logo/{$this->alphalib->settings['webLogo']}"); ?>"
								alt="Logo">
						</div>
						<div class="mb-19"></div>
						<!-- FORM LOGIN -->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
							action="<?= site_url('acl/login'); ?>" method="POST">
							<div>
								<h1 class="text-dark fw-bolder mb-3">Login</h1>
								<?php if ($this->session->flashdata('status')) { ?>
									<div
										class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
										<span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3"
													d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
													fill="currentColor"></path>
												<path
													d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
													fill="currentColor"></path>
											</svg>
										</span>
										<div class="d-flex flex-column pe-0 pe-sm-10">
											<h4 class="fw-semibold">Error</h4>
											<span><?php echo $this->session->flashdata('msg'); ?></span>
										</div>
										<button type="button"
											class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
											data-bs-dismiss="alert">
											<span class="svg-icon svg-icon-1 svg-icon-danger">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
														transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
													<rect x="7.41422" y="6" width="16" height="2" rx="1"
														transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
												</svg>
											</span>
										</button>
									</div>
								<?php } ?>
							</div>
							<div class="mb-7"></div>
							<p class="fw-semibold text-gray-800">
								Selamat datang, Admin! Silahkan masukkan e-mail dan
								kata sandi untuk login
							</p>
							<div class="mb-14"></div>
							<!-- user_name -->
							<div class="fv-row">
								<label for="user_name" class="form-label fw-bold text-dark">E-mail / username</label>
								<input type="text" placeholder="Masukkan e-mail/username Anda" name="user_name"
									autocomplete="off"
									class="px-6 form-control form-control-solid fw-normal text-dark border-1 border border-gray-300" />
							</div>
							<div class="mb-7"></div>
							<!-- user_password -->
							<div class="fv-row">
								<label for="user_password" class="form-label fw-bold text-dark">Password</label>
								<div class="position-relative" data-kt-password-meter="true">
									<input type="password" placeholder="Masukkan password Anda" name="user_password"
										autocomplete="off"
										class="ps-6 pe-15 form-control form-control-solid fw-normal text-dark border-1 border border-gray-300" />
									<span
										class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
										data-kt-password-meter-control="visibility">
										<i class="bi bi-eye-slash fs-2"></i>
										<i class="bi bi-eye fs-2 d-none"></i>
									</span>
								</div>
							</div>
							<div class="mb-20"></div>
							<!-- submit -->
							<button type="submit" id="kt_sign_in_submit" class="w-100 btn btn-dark fw-normal"
								data-kt-indicator="off">
								<span class="indicator-label">Login</span>
								<span class="indicator-progress">Memuat...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
								</span>
							</button>
						</form>
					</div>
				</div>
				<!-- FOOTER -->
				<div class="d-flex flex-center flex-wrap px-5">
					<!-- <div class="d-flex fw-semibold text-primary fs-base">
						<a href="../../demo1/dist/pages/team.html" class="px-5" target="_blank">Terms</a>
						<a href="../../demo1/dist/pages/pricing/column.html" class="px-5" target="_blank">Plans</a>
						<a href="../../demo1/dist/pages/contact.html" class="px-5" target="_blank">Contact Us</a>
					</div> -->
				</div>
			</div>
			<!-- RIGHT KONTEN -->
			<div class="d-flex flex-lg-row-fluid w-lg-50 d-none d-lg-block">
				<div class="d-flex flex-column flex-center py-5 px-3 px-md-15 w-100 h-100">
					<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-3 mb-lg-3"
						style="margin-top: 100px !important;" src="<?php echo image_asset_url('login.png'); ?>"
						alt="Background Login" />
				</div>
			</div>
		</div>
	</div>
	<script>
		const baseUrl = "<?= base_url() ?>";
		const currentUrl = "<?= current_url() ?>";
	</script>
	<?= js_asset('plugins.bundle.js'); ?>
	<?= js_asset('scripts.bundle.js'); ?>
	<?= js_asset('ripple.min.js', 'ripple'); ?>
</body>

</html>