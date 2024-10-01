<div id="kt_app_content" class="app-content flex-column-fluid">
	<div id="kt_app_content_container" class="app-container container-fluid">
		<!--begin::Toolbar-->
		<div id="toolbar" class="app-toolbar">
			<div class="d-flex flex-column gap-3 w-100 w-sm-auto">
				<div class="d-flex flex-wrap gap-4">
					<button data-ripple id="btn_add"
						data-title="<i class='fa-light fa-plus text-dark fs-6 me-2'></i>Tambah Pengguna"
						class="btn btn-sm btn-dark w-100 w-sm-auto">
						<i class="fa-light fa-plus fs-5"></i>
						<span>Tambah</span>
					</button>
					<a data-ripple id="btn-del" href="#"
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
					<table id="grid_org"></table>
				</div>
			</div>
		</div>

		<div class="modal fade" id="mdl_org" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<form class="form fv-plugins-bootstrap5 fv-plugins-framework" form id="frm-org-mdl"
						name="frm-org-mdl" method="POST">
						<input type="hidden" name="id" id="id" value="" />
						<input type="hidden" name="act" id="act" value="" />
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_new_address_header">
							<h3 class="modal-title d-flex align-items-center text-dark" id="header_title">
								<i class='fa-light fa-plus text-dark fs-6 me-2'></i>Tambah Pengguna
							</h3>
							<div class="btn btn-icon btn-sm ms-2" data-bs-dismiss="modal" aria-label="Close">
								<i class="fa-light fa-xmark text-dark fs-3"></i>
							</div>
						</div>
						<!--end::Modal header-->
						<!--begin::Modal body-->
						<div class="modal-body py-7 px-lg-10">
							<div class="row g-5">
								<!-- username -->
								<div class="col-md-6">
									<label class="form-label required" for="username">Username</label>
									<input value="" name="username" id="username" type="text" placeholder="Username"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="username" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="username"></div> -->
								</div>
								<!-- email -->
								<div class="col-md-6">
									<label class="form-label required" for="email">Email</label>
									<input value="" name="email" id="email" type="text" placeholder="Email"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="email" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="email"></div> -->
								</div>
								<!-- first_name -->
								<div class="col-md-6">
									<label class="form-label required" for="first_name">Nama depan</label>
									<input value="" name="first_name" id="first_name" type="text"
										placeholder="Nama depan" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="first_name" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="first_name"></div> -->
								</div>
								<!-- last_name -->
								<div class="col-md-6">
									<label class="form-label" for="last_name">Nama belakang</label>
									<input value="" name="last_name" id="last_name" type="text"
										placeholder="Nama belakang" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="last_name" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="last_name"></div> -->
								</div>
								<!-- phone -->
								<div class="col-md-6">
									<label class="form-label required" for="phone">No telepon</label>
									<input value="" name="phone" id="phone" type="text" placeholder="No telepon"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="phone" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="phone"></div> -->
								</div>
								<!-- groups -->
								<div class="col-md-6">
									<label class="form-label required" for="groups">Grup</label>
									<select data-dropdown-parent="#mdl_org" class="form-select form-select-sm"
										name="groups" id="groups" data-control="select2" data-placeholder="Grup">
										<option></option>
										<?php foreach ($groups as $group): ?>
											<option value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
										<?php endforeach; ?>
									</select>
									<div data-field="groups" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="groups"></div> -->
								</div>
								<!-- password -->
								<div class="col-md-6">
									<label class="form-label required" for="password">Password</label>
									<input value="" name="password" id="password" type="password" placeholder="Password"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="password" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="password"></div> -->
								</div>
								<!-- company -->
								<div class="col-md-6">
									<label class="form-label" for="company">Perusahaan / Deskripsi</label>
									<input value="" name="company" id="company" type="text"
										placeholder="Perusahaan / Deskripsi" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="company" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="company"></div> -->
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

		<div class="modal fade" id="mdl_filter_org" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog" style="max-width: 600px !important">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header" id="kt_modal_new_address_header">
						<h3 class="modal-title d-flex align-items-center text-dark" id="header_title">
							<i class='fa-light fa-sliders text-dark fs-6 me-2'></i>Filter Group Menu
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
								<label class="form-label required" for="filterGroup">Group</label>
								<select data-placeholder="-- Group --" name="filterGroup" data-allow-clear="true"
									class="form-select form-select-sm w-100 h-35px" data-control="select2">
									<option></option>
									<option value="0">Semua</option>
									<?php foreach ($ls_groups as $group): ?>
										<option value="<?= $group->id; ?>"><?= $group->name; ?></option>
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
							<button type="reset" data-ripple onclick="resetFilterKec()"
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
			row.state = $.inArray(row.id, selections) !== -1;
		});
		return res;
	};

	function getRowSelections() {
		return $.map($('#grid_org').bootstrapTable('getSelections'), function (row) {
			return row
		});
	};

	function queryParams(params) {
		$('#mdl_filter_org').find('select[name]').each(function () {
			params[$(this).attr('name')] = $(this).val()
		})
		return params
	}
	$("#mdl_filter_org select").change(function () {
		$('#grid_org').bootstrapTable('refresh')
	});

	function resetFilterOrg() {
		$('#mdl_filter_org').find('select[name]').each(function () {
			$(this).val('').trigger('change');
		})
	}

	function showFilterOrg() {
		$('#mdl_filter_org').modal('show');
	}

	$(document).ready(function () {
		Inputmask({
			"mask": "9999999999999"
		}).mask("#phone");

		// TABLE USERS
		$('#grid_org').bootstrapTable({
			url: `${SITE_URL}/user/get_json/`,
			fieldId: 'id',
			customToolbarButtons: [{
				name: 'grid-filters',
				title: 'Filter',
				icon: 'bi bi-sliders',
				callback: showFilterOrg,
			},
			{
				name: 'grid-filters-reset',
				title: 'Reset Filter',
				icon: 'bi bi-eraser',
				callback: resetFilterOrg,
			},
			],
			columns: [{
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
										<a data-title="<i class='fa-light fa-pen-swirl text-dark fs-6 me-2'></i>Edit Pengguna" data-row='${JSON.stringify(row)}' class="btnEdit menu-link px-3" href="javascript:void(0)">
											<span class="svg-icon svg-icon-1 svg-icon-dark">
												<i class="fa-light fa-pen-swirl fs-6 text-dark me-2"></i> Edit
											</span>
										</a>
									</div>
									<div class="separator mx-4 border-gray-300"></div>
									<div class="menu-item px-3 text-hover-danger">
										<a data-id='${row.id}' class="btnRemove menu-link px-3" href="javascript:void(0)">
											<span class="svg-icon svg-icon-1 svg-icon-dark">
												<i class="fa-light fa-trash fs-5 text-dark me-2"></i> Hapus
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
				field: 'username',
				title: 'username',
				align: 'start',
				valign: 'middle',
				sortable: true
			},
			{
				field: 'email',
				title: 'email',
				align: 'start',
				valign: 'middle',
				sortable: true
			},
			{
				field: 'first_name',
				title: 'nama depan',
				align: 'start',
				valign: 'middle',
				sortable: true
			},
			{
				field: 'last_name',
				title: 'nama belakang',
				align: 'start',
				valign: 'middle',
				sortable: true
			},
			{
				field: 'groups',
				title: 'group',
				align: 'start',
				valign: 'middle',
				sortable: true
			}
			],
			// add config after bootstrap bootstrapTableConfig if you want to override
			...bootstrapTableConfig()
		});

		// MODAL USER
		const modalUserElm = $('#mdl_org');
		// RESET MODAL USER
		modalUserElm[0].addEventListener('hidden.bs.modal', function (e) {
			modalUserElm.find('#id').val('');
			modalUserElm.find('#act').val('');
			modalUserElm.find('#username').val('');
			modalUserElm.find('#email').val('');
			modalUserElm.find('#last_name').val('');
			modalUserElm.find('#first_name').val('');
			modalUserElm.find('#password').val('');
			modalUserElm.find('#company').val('');
			modalUserElm.find('#phone').val('');
			modalUserElm.find('#groups').val('').trigger('change');
			modalUserElm.find("[data-field]").each((index, element) => {
				$(this).find(`#${element.getAttribute("data-field")}`).removeClass('is-invalid');
				element.innerHTML = "";
			})
		})

		$('#btn_add').click(function (e) {
			e.preventDefault();
			$('#frm-org-mdl').trigger("reset");
			$('#title').html($(this).data('title'));
			$('#act').val('add');
			$('#groups').val('').trigger('change');
			$('#orgs').val('').trigger('change');
			$('#mdl_org').modal('show');
		});

		$('#grid_org').on('click', '.btnEdit', function (e) {
			const {
				row,
				title
			} = $(this).data()
			$('#title').html(title);
			$('#act').val('edit');

			//populate data
			var all_orgs = '';
			$('#id').val(row.id);
			$('#username').val(row.username);
			$('#password').val('');
			$('#email').val(row.email);
			$('#first_name').val(row.first_name);
			$('#last_name').val(row.last_name);
			$('#company').val(row.company);
			$('#phone').val(row.phone);
			$('#groups').val(row.group_id).trigger('change');
			$('#orgs').val(row.org_id).trigger('change');
			$('#bidang').val(row.bidang_id);
			$('#seksi').val(row.seksi_id);

			$('#mdl_org').modal('show');
		});

		$('#frm-org-mdl').submit(function (e) {
			e.preventDefault();
			const form_data = $("#frm-org-mdl").serialize();
			const url_form = `${SITE_URL}${$('#act').val() == 'edit' ? '/user/edit/' : '/user/add/'}`;
			const field = $(this).find("[data-field]");
			const buttonElm = $(this).find('[type="submit"]');
			$.ajax({
				type: "POST",
				url: url_form,
				dataType: "json",
				data: form_data,
				success: (data) => {
					$('.<?= $csrf['name']; ?>').val(data.<?= $csrf['name']; ?>);
					if (data.resp) {
						Swal.fire({
							html: data.msg,
							icon: "success",
							confirmButtonText: "Ok",
						})
						$('#grid_org').bootstrapTable('refresh');
						modalUserElm.modal('hide');
						$.each(field, (index, element) => {
							$(this).find(`#${element.getAttribute("data-field")}`).removeClass('is-invalid');
							element.innerHTML = "";
						})
					} else if (data.error) {
						let errors = data.error;
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
							html: data.msg,
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
			var datas = (id) ? [id] : getRowSelections().map((data) => data.id);
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
							url: SITE_URL + "/user/del/",
							dataType: "json",
							data: {
								data: datas,
								<?= $csrf['name']; ?>: $('.<?= $csrf['name']; ?>').val()
							},
							success: function (data) {
								$('.<?= $csrf['name']; ?>').val(data.<?= $csrf['name']; ?>);
								if (data.resp) {
									Swal.fire({
										html: data.msg,
										icon: "success",
										confirmButtonText: "Ok",
									});
									//location.reload();						
									$('#grid_org').bootstrapTable('refresh');
								} else {
									Swal.fire({
										html: data.msg,
										icon: "error",
										confirmButtonText: "Ok",
									});
								}
							}
						});
					}
				})
			}
		});
	});
</script>