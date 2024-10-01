<div id="kt_app_content" class="app-content flex-column-fluid">
	<div id="kt_app_content_container" class="app-container container-fluid">
		<!--begin::Toolbar-->
		<div id="toolbar" class="app-toolbar">
			<div class="d-flex flex-column gap-3 w-100 w-sm-auto">
				<div class="d-flex flex-wrap gap-4">
					<?php if ($this->ion_auth->in_group(1)): ?>
						<button data-ripple id="btn_add"
							data-title="<i class='fa-light fa-plus text-dark fs-6 me-2'></i>Tambah Ruangan"
							class="btn btn-sm btn-dark w-100 w-sm-auto">
							<i class="fa-light fa-plus fs-5"></i>
							<span>Tambah</span>
						</button>
						<a data-ripple id="btn-del" href="<?= base_url('ruangan/delete'); ?>"
							data-title="<i class='fa-light fa-trash text-dark fs-6 me-2'></i>Hapus Items"
							class="btn btn-sm btn-danger w-100 w-sm-auto d-none">
							<i class="fa-light fa-trash fs-5"></i>
							<span>Hapus</span>
						</a>
					<?php else: ?>
						<a href="<?= base_url('booking'); ?>" data-ripple class="btn btn-sm btn-dark w-100 w-sm-auto">
							<i class="fa-light fa-bag-shopping fs-5"></i>
							<span>Booking</span>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!--end::Toolbar-->
		<!-- <div class="card card-flush">
				<div class="card-body pt-1 pb-4"> -->
		<div class="card card-flush bg-transparent">
			<div class="card-body py-0 px-4">
				<div class="table-responsive">
					<table id="grid_ruangan"></table>
				</div>
			</div>
		</div>

		<div class="modal fade" id="mdl_ruangan" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
				<!--begin::Modal content-->
				<div class="modal-content rounded">

					<form class="form fv-plugins-bootstrap5 fv-plugins-framework" id="frm_ruangan" name="frm_ruangan"
						method="POST" enctype="multipart/form-data">
						<input type="hidden" id="ruanganId" name="ruanganId" value="" />
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_new_address_header">
							<h3 class="modal-title d-flex align-items-center text-dark" id="header_title">
								<i class='fa-light fa-plus text-dark fs-6 me-2'></i>
								<span id="title">Tambah Ruangan</span>
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
									<label class="form-label required" for="namaRuangan">Nama</label>
									<input name="namaRuangan" id="namaRuangan" type="text" placeholder="Nama Ruangan"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="namaRuangan" class="invalid-feedback"></div>
								</div>
								<div class="col-md-6">
									<label class="form-label required" for="kelasId">Kelas</label>
									<select id="kelasId" name="kelasId" data-placeholder="Pilih Kelas"
										class="form-select form-select-sm" data-dropdown-parent="#mdl_ruangan"
										data-control="select2">
										<option></option>
										<?php foreach ($kelas as $key => $row): ?>
											<option value="<?= $row->kelasId; ?>"><?= $row->namaKelas; ?></option>
										<?php endforeach; ?>
									</select>
									<div data-field="kelasId" class="invalid-feedback"></div>
								</div>
								<div class="col-md-6">
									<label class="form-label required" for="backgroundColor">Warna Background</label>
									<input name="backgroundColor" id="backgroundColor" type="color"
										placeholder="Warna Background" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="backgroundColor" class="invalid-feedback"></div>
								</div>
								<div class="col-md-6">
									<label class="form-label required" for="foregroundColor">Warna Foreground</label>
									<input name="foregroundColor" id="foregroundColor" type="color"
										placeholder="Warna Foreground" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="foregroundColor" class="invalid-feedback"></div>
								</div>
								<div class="col-6">
									<label class="form-label required" for="jumlahKamar">Jumlah Kamar</label>
									<input name="jumlahKamar" id="jumlahKamar" type="number" placeholder="Jumlah Kamar"
										class="form-control form-control-sm" autocomplete="off" min="0" value="0" />
									<div data-field="jumlahKamar" class="invalid-feedback"></div>
								</div>
								<div class="col-md-6">
									<label class="form-label required" for="urutan">Urutan</label>
									<select id="urutan" name="urutan" data-placeholder="Ururan Ruangan"
										class="form-select form-select-sm" data-dropdown-parent="#mdl_ruangan"
										data-control="select2">
										<option></option>
										<?php 
										$jmlRuang = ($this->alphalib->settings['jmlRuang']) ? $this->alphalib->settings['jmlRuang'] : 1;
										for ($x = 1; $x <= $jmlRuang; $x++){ ?>
											<option value="<?= $x; ?>">Ke: <?= $x; ?></option>
										<?php }; ?>
									</select>
									<div data-field="urutan" class="invalid-feedback"></div>
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

		<div class="modal fade" id="mdl_filter_ruangan" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog" style="max-width: 600px !important">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header" id="kt_modal_new_address_header">
						<h3 class="modal-title d-flex align-items-center text-dark" id="header_title">
							<i class='fa-light fa-sliders text-dark fs-6 me-2'></i>Filter Ruangan
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
								<label class="form-label required" for="filterKelas">Kelas</label>
								<select id="filterKelas" name="filterKelas" data-placeholder="Pilih Kelas"
									class="form-select form-select-sm filter" data-control="select2"
									data-dropdown-parent="#mdl_filter_ruangan">
									<option selected> - Pilih Kelas - </option>
									<?php foreach ($kelas as $key => $row): ?>
										<option value="<?= $row->kelasId ?>"><?= $row->namaKelas; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<!--end::Modal body-->
					<!--begin::Modal footer-->
					<div class="modal-footer flex-center">
						<!--begin::Button-->
						<div class="d-flex flex-center flex-row-fluid">
							<button type="reset" data-ripple onclick="resetFilterRuangan()"
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
			row.state = $.inArray(row.ruanganId, selections) !== -1;
		});
		limit = res.from;
		return res;
	};

	function getRowSelections() {
		return $.map($('#grid_ruangan').bootstrapTable('getSelections'), function (row) {
			return row
		});
	};

	function queryParams(params) {
		$('#mdl_filter_ruangan').find('select[name]').each(function () {
			params[$(this).attr('name')] = $(this).val()
		})
		return params
	}
	$("#mdl_filter_ruangan select").change(function () {
		$('#grid_ruangan').bootstrapTable('refresh')
	});

	function resetFilterRuangan() {
		$('#mdl_filter_ruangan').find('select[name]').each(function () {
			$(this).val('').trigger('change');
		})
	}

	function showFilterRuangan() {
		$('#mdl_filter_ruangan').modal('show');
	}

	$(document).ready(function () {
		Inputmask({
			"mask": "9999999999999"
		}).mask("#noHp");

		$('#mdl_ruangan').on('hidden.bs.modal', function () {
			$('#grid_ruangan').bootstrapTable('uncheckAll');
			$('#frm_ruangan').trigger("reset");
			$.each($(this).find("[data-field]"), (index, element) => {
				$('#' + element.getAttribute("data-field")).removeClass('is-invalid');
				element.innerHTML = "";
			})
		});

		$('#grid_ruangan').bootstrapTable({
			url: SITE_URL + '/ruangan/get_json/',
			fieldId: 'ruanganId',
			customToolbarButtons: [
				{
					name: 'grid-filters',
					title: 'Filter',
					icon: 'bi bi-sliders',
					callback: showFilterRuangan,
				},
				{
					name: 'grid-filters-reset',
					title: 'Reset Filter',
					icon: 'bi bi-eraser',
					callback: resetFilterRuangan,
				},
			],
			columns: [
				<?php if ($this->ion_auth->in_group(1)): ?> {
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
																																<a data-title="<i class='fa-light fa-pen-swirl text-dark fs-6 me-2'></i>Edit Ruangan" data-row='${JSON.stringify(row)}' class="btnEdit menu-link px-3" href="javascript:void(0)">
																																	<span class="svg-icon svg-icon-1 svg-icon-dark">
																																	<i class="fa-light fa-pen-swirl fs-6 text-dark me-2"></i>
																																	Edit
																																	</span>
																																</a>
																															</div>
																															<div class="separator mx-4 border-gray-300"></div>
																															<div class="menu-item px-3 text-hover-danger">
																																<a data-id='${row.ruanganId}' class="btnRemove menu-link px-3" href="javascript:void(0)">
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
				<?php endif; ?>
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
					field: 'urutan',
					title: 'Urutan',
					align: 'center',
					valign: 'middle'
				},
				{
					field: 'namaRuangan',
					escape: 'false',
					title: 'Nama',
					align: 'start',
					valign: 'middle',
					sortable: true
				},
				{
					field: 'namaKelas',
					title: 'Kelas',
					align: 'start',
					valign: 'middle',
					sortable: true
				},
				{
					field: 'jumlahKamar',
					title: 'Jumlah Kamar',
					align: 'start',
					valign: 'middle',
					sortable: true
				},
				{
					field: 'jumlahKamarTersedia',
					title: 'Kamar Tersedia',
					align: 'start',
					valign: 'middle',
					sortable: true
				},
				{
					field: 'jumlahKamarTerpakai',
					title: 'Kamar Terpakai',
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
			$('#frm_ruangan').trigger("reset");
			$('#mdl_ruangan').find('#header_title').html($(this).data('title'))
			$('#mdl_ruangan').find('#frm_ruangan').attr('action', '<?= base_url("ruangan/add"); ?>')
			$('#mdl_ruangan').find('#jumlahKamar').val(0);
			$('#mdl_ruangan').find('#kelasId').val('').trigger('change');
			$('#mdl_ruangan').find('#backgroundColor').val('#E1F5F1');
			$('#mdl_ruangan').find('#foregroundColor').val('#33866C');
			$('#mdl_ruangan').find('#urutan').val('').trigger('change');
			$('#mdl_ruangan').modal('show');
		});

		$('#grid_ruangan').on('click', '.btnEdit', function (e) {
			e.preventDefault();
			const {
				row,
				title
			} = $(this).data()
			$('#frm_ruangan').trigger("reset");
			$('#mdl_ruangan').find('#header_title').html(title);
			$('#mdl_ruangan').find('#frm_ruangan').attr('action', '<?= base_url("ruangan/update"); ?>')
			$('#mdl_ruangan').find('#ruanganId').val(row.ruanganId);
			$('#mdl_ruangan').find('#namaRuangan').val(row.namaRuangan);
			$('#mdl_ruangan').find('#kelasId').val(row.kelasId).trigger('change');
			$('#mdl_ruangan').find('#jumlahKamar').val(row.jumlahKamar);
			$('#mdl_ruangan').find('#backgroundColor').val(row.backgroundColor);
			$('#mdl_ruangan').find('#foregroundColor').val(row.foregroundColor);
			$('#mdl_ruangan').find('#urutan').val(row.urutan).trigger('change');
			$('#mdl_ruangan').modal('show');
		});

		$('#frm_ruangan').submit(function (e) {
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
						$('#grid_ruangan').bootstrapTable('refresh');
						$('#mdl_ruangan').modal('hide');
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
			var datas = (id) ? [id] : getRowSelections().map((data) => data.ruanganId);
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
							url: SITE_URL + "ruangan/delete/",
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

								$('#grid_ruangan').bootstrapTable('refresh');
							}
						});
					}
				})
			}
		});
	});
</script>