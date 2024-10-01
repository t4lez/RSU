<div id="kt_app_content" class="app-content flex-column-fluid">
	<div id="kt_app_content_container" class="app-container container-fluid">
		<!--begin::Toolbar-->
		<div id="toolbar" class="app-toolbar">
			<div class="d-flex flex-column gap-3 w-100 w-sm-auto">
				<div class="d-flex flex-wrap gap-4">
					<button data-ripple id="btn_add"
						data-title="<i class='fa-light fa-plus text-dark fs-6 me-2'></i>Tambah Pasien"
						class="btn btn-sm btn-dark w-100 w-sm-auto">
						<i class="fa-light fa-plus fs-5"></i>
						<span>Tambah</span>
					</button>
					<a data-ripple id="btn-del" href="<?= base_url('pasien/delete'); ?>"
						data-title="<i class='fa-light fa-trash text-dark fs-6 me-2'></i>Hapus Items"
						class="btn btn-sm btn-danger w-100 w-sm-auto d-none">
						<i class="fa-light fa-trash fs-5"></i>
						<span>Hapus</span>
					</a>
				</div>
			</div>
		</div>
		<!--end::Toolbar-->
		<!-- <div class="card card-flush">
				<div class="card-body pt-1 pb-4"> -->
		<div class="card card-flush bg-transparent">
			<div class="card-body py-0 px-4">
				<div class="table-responsive">
					<table id="grid_pasien"></table>
				</div>
			</div>
		</div>

		<div class="modal fade" id="mdl_pasien" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
				<!--begin::Modal content-->
				<div class="modal-content rounded">

					<form class="form fv-plugins-bootstrap5 fv-plugins-framework" id="frm_pasien" name="frm_pasien"
						method="POST" enctype="multipart/form-data">
						<input type="hidden" id="pasienId" name="pasienId" value="" />
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_new_address_header">
							<h3 class="modal-title d-flex align-items-center text-dark" id="header_title">
								<i class='fa-light fa-plus text-dark fs-6 me-2'></i>
								<span id="title">Tambah Pasien</span>
							</h3>
							<div class="btn btn-icon btn-sm ms-2" data-bs-dismiss="modal" aria-label="Close">
								<i class="fa-light fa-xmark text-dark fs-3"></i>
							</div>
						</div>
						<!--end::Modal header-->
						<!--begin::Modal body-->
						<div class="modal-body py-5 px-lg-10">
							<div class="row g-5">
								<div class="col-md-6">
									<label class="form-label required" for="nama">Nama</label>
									<input name="nama" id="nama" type="text" placeholder="Nama Pasien"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="nama" class="invalid-feedback"></div>
								</div>
								<div class="col-md-6">
									<label class="form-label required" for="noHp">Telepon</label>
									<input name="noHp" id="noHp" type="text" placeholder="Nomor Telepon"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="noHp" class="invalid-feedback"></div>
								</div>
								<div class="col-12">
									<label class="form-label required" for="alamat">Alamat</label>
									<textarea name="alamat" rows="5" id="alamat" placeholder="Alamat"
										class="form-control form-control-sm" autocomplete="off"></textarea>
									<div data-field="alamat" class="invalid-feedback"></div>
								</div>
							</div>
						</div>
						<!--end::Modal body-->
						<!--begin::Modal footer-->
						<div class="modal-footer flex-center">
							<!--begin::Button-->
							<div class="d-flex flex-center flex-row-fluid">
								<button data-ripple type="reset" class="btn btn-sm btn-light me-3"
									data-bs-dismiss="modal">
									<i class="fa-light fa-angle-left fs-3 theme-light-show"></i>
									<i class="fa-light fa-angle-left fs-3 theme-dark-show text-light"></i>
									Kembali
								</button>
								<button data-ripple type="submit" class="btn btn-sm btn-dark" data-kt-indicator="off">
									<i class="fa-light fa-save fs-3"></i>
									<span class="indicator-label">Simpan</span>
									<span class="indicator-progress">
										<span class="spinner-border spinner-border-sm align-middle ms-2 me-1"></span>
										Proses...
									</span>
								</button>
							</div>
							<!--end::Button-->
						</div>
						<!--end::Modal footer-->
					</form>

				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>

		<div class="modal fade" id="mdl_filter_pasien" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog" style="max-width: 600px !important">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header" id="kt_modal_new_address_header">
						<h3 class="modal-title d-flex align-items-center text-dark" id="header_title">
							<i class='fa-light fa-sliders text-dark fs-6 me-2'></i>Filter Pasien
						</h3>
						<div class="btn btn-icon btn-sm ms-2" data-bs-dismiss="modal" aria-label="Close">
							<i class="fa-light fa-xmark text-dark fs-3"></i>
						</div>
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body py-7 px-lg-10">
						<div class="row g-5">
							<div class="col-md-12">
								<label class="form-label required" for="filterStatus">Status</label>
								<select id="filterStatus" name="filterStatus" data-placeholder="Pilih Status"
									class="form-select form-select-sm filter" data-control="select2">
									<option selected> - Pilih Status - </option>
								</select>
							</div>
						</div>
					</div>
					<!--end::Modal body-->
					<!--begin::Modal footer-->
					<div class="modal-footer flex-center">
						<!--begin::Button-->
						<div class="d-flex flex-center flex-row-fluid">
							<button type="reset" data-ripple onclick="resetFilterPasien()"
								class="btn btn-sm btn-light me-7">
								<i class="fa-light fa-eraser fs-3 theme-light-show"></i>
								<i class="fa-light fa-eraser fs-3 theme-dark-show text-light"></i>
								Reset
							</button>
						</div>
						<!--end::Button-->
					</div>
					<!--end::Modal footer-->
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
	</div>
