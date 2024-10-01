<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">
		<form id="frm_profile" method="POST" action="<?= base_url("profile/update"); ?>" class="form w-100"
			autocomplete="off" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $profile->id; ?>">
			<div class="card">
				<div class="card-header">
					<div class="card-title m-0">
						<h1 class="fw-bold m-0 fs-1 align-items-center d-flex">
							<i class="fa-light fa-pen-swirl me-2"></i>
							<span>Edit Profil</span>
						</h1>
					</div>
				</div>
				<div class="collapse show">
					<div class="card-body p-9">
						<div class="row">
							<label class="col-lg-4" for="username">
								<span class="fw-semibold fs-6">Username</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input value="<?= $profile->username; ?>" type="text" disabled
										class="form-control form-control-sm" autocomplete="off" />
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-4" for="email">
								<span class="fw-semibold fs-6">Email</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input value="<?= $profile->email; ?>" type="text" disabled
										class="form-control form-control-sm" autocomplete="off" />
								</div>
							</div>
						</div>
						<!-- first_name -->
						<div class="row">
							<label class="col-lg-4" for="first_name">
								<span class="required fw-semibold fs-6">Nama depan</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input value="<?= $profile->first_name; ?>" name="first_name" id="first_name"
										type="text" placeholder="Nama depan" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="first_name" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="first_name"></div> -->
								</div>
							</div>
						</div>
						<!-- last_name -->
						<div class="row">
							<label class="col-lg-4" for="last_name">
								<span class="fw-semibold fs-6">Nama belakang</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input value="<?= $profile->last_name; ?>" name="last_name" id="last_name"
										type="text" placeholder="Nama belakang" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="last_name" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="last_name"></div> -->
								</div>
							</div>
						</div>
						<!-- phone -->
						<div class="row">
							<label class="col-lg-4" for="phone">
								<span class="required fw-semibold fs-6">No telepon</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input value="<?= $profile->phone; ?>" name="phone" id="phone" type="text"
										placeholder="No telepon" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="phone" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="phone"></div> -->
								</div>
							</div>
						</div>
						<!-- password -->
						<div class="row">
							<label class="col-lg-4" for="password">
								<span class="fw-semibold fs-6">Password</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input name="password" id="password" type="password" placeholder="Password"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="password" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="password"></div> -->
								</div>
							</div>
						</div>
						<!-- confirmPasswod -->
						<div class="row">
							<label class="col-lg-4" for="password_conf">
								<span class="fw-semibold fs-6">Konfirmasi password</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input name="password_conf" id="password_conf" type="password"
										placeholder="Konfirmasi password" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="password_conf" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="password_conf"></div> -->
								</div>
							</div>
						</div>
						<!-- company -->
						<div class="row">
							<label class="col-lg-4" for="company">
								<span class="fw-semibold fs-6">Perusahaan / Deskripsi</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input value="<?= $profile->company; ?>" name="company" id="company" type="text"
										placeholder="Perusahaan / Deskripsi" class="form-control form-control-sm"
										autocomplete="off" />
									<div data-field="company" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="company"></div> -->
								</div>
							</div>
						</div>
					</div>
					<!--begin::Actions-->
					<div class="card-footer d-flex justify-content-end py-6 px-9">
						<button type="submit" class="btn btn-sm btn-dark" data-kt-indicator="off">
							<i class="fa-light fa-save fs-3"></i>
							<span class="indicator-label">Simpan</span>
							<span class="indicator-progress">
								<span class="spinner-border spinner-border-sm align-middle ms-2 me-1"></span>
								Proses...
							</span>
						</button>
					</div>
					<!--end::Actions-->
				</div>
				<!--end::Content-->
			</div>
		</form>

		<script>
			$(document).ready(function () {
				const BASE_MODULE = `${BASE_URL}user`;


				$('#frm_profile').submit(function (e) {
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
								error,
								message
							} = data;
							if (success) {
								Swal.fire({
									html: message,
									icon: "success",
									confirmButtonText: "Ok",
								}).then(() => {
									location.reload()
								});
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
			});
		</script>
	</div>
</div>