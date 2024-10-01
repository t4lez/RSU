<head>
	<title><?= $tbl_title; ?> - <?= $MYCFG['name_short']; ?></title>
	<meta charset="utf-8" />
	<meta name="description" content="<?= $MYCFG['name_long']; ?>" />
	<meta name="keywords" content="rumah sakit" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="dashboard" />
	<meta property="og:title" content="<?= $tbl_title; ?> - <?= $MYCFG['name_short']; ?>" />
	<meta property="og:url" content="<?= base_url(); ?>" />
	<meta property="og:site_name" content="<?= $MYCFG['name_short']; ?>" />
	<link rel="canonical" href="<?= base_url(); ?>" />
	<link rel="shortcut icon" href="<?= base_url("uploads/logo/{$this->alphalib->settings['webFavicon']}"); ?>" />
	<link rel="icon" href="<?= base_url("uploads/logo/{$this->alphalib->settings['webFavicon']}"); ?>"
		type="image/x-icon" />
	<!--begin::Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->

	<?= css_asset('plugins.bundle.css'); ?>
	<?= css_asset('style.bundle.css'); ?>

	<?= js_asset('plugins.bundle.js'); ?>
	<?= js_asset('scripts.bundle.js'); ?>

	<?= css_asset('all.min.css', 'fontawesome'); ?>
	<?= css_asset('font-awesome.min.css', 'font-awesome'); ?>
	<?= css_asset('bootstrap-table.min.css', 'bootstrap-table'); ?>
	<?= css_asset('ripple.css', 'ripple'); ?>
	<?= css_asset('lightgallery.min.css', 'lightgallery'); ?>
	<?= css_asset('lg-transitions.min.css', 'lightgallery') ?>
	<?= css_asset('lg-zoom.min.css', 'lightgallery'); ?>
	<?= css_asset('lg-thumbnail.min.css', 'lightgallery'); ?>
	<?= css_asset('lg-fullscreen.min.css', 'lightgallery'); ?>
	<?= css_asset('lg-pager.min.css', 'lightgallery'); ?>
	<?= css_asset('lg-autoplay.min.css', 'lightgallery'); ?>
	<?= css_asset('lg-rotate.min.css', 'lightgallery'); ?>
	<?= css_asset('lightgallery-bundle.min.css', 'lightgallery'); ?>
	<?= css_asset('style.bundle.css'); ?>
	<?= css_asset('style.css'); ?>
	<?= js_asset('jquery.number.min.js'); ?>
	<!-- <style>
		[data-kt-app-layout=light-sidebar] .app-header {
			background-color: var(--kt-app-header-base-bg-color) !important;
			/*box-shadow: var(--kt-app-header-base-box-shadow) !important;
			border-bottom: var(--kt-app-header-base-border-bottom) !important;*/
		}

		input[type=search].form-control-sm {
			min-height: calc(1.3em + 1.2rem + 2px);
			padding: 0.5rem 0.775rem;
		}

		span.form-select-sm {
			padding-top: 0.53em;
			padding-bottom: 0.53rem;
		}

		input.select2-search__field {
			padding: .4rem .575rem !important
		}
	</style> -->

	<script type="text/javascript">
		const submitButton = (elementSelector = null, status = 'loading') => {
			try {
				if (status === 'success') {
					$(`${elementSelector}`).attr('disabled', false);
					$(`${elementSelector}`).attr('data-kt-indicator', 'off');
					$(`${elementSelector} i`).removeClass('d-none');
				} else {
					$(`${elementSelector}`).attr('disabled', true);
					$(`${elementSelector}`).attr('data-kt-indicator', 'on');
					$(`${elementSelector} i`).addClass('d-none');
				}
			} catch (error) {
				if (status === 'success') {
					elementSelector.attr('disabled', false);
					elementSelector.attr('data-kt-indicator', 'off');
					elementSelector.find('i').removeClass('d-none');
				} else {
					elementSelector.attr('disabled', true);
					elementSelector.attr('data-kt-indicator', 'on');
					elementSelector.find('i').addClass('d-none');
				}
			}
		};

		const resetForm = (elementSelector) => {
			$(`${elementSelector}`).trigger('reset')
			$(`${elementSelector} .image-input`).removeClass('image-input-changed');
			$(`${elementSelector} .image-input`).addClass('image-input-empty');
			$(`${elementSelector} .image-input .image-input-wrapper`).css({
				"background-image": "none"
			});
			$(`${elementSelector} select, ${elementSelector} input, ${elementSelector} textarea`).each(function () {
				let attrType = $(this).attr('type');
				if (attrType === 'radio' || attrType === 'checkbox') {
					$(this).prop('checked', false)
				} else {
					$(this).val('').trigger('change');
					let type = $(this).data('control') ?? '';
					switch (type) {
						case 'select2':
							$(this).val('').trigger('change')
							break;
						case 'daterangepicker':
							$(this).data('daterangepicker').setStartDate(moment().subtract(0, "days"));
							$(this).data('daterangepicker').setEndDate(moment());
							break;
						default:
							$(this).val('')
							break;
					}
				}
			})
			$.each($(`${elementSelector}`).find("[data-field]"), (index, element) => {
				$(`${elementSelector}`).find('#' + element.getAttribute("data-field")).removeClass('is-invalid');
				element.innerHTML = "";
			})
		}

		function loadingTemplate(message) {
			return `<div class="flex-column text-center">
						 <img alt="Logo" class="theme-light-show h-50px" src="<?= base_url("uploads/logo/{$this->alphalib->settings['webLogo']}"); ?>">
						 <img alt="Logo" class="theme-dark-show h-50px" src="<?= base_url("uploads/logo/{$this->alphalib->settings['webLogo']}"); ?>">
						<div class="d-block d-flex align-items-center justify-content-center">
							<span class="spinner-border me-3" role="status"></span>
							<span class="fs-6 fw-semibold ms-3">${message}</span>
						</div>
					</div>`
		}

		function formatNoMatches() {
			return `<div class="pb-7">
						<?php include (FCPATH . 'themes/errors/html/nodata.php'); ?>
						Tidak ditemukan data yang cocok
					</div>`
		}

		function formatRecordsPerPage(pageNumber) {
			const activeNumber = $(pageNumber).find('.dropdown-item.active').text();
			let menuEl = '<div class="menu menu-row fw-semibold menu-rounded menu-gray-800 menu-state-bg menu-state-color"><div class="menu-item my-1 d-block">'
			$.each($(pageNumber).find('.dropdown-item'), function (indexInArray, valueOfElement) {
				let currentNumber = $(valueOfElement).text();
				menuEl += `<a href="#" class="menu-link d-inline-block px-4 py-2 me-1 ${currentNumber === activeNumber ? 'active' : ''}">${currentNumber}</a>`
			});
			menuEl += '</div></div>'
			return menuEl
			// return `<div class="menu menu-row fw-semibold menu-rounded menu-gray-800 menu-state-bg menu-state-color">
			// 			<div class="menu-item my-1 d-block">
			// 				<a href="#" class="menu-link d-inline-block px-4 py-2 me-1">5</a>
			// 				<a href="#" class="menu-link d-inline-block px-4 py-2 me-1">25</a>
			// 				<a href="#" class="menu-link d-inline-block px-4 py-2 me-1">50</a>
			// 				<a href="#" class="menu-link d-inline-block px-4 py-2 me-1">100</a>
			// 				<a href="#" class="menu-link d-inline-block px-4 py-2 me-1">Semua</a>
			// 			</div>
			// 		</div>`
		}

		function formatShowingRows(pageFrom, pageTo, totalRows) {
			return ``;
		}

		function queryParams(params) {
			return params
		}

		function responseHandler(res) {
			return res
		}

		function bootstrapTableConfig() {
			return {
				toolbar: '#toolbar',
				sidePagination: "server",
				queryParams,
				responseHandler,
				pagination: true,
				search: true,
				searchHighlight: true,
				singleSelect: false,
				striped: true,
				showColumns: true,
				showRefresh: true,
				showToggle: false,
				showFullscreen: true,
				showPaginationSwitch: false,
				pageSize: 5,
				pageList: [5, 10, 25, 50, 100, 'all'],
				formatRecordsPerPage,
				formatShowingRows,
				iconSize: 'sm',
				classes: 'table border table-bordered table-hover gy-3',
				buttonsClass: 'dark btn-sm',
				loadingTemplate,
				formatNoMatches,
				headerStyle: function headerStyle(column) {
					let style = {
						classes: 'fw-bold text-hover-dark'
					}
					// if (!column.checkbox) {
					// 	let minWidth = 130;
					// 	if (column.align === 'center')
					// 		minWidth = 100
					// 	else if (column.align === 'end')
					// 		minWidth = 0

					// 	style.css = {
					// 		'min-width': `${minWidth}px !important`
					// 	}
					// }
					return style
				},
				onColumnSwitch: function () {
					$('#btn-del').addClass('d-none')
					KTMenu.createInstances();
					KTApp.init()
				},
				onLoadSuccess: function (e) {
					$('.fixed-table-pagination').find('.page-next a').html(`<i class="bi bi-chevron-right text-dark"></i>`)
					$('.fixed-table-pagination').find('.page-pre a').html(`<i class="bi bi-chevron-left text-dark"></i>`)
					$('.fixed-table-pagination').find(`.page-list a`).each((i, el) => {
						if (`${this.pageSize}` === $(el).text()) {
							$(el).addClass('active')
						}
					});
					// $('#total_record').html(e.total);
					// $('.fixed-table-pagination').addClass('panel-footer clearfix bg-gray-active');
					$('#btn-del').addClass('d-none')
					KTMenu.createInstances();
					KTApp.init()
				},
				onPageChange: (number, size) => {
					$('.fixed-table-pagination').find('.page-list a.active').removeClass('active');
				},
				onCheckAll: (val, _el) => {
					val.length > 0 ? $('#btn-del').removeClass('d-none') : false
				},
				onUncheckAll: (_el, val) => {
					$('#btn-del').addClass('d-none')
				},
				onCheck: (val, el) => {
					$('#btn-del').removeClass('d-none')
				},
				onUncheck: (val, el) => {
					let selectedItem = $(el).parents('table').bootstrapTable('getSelections').length;
					selectedItem === 0 ? $('#btn-del').addClass('d-none') : false
				}
			}
		}

		$(document).ready(function () {
			// format uang
			$('input[data-currency="true"]').number(true, 0);
			// format tanggal
			moment.locale('id')
			// upper text
			$(".uppers").keyup(function (e) {
				var str = $(this).val();
				$(".uppers").val(str.toUpperCase());
			});
			// lightgallery
			const dynamicGallery = lightGallery($("#lightgallery")[0], {
				dynamic: true,
				dynamicEl: [],
				autoplayFirstVideo: false,
				pager: false,
				iframeHeight: "90%",
				galleryId: "nature",
				plugins: [lgZoom, lgThumbnail, lgFullscreen, lgAutoplay, lgPager, lgRotate],
				speed: 500,
				thumbnail: true,
				animateThumb: true,
				zoomFromOrigin: true,
				allowMediaOverlap: true,
				toggleThumb: true,
				mobileSettings: {
					controls: true,
					showCloseIcon: true,
					download: true,
					rotate: false,
					autoplay: false,
				},
			});
			$(document).on('click', '.show_image', function (e) {
				e.preventDefault();
				let image = $(this).data('src')
				let name = $(this).data('alt')
				let iframe = $(this).data('iframe') ?? false
				dynamicGallery.refresh([{
					iframe,
					src: image,
					thumb: image,
					subHtml: `<p>${name ?? ''}</p>`,
				}]);
				dynamicGallery.openGallery();
			});
		});
		var BASE_URL = '<?= base_url(); ?>';
		var SITE_URL = '<?= site_url(); ?>';
		var csrf_name = '<?= $csrf['name'] ?>';
	</script>
	<?php if (isset($css)): ?>
		<?php if (is_array($css)): ?>
			<?php foreach ($css as $val): ?>
				<?= $val; ?>
			<?php endforeach ?>
		<?php else: ?>
			<?= $css; ?>
		<?php endif; ?>
	<?php endif; ?>
</head>