</div>

<script>
	var selections = [];
	var limit = 0;

	function responseHandler(res) {
		$.each(res.rows, function (i, row) {
			row.state = $.inArray(row.pasienId, selections) !== -1;
		});
		limit = res.from;
		return res;
	};

	function getRowSelections() {
		return $.map($('#grid_pasien').bootstrapTable('getSelections'), function (row) {
			return row
		});
	};

	function queryParams(params) {
		$('#mdl_filter_pasien').find('select[name]').each(function () {
			params[$(this).attr('name')] = $(this).val()
		})
		return params
	}
	$("#mdl_filter_pasien select").change(function () {
		$('#grid_pasien').bootstrapTable('refresh')
	});

	function resetFilterPasien() {
		$('#mdl_filter_pasien').find('select[name]').each(function () {
			$(this).val('').trigger('change');
		})
	}

	function showFilterPasien() {
		$('#mdl_filter_pasien').modal('show');
	}

	$(document).ready(function () {
		Inputmask({
			"mask": "9999999999999"
		}).mask("#noHp");

		$('#mdl_pasien').on('hidden.bs.modal', function () {
			$('#grid_pasien').bootstrapTable('uncheckAll');
			$('#frm_pasien').trigger("reset");
			$.each($(this).find("[data-field]"), (index, element) => {
				$('#' + element.getAttribute("data-field")).removeClass('is-invalid');
				element.innerHTML = "";
			})
		});

		$('#grid_pasien').bootstrapTable({
			url: SITE_URL + '/pasien/get_json/',
			fieldId: 'pasienId',
			// customToolbarButtons: [
			// 	{
			// 		name: 'grid-filters',
			// 		title: 'Filter',
			// 		icon: 'bi bi-sliders',
			// 		callback: showFilterPasien,
			// 	},
			// 	{
			// 		name: 'grid-filters-reset',
			// 		title: 'Reset Filter',
			// 		icon: 'bi bi-eraser',
			// 		callback: resetFilterPasien,
			// 	},
			// ],
			columns: [
				{
					field: 'state',
					checkbox: true,
					align: 'center',
					valign: 'middle'
				},
				{
					field: 'aksi',
					title: `<div class="rotate" data-kt-rotate="true">
								<span class="svg-icon svg-icon-1 cursor-pointer rotate-90">
									<i class="bi bi-grid-fill"></i>
								</span>
							</div>`,
					align: 'center',
					valign: 'middle',
					formatter(value, row, index) {
						return `<div>
									<button data-ripple class="btn btn-sm btn-icon btn-light-dark" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
										<span class="svg-icon svg-icon-1">
											<i class="bi bi-three-dots fs-4"></i>
										</span>
									</button>
									<div data-kt-menu="true" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg menu-state-color fw-semibold fs-7 w-125px py-4">
										<div class="menu-item px-3 text-hover-warning">
											<a data-title="<i class='fa-light fa-pen-swirl text-dark fs-6 me-2'></i>Edit Pasien" data-row='${JSON.stringify(row)}' class="btnEdit menu-link px-3" href="javascript:void(0)">
												<span class="svg-icon svg-icon-1 svg-icon-dark">
												<i class="fa-light fa-pen-swirl fs-6 text-dark me-2"></i>
												Edit
												</span>
											</a>
										</div>
										<div class="separator mx-4 border-gray-300"></div>
										<div class="menu-item px-3 text-hover-danger">
											<a data-id='${row.pasienId}' class="btnRemove menu-link px-3" href="javascript:void(0)">
												<span class="svg-icon svg-icon-1 svg-icon-dark">
												<i class="fa-light fa-trash fs-5 text-dark me-2"></i>
												Hapus
												</span>
											</a>
										</div>
									</div>
								</div>`
					}
				},
				{
					field: 'nomor',
					title: 'No',
					align: 'center',
					valign: 'middle',
					formatter(value, row, index) {
						return (parseInt(limit) + parseInt(index + 1))
					}
				},
				{
					field: 'nama',
					escape: 'false',
					title: 'Nama',
					align: 'start',
					valign: 'middle',
					sortable: true
				},
				{
					field: 'noHp',
					title: 'Telepon',
					align: 'start',
					valign: 'middle',
					sortable: true
				},
				{
					field: 'alamat',
					escape: 'false',
					title: 'Alamat',
					align: 'start',
					valign: 'middle',
					sortable: true
				},
				{
					field: 'createAt',
					title: 'dibuat',
					align: 'start',
					valign: 'middle',
					sortable: true,
					formatter(value, row, index) {
						return moment(row.createAt).format('ll') + " jam " + moment(row.createAt).format('HH:mm')
					}
				},
			],
			// add config after bootstrap bootstrapTableConfig if you want to override
			...bootstrapTableConfig()
		});

		$('#btn_add').click(function (e) {
			e.preventDefault();
			$('#frm_pasien').trigger("reset");
			$('#mdl_pasien').find('#header_title').html($(this).data('title'))
			$('#mdl_pasien').find('#frm_pasien').attr('action', '<?= base_url("pasien/add"); ?>')
			$('#mdl_pasien').modal('show');
		});

		$('#grid_pasien').on('click', '.btnEdit', function (e) {
			e.preventDefault();
			const {
				row,
				title
			} = $(this).data()
			$('#frm_pasien').trigger("reset");
			$('#mdl_pasien').find('#header_title').html(title);
			$('#mdl_pasien').find('#frm_pasien').attr('action', '<?= base_url("pasien/update"); ?>')
			$('#pasienId').val(row.pasienId);
			$('#nama').val(row.nama);
			$('#alamat').val(row.alamat);
			$('#noHp').val(row.noHp);
			$('#mdl_pasien').modal('show');
		});

		$('#frm_pasien').submit(function (e) {
			e.preventDefault();
			const buttonElm = $(this).find('[type="submit"]');
			const field = $(this).find("[data-field]");
			const data = new FormData($(this)[0]);
			const url = $(this).attr('action');
			const type = $(this).attr('method');
			const dataType = 'json';
			$.ajax({
				type,
				url,
				dataType,
				processData: false,
				contentType: false,
				cache: false,
				data,
				success: (data) => {
					$('.<?= $csrf['name']; ?>').val(data.<?= $csrf['name']; ?>);
					const {
						success,
						errors: error,
						msg: message
					} = data;
					if (success) {
						Swal.fire({
							html: message,
							icon: "success",
							confirmButtonText: "Ok",
						})
						$('#grid_pasien').bootstrapTable('refresh');
						$('#mdl_pasien').modal('hide');
						$.each(field, (index, element) => {
							$(this).find(`#${element.getAttribute("data-field")}`).removeClass('is-invalid');
							element.innerHTML = "";
						})
					} else if (error) {
						let errors = error;
						let errorKey;
						$.each(field, (index, element) => {
							errorKey = element.getAttribute("data-field");
							if (errors[errorKey]) {
								$(this).find(`#${errorKey}`).addClass('is-invalid');
								element.innerHTML = errors[errorKey];
							} else {
								$(this).find(`#${errorKey}`).removeClass('is-invalid');
								element.innerHTML = "";
							}
							errorKey = "";
						});
					} else {
						Swal.fire({
							html: message,
							icon: "error",
							confirmButtonText: "Ok",
						});
					}
				},
				beforeSend: () => submitButton(buttonElm),
				complete: () => submitButton(buttonElm, "success"),
			});
		});

		$(document).on('click', '.btnRemove,#btn-del', function (e) {
			const {
				id,
				title
			} = $(this).data()
			e.preventDefault();
			var datas = (id) ? [id] : getRowSelections().map((data) => data.pasienId);
			if (datas) {
				Swal.fire({
					title: 'Konfirmasi!?',
					text: "Anda tidak akan dapat mengembalikan data yang dihapus!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya, hapus!'
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							type: "POST",
							url: SITE_URL + "pasien/delete/",
							dataType: "json",
							data: {
								kode: datas,
								<?= $csrf['name']; ?>: $('.<?= $csrf['name']; ?>').val()
							},
							success: function (data) {
								$('.<?= $csrf['name']; ?>').val(data.<?= $csrf['name']; ?>);
								if (data.success)
									Swal.fire({
										html: data.msg,
										icon: "success",
										confirmButtonText: "Ok"
									});
								else
									Swal.fire({
										html: data.msg,
										icon: "error",
										confirmButtonText: "Ok"
									});

								$('#grid_pasien').bootstrapTable('refresh');
							}
						});
					}
				})
			}
		});
	});
</script>