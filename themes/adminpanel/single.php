<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<?php include_once ('head.php'); ?>

<style type="text/css">
	.btn-sm {
		padding: calc(0.5rem + 1px) calc(0.5rem + 5px) !important;
	}

	.fixed-table-container {
		border: none;
	}

	.card .card-header {
		padding: 0 1.25rem;
	}

	.card .card-body {
		padding: 0 1.25rem;
	}

	.bs-checkbox>label {
		padding-left: 0.8rem;
	}
	.app-sidebar-logo{
		padding-top: 15px;
		padding-bottom : 15px;
	}
</style>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-page-loading="on" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
	data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true"
	data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
	data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
	<!--begin::Lightgallery-->
	<div id="lightgallery" class="p-0 m-0"></div>
	<!--end::Lightgallery-->

	<!--begin::Toast-->
	<div class="position-fixed top-0 end-0 p-3" style="z-index: 99999 !important;">
		<div id="tost_change" data-bs-delay="5000" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
				<span class="svg-icon svg-icon-2 svg-icon-success me-3">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
						<rect x="11" y="17" width="7" height="2" rx="1" transform="rotate(-90 11 17)"
							fill="currentColor" />
						<rect x="11" y="9" width="2" height="2" rx="1" transform="rotate(-90 11 9)"
							fill="currentColor" />
					</svg>
				</span>
				<strong class="me-auto">Berhasil</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
			</div>
		</div>
	</div>
	<!--end::Toast-->

	<!--begin::Theme mode setup on page load-->
	<script>
		var defaultThemeMode = "light";
		// var themeMode;
		// if (document.documentElement) {
		// 	if (document.documentElement.hasAttribute("data-theme-mode")) {
		// 		themeMode = document.documentElement.getAttribute("data-theme-mode");
		// 	} else {
		// 		if (localStorage.getItem("data-theme") !== null) {
		// 			themeMode = localStorage.getItem("data-theme");
		// 		} else {
		// 			themeMode = defaultThemeMode;
		// 		}
		// 	}
		// 	if (themeMode === "light") {
		// 		themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "light" : "light";
		// 	}
		// 	document.documentElement.setAttribute("data-theme", themeMode);
		// }
		document.documentElement.setAttribute("data-theme", defaultThemeMode);
	</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::App-->
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
			<!--begin::Header-->

			<?php include_once ('header.php'); ?>
			<?php include_once ('loader.php'); ?>
			<!--end::Header-->
			<!--begin::Wrapper-->
			<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
				<!--begin::Sidebar-->

				<?php include_once ('sidebar.php'); ?>

				<!--end::Sidebar-->
				<!--begin::Main-->
				<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
					<!--begin::Content wrapper-->
					<div class="d-flex flex-column flex-column-fluid py-2 py-lg-4">

						<?php echo $content; ?>

					</div>
					<!--end::Content wrapper-->
				</div>
				<!--begin::Footer-->

				<?php include_once ('footer.php'); ?>

				<!--end::Footer-->
				<!--end:::Main-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::App-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
		<span class="svg-icon">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
					fill="currentColor" />
				<path
					d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
					fill="currentColor" />
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<!--end::Scrolltop-->

	<?php include_once ('script.php'); ?>

</body>
<!--end::Body-->

</html>