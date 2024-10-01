<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed'); ?>
<!--begine::Loader-->
<div class="page-loader flex-column">
	<img alt="Logo" class="theme-light-show h-50px"
		src="<?= base_url("uploads/logo/{$this->alphalib->settings['webLogo']}"); ?>">
	<img alt="Logo" class="theme-dark-show h-50px"
		src="<?= base_url("uploads/logo/{$this->alphalib->settings['webLogo']}"); ?>">
	<div class="d-flex align-items-center mt-5">
		<span class="spinner-border text-dark" role="status"></span>
		<span class="text-gray-700 fs-6 fw-semibold ms-5">Memuat...</span>
	</div>
</div>
<!--end::Loader-->