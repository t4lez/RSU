<div id="kt_app_content" class="app-content flex-column-fluid">
	<div id="kt_app_content_container" class="app-container container-fluid">
		<!--begin::Toolbar-->
		<div id="toolbar" class="app-toolbar">
			<div class="d-flex flex-column gap-3 w-100 w-sm-auto">
				<div class="d-flex flex-wrap gap-4">
					<button data-ripple id="btn_add"
						data-title="<i class='fa-light fa-plus text-dark fs-6 me-2'></i>Tambah Booking"
						class="btn btn-sm btn-dark w-100 w-sm-auto">
						<i class="fa-light fa-plus fs-5"></i>
						<span>Tambah</span>
					</button>
				</div>
			</div>
		</div>
		<!--end::Toolbar-->
		<!-- <div class="card card-flush">
				<div class="card-body pt-1 pb-4"> -->
		<div class="card card-flush bg-transparent">
			<div class="card-body py-0 px-4">
				<div class="table-responsive">
					<table id="grid_booking"></table>
				</div>
			</div>
		</div>

		<div class="modal fade" id="mdl_booking" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
				<!--begin::Modal content-->
				<div class="modal-content rounded">

					<form class="form fv-plugins-bootstrap5 fv-plugins-framework" id="frm_booking" name="frm_booking"
						method="POST" enctype="multipart/form-data">
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_new_address_header">
							<h3 class="modal-title d-flex align-items-center text-dark" id="header_title">
								<i class='fa-light fa-plus text-dark fs-6 me-2'></i>
								<span id="title">Tambah Booking</span>
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
									<label class="form-label required" for="statusPasien">Status</label>
									<select id="statusPasien" name="statusPasien" data-placeholder="Pilih Status"
										class="form-select form-select-sm" data-dropdown-parent="#mdl_booking"
										data-control="select2">
										<option></option>
										<option value="0" selected>Baru</option>
										<option value="1">Lama</option>
									</select>
									<div data-field="statusPasien" class="invalid-feedback"></div>
								</div>
								<div class="col-md-6">
									<label class="form-label required" for="ruanganId">Ruangan</label>
									<select id="ruanganId" name="ruanganId" data-placeholder="Pilih Ruangan"
										class="form-select form-select-sm" data-dropdown-parent="#mdl_booking"
										data-control="select2">
										<option></option>
										<?php foreach ($ruangan as $key => $row): ?>
											<option value="<?= $row->ruanganId; ?>">
												<?= "$row->namaRuangan - $row->namaKelas"; ?>
											</option>
										<?php endforeach ?>
									</select>
									<div data-field="ruanganId" class="invalid-feedback"></div>
								</div>
								<div id="pasienLama" class="col-12 d-none">
									<label class="form-label required" for="pasienId">Pasien</label>
									<select id="pasienId" name="pasienId" data-placeholder="Pilih Pasien"
										class="form-select form-select-sm" data-dropdown-parent="#mdl_booking"
										data-control="select2">
										<option></option>
										<?php foreach ($pasien as $key => $row): ?>
											<option value="<?= $row->pasienId; ?>"><?= $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
									<div data-field="pasienId" class="invalid-feedback"></div>
								</div>
								<div id="pasienBaru" class="row g-5 col-12 px-0 mx-0 my-0">
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

		<div class="modal fade" id="mdl_filter_booking" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog" style="max-width: 600px !important">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header" id="kt_modal_new_address_header">
						<h3 class="modal-title d-flex align-items-center text-dark" id="header_title">
							<i class='fa-light fa-sliders text-dark fs-6 me-2'></i>Filter Booking
						</h3>
						<div class="btn btn-icon btn-sm ms-2" data-bs-dismiss="modal" aria-label="Close">
							<i class="fa-light fa-xmark text-dark fs-3"></i>
						</div>
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body py-7 px-lg-10">
						<div class="row g-5">
							<div class="col-md-6">
								<label class="form-label required" for="filterKelas">Kelas</label>
								<select id="filterKelas" name="filterKelas" data-placeholder="Pilih Kelas"
									class="form-select form-select-sm filter" data-control="select2"
									data-dropdown-parent="#mdl_filter_booking">
									<option selected> - Pilih Kelas - </option>
									<?php foreach ($kelas as $key => $row): ?>
										<option value="<?= $row->kelasId ?>"><?= $row->namaKelas; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-md-6">
								<label class="form-label required" for="filterRuangan">Ruangan</label>
								<select id="filterRuangan" name="filterRuangan" data-placeholder="Pilih Ruangan"
									class="form-select form-select-sm filter" data-control="select2"
									data-dropdown-parent="#mdl_filter_booking">
									<option selected> - Pilih Ruangan - </option>
									<?php foreach ($ruangan as $key => $row): ?>
										<option value="<?= $row->ruanganId ?>"><?= $row->namaRuangan; ?></option>
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
							<button type="reset" data-ripple onclick="resetFilterBooking()"
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
			row.state = $.inArray(row.bookingId, selections) !== -1;
		});
		limit = res.from;
		return res;
	};

	function getRowSelections() {
		return $.map($('#grid_booking').bootstrapTable('getSelections'), function (row) {
			return row
		});
	};

	function queryParams(params) {
		$('#mdl_filter_booking').find('select[name]').each(function () {
			params[$(this).attr('name')] = $(this).val()
		})
		return params
	}
	$("#mdl_filter_booking select").change(function () {
		$('#grid_booking').bootstrapTable('refresh')
	});

	function resetFilterBooking() {
		$('#mdl_filter_booking').find('select[name]').each(function () {
			$(this).val('').trigger('change');
		})
	}

	function showFilterBooking() {
		$('#mdl_filter_booking').modal('show');
	}

	$(document).ready(function () {
		$('#statusPasien').change(function (e) {
			e.preventDefault();
			const val = $(this).val()
			$('#pasienId').val('').trigger('change')
			$('#nama').val('')
			$('#noHp').val('')
			$('#alamat').val('')
			if (val === '1') {
				$('#pasienLama').removeClass('d-none')
				$('#pasienBaru').addClass('d-none')
			} else {
				$('#pasienLama').addClass('d-none')
				$('#pasienBaru').removeClass('d-none')
			}
		});
		Inputmask({
			"mask": "9999999999999"
		}).mask("#noHp");

		$('#mdl_booking').on('hidden.bs.modal', function () {
			$('#grid_booking').bootstrapTable('uncheckAll');
			$('#frm_booking').trigger("reset");
			$.each($(this).find("[data-field]"), (index, element) => {
				$('#' + element.getAttribute("data-field")).removeClass('is-invalid');
				element.innerHTML = "";
			})
		});

		$('#grid_booking').bootstrapTable({
			url: SITE_URL + '/booking/get_json/',
			fieldId: 'bookingId',
			customToolbarButtons: [
				{
					name: 'grid-filters',
					title: 'Filter',
					icon: 'bi bi-sliders',
					callback: showFilterBooking,
				},
				{
					name: 'grid-filters-reset',
					title: 'Reset Filter',
					icon: 'bi bi-eraser',
					callback: resetFilterBooking,
				},
			],
			columns: [
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
					field: 'namaPasien',
					escape: 'false',
					title: 'Pasien',
					align: 'start',
					valign: 'middle',
					sortable: true
				},
				{
					field: 'namaRuangan',
					title: 'Ruangan',
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
					field: 'status',
					title: 'Status',
					align: 'center',
					valign: 'middle',
					sortable: false,
					formatter(value, row, index) {
						;
						return `<div class="d-flex flex-column align-items-center gap-2 justify-content-center">							
									${row.status === "0"
								? `<div class="form-check form-switch h-20px w-40px">
												<input id="flexSwitchCheckChecked" value="${row.bookingId}" class="btnStatus form-check-input switch" type="checkbox" role="switch" />	
											</div>`
								: `<div class="badge badge-sm badge-success w-70px text-center d-inline-block">Pulang</div>`
							}
								</div>`
					}
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

		$(document).on('change', '.btnStatus', function (e) {
			Swal.fire({
				title: 'Konfirmasi!?',
				text: "Pasien Telah Selesai Rawat Inap, Hapus Data Pasien!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Ya, hapus!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: "POST",
						url: `${SITE_URL}booking/status/`,
						dataType: "json",
						data: {
							kode: $(this).val(),
							status: $(this).prop("checked") ? 1 : 0,
							<?= $csrf['name']; ?>: $('.<?= $csrf['name']; ?>').val()
						},
						success: function (data) {
							$('.<?= $csrf['name']; ?>').val(data.<?= $csrf['name']; ?>);
							if (data.success) {
								$('#tost_change').find('.toast-body').html(data.msg)
								$('#grid_booking').bootstrapTable('refresh');
								tostChange.show();
							} else {
								alert("Ada kesalahan.\n\r" + data.msg);
							}
						}
					});
				} else {
					$(this).prop("checked", false)
				}
			})
		});

		$('#btn_add').click(function (e) {
			e.preventDefault();
			$('#frm_booking').trigger("reset");
			$('#mdl_booking').find('#header_title').html($(this).data('title'))
			$('#mdl_booking').find('#frm_booking').attr('action', '<?= base_url("booking/add"); ?>')
			$('#mdl_booking').find('#jumlahKamar').val(0);
			$('#mdl_booking').find('#kelasId').val('').trigger('change');
			$('#mdl_booking').find('#backgroundColor').val('#E1F5F1');
			$('#mdl_booking').find('#foregroundColor').val('#33866C');
			$('#mdl_booking').modal('show');
		});

		$('#grid_booking').on('click', '.btnEdit', function (e) {
			e.preventDefault();
			const {
				row,
				title
			} = $(this).data()
			$('#frm_booking').trigger("reset");
			$('#mdl_booking').find('#header_title').html(title);
			$('#mdl_booking').find('#frm_booking').attr('action', '<?= base_url("booking/update"); ?>')
			$('#mdl_booking').find('#bookingId').val(row.bookingId);
			$('#mdl_booking').find('#namaBooking').val(row.namaBooking);
			$('#mdl_booking').find('#kelasId').val(row.kelasId).trigger('change');
			$('#mdl_booking').find('#jumlahKamar').val(row.jumlahKamar);
			$('#mdl_booking').find('#backgroundColor').val(row.backgroundColor);
			$('#mdl_booking').find('#foregroundColor').val(row.foregroundColor);
			$('#mdl_booking').modal('show');
		});

		$('#frm_booking').submit(function (e) {
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
						$('#grid_booking').bootstrapTable('refresh');
						$('#mdl_booking').modal('hide');
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
			var datas = (id) ? [id] : getRowSelections().map((data) => data.bookingId);
			if (datas) {
				Swal.fire({
					title: 'Konfirmasi!?',
					text: "Anda tidak akan dapat mengembalikan data yang dihapus!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya, Ubah!'
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							type: "POST",
							url: SITE_URL + "booking/delete/",
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

								$('#grid_booking').bootstrapTable('refresh');
							}
						});
					}
				})
			}
		});
	});
</script>