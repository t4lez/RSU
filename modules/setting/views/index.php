<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">
		<form id="frm_setting" method="POST" action="<?= base_url("setting/update"); ?>" class="form w-100 mb-7"
			autocomplete="off" enctype="multipart/form-data">
			<div class="card">
				<div class="card-header">
					<div class="card-title m-0">
						<h1 class="fw-bold m-0 fs-1 align-items-center d-flex">
							<i class="fa-light fa-pen-swirl fs-3 me-2"></i>
							<span>Setting</span>
						</h1>
					</div>
				</div>
				<div class="collapse show">
					<div class="card-body p-9">
						<!-- webName -->
						<div class="row">
							<label class="col-lg-4" for="webName">
								<span class="required fw-semibold fs-6">Nama Perusahaan</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input value="<?= $this->alphalib->settings['webName'] ?>" name="webName"
										id="webName" type="text" placeholder="Nama perusahaan"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="webName" class="invalid-feedback"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="webName"></div> -->
								</div>
							</div>
						</div>
						<!-- webWhatsapp -->
						<div class="row">
							<label class="col-lg-4" for="webWhatsapp">
								<span class="required fw-semibold fs-6">Jumlah Ruangan</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<input value="<?= $this->alphalib->settings['jmlRuang'] ?? ''; ?>"
										name="jmlRuang" id="jmlRuang" type="text" placeholder="Jumlah Ruangan"
										class="form-control form-control-sm" autocomplete="off" />
									<div data-field="jmlRuang" class="invalid-feedback"></div>
								</div>
							</div>
						</div>
						<!-- webAddress -->
						<!-- <div class="row">
							<label class="col-lg-4" for="webAddress">
								<span class="required fw-semibold fs-6">Alamat</span>
							</label>
							<div class="col-lg-8">
								<div class="mb-7">
									<textarea id="webAddress" name="webAddress" class="form-control form-control-sm"
										placeholder="Deskripsi singkat" autocomplete="off"
										style="height: 100px"><?= $this->alphalib->settings['webAddress'] ?? ''; ?></textarea>
									<div data-field="webAddress" class="invalid-feedback"></div>
								</div>
							</div>
						</div> -->
						<!-- webDescription -->
						<!-- <div class="row">
							<label class="col-lg-4" for="webDescription">
								<span class="required fw-semibold fs-6">Deskripsi</span>
							</label>
							<div class="col-lg-8">
								<button type="button" id="btn_add_image_editor" data-editor-id="webDescription"
									class="btn btn-sm btn-dark mb-3" data-bs-toggle="modal"
									data-bs-target="#mdl_file_manager">
									<i class="fa-light fa-plus me-1"></i>Tambah Gambar
								</button>
								<div class="mb-7">
									<textarea id="webDescription" name="webDescription"
										class="tinyMCE form-control form-control-sm tox-target" placeholder="Deskripsi"
										autocomplete="off"
										style="height: 100px"><?= $this->alphalib->settings['webDescription'] ?? ''; ?></textarea>
									<div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold"
										data-field="webDescription"></div>
								</div>
							</div>
						</div> -->
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
		<!-- FILE MANAGER -->
		<div class="modal fade" id="mdl_file_manager" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg modal-file-manager">
				<div class="modal-content rounded">
					<div class="modal-header">
						<h3 class="modal-title d-flex align-items-center text-dark" id="title">
							<i class="fa-light fa-plus text-dark fs-6 me-2"></i> Gambar
						</h3>
						<div class="btn btn-icon btn-sm ms-2" data-bs-dismiss="modal" aria-label="Close">
							<span class="svg-icon svg-icon-1">
								<i class="fa-light fa-xmark text-dark fs-3"></i>
							</span>
						</div>
					</div>
					<div class="modal-body px-5">
						<div class="file-manager">
							<div class="file-manager-left">
								<div class="dm-uploader-container">
									<div id="drag-and-drop-zone-file-manager" class="dm-uploader text-center">
										<p class="file-manager-file-types">
											<span>JPG</span>
											<span>JPEG</span>
											<span>PNG</span>
											<span>WEBP</span>
											<span>AVIF</span>
										</p>
										<p class="dm-upload-icon">
											<i class="icon-upload"></i>
										</p>
										<p class="dm-upload-text">Drag and drop gambar di sini atau</p>
										<p class="text-center">
											<button class="btn btn-default btn-browse-files">Pilih file</button>
										</p>
										<a class='btn btn-md dm-btn-select-files'>
											<input type="file" name="file" size="40" multiple="multiple">
										</a>
										<ul class="dm-uploaded-files" id="files-file-manager"></ul>
										<button type="reset" id="btn_reset_upload_image"
											class="btn btn-reset-upload">Reset</button>
									</div>
								</div>
							</div>
							<div class="file-manager-right">
								<div class="file-manager-content">
									<div id="ckimage_file_upload_response">
										<?php if (isset($fileManager)): ?>
											<?php foreach ($fileManager as $image): ?>
												<div class="col-file-manager" id="ckimg_col_id_<?= $image->fileManagerId; ?>">
													<div class="file-box" data-file-id="<?= $image->fileManagerId; ?>"
														data-file-path="<?= base_url("uploads/file-manager/$image->nama"); ?>">
														<div class="image-container">
															<img src="<?= base_url("uploads/file-manager/$image->nama"); ?>"
																alt="" class="img-responsive img-fluid">
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
								<div class="row justify-content-between g-4">
									<div class="col-12 col-md-6">
										<button type="button" id="btn_ckimg_delete"
											class="w-100 w-md-auto btn btn-sm btn-danger btn-file-delete">
											<i class="fa-light fa-trash fs-7 theme-light-show"></i>
											<i class="fa-light fa-trash fs-7 theme-dark-show text-light"></i>
											Hapus
										</button>
									</div>
									<div class="col-12 col-md-6 text-end">
										<div class="d-block d-md-flex justify-content-md-end justify-content-between">
											<button type="button" id="btn_ckimg_select"
												class="w-100 w-md-auto btn btn-sm btn-dark btn-file-select">
												<i class="fa-light fa-arrow-pointer fs-6 theme-light-show"></i>
												<i
													class="fa-light fa-arrow-pointer fs-6 theme-dark-show text-light"></i>
												Pilih gambar
											</button>
											<div class="mx-2 mb-4 mb-md-0"></div>
											<button type="reset" class="w-100 w-md-auto btn btn-sm btn-light me-3"
												data-bs-dismiss="modal">
												<i class="fa-light fa-angle-left fs-6 theme-light-show"></i>
												<i class="fa-light fa-angle-left fs-6 theme-dark-show text-light"></i>
												Kembali
											</button>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" id="selected_ckimg_file_id">
							<input type="hidden" id="selected_ckimg_file_path">
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function () {
				const BASE_MODULE = `${BASE_URL}pengaturan/about`;
				Inputmask({
					"mask": "+62 999 9999 9999",
					"placeholder": "+62 000 0000 0000",
				}).mask("#webWhatsapp");

				// UPLOADER
				$('#drag-and-drop-zone-file-manager').dmUploader({
					url: '<?= base_url("media/file/upload_file_manager_image"); ?>',
					queue: true,
					allowedTypes: 'image/*',
					extFilter: ["jpg", "jpeg", "png", "webp", "avif"],
					extraData: function (id) {
						return {
							"file_id": id,
							"<?= $csrf['name']; ?>": $('.<?= $csrf['name']; ?>').val()
						};
					},
					onNewFile: function (id, file) {
						ui_multi_add_file(id, file, "file-manager");
						if (typeof FileReader !== "undefined") {
							var reader = new FileReader();
							var img = $(`#uploaderFile${id}`).find('img');
							reader.onload = function (e) {
								img.attr('src', e.target.result);
							}
							reader.readAsDataURL(file);
						}
					},
					onBeforeUpload: function (id) {
						ui_multi_update_file_progress(id, 0, '', true);
						$("#btn_reset_upload_image").show();
					},
					onUploadProgress: function (id, percent) {
						$(`#uploaderFile${id} .dm-progress-waiting`).hide();
						ui_multi_update_file_progress(id, percent);
					},
					onUploadSuccess: function (id, data) {
						let obj = JSON.parse(data);
						$(`.${csrf_name}`).val(obj[`${csrf_name}`]);
						refresh_ck_images();
						ui_multi_update_file_progress(id, 100, 'success', false);
						if (obj.error !== '') {
							ui_multi_update_file_status(id, 'danger', obj.error);
						} else {
							ui_multi_update_file_status(id, 'success', 'Berhasil Upload');
						}

						// $(`#uploaderFile${id}`).remove()
						// $("#btn_reset_upload_image").hide();
					}
				});
				// RESET UPLOADER
				$(document).on('click', '#mdl_file_manager [type="reset"]', function () {
					$("#drag-and-drop-zone-file-manager").dmUploader("reset");
					$("#files-file-manager").empty();
					$('#mdl_file_manager #btn_reset_upload_image').hide();
				});
				// EDITOR
				function init_tinymce(selector, min_height) {
					let menu_bar = 'file edit view insert format tools table help';
					if (selector == '.tinyMCEsmall') {
						menu_bar = false;
					}
					let options = {
						selector: selector,
						min_height: min_height,
						valid_elements: '*[*]',
						relative_urls: false,
						remove_script_host: false,
						images_file_types: 'jpg,jpeg,png,webp,avif',
						directionality: "ltr",
						entity_encoding: "raw",
						menubar: menu_bar,
						plugins: [
							"advlist autolink lists link image charmap print preview anchor",
							"searchreplace visualblocks code codesample fullscreen",
							"insertdatetime media table paste imagetools"
						],
						toolbar: 'fullscreen code preview | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | numlist bullist | forecolor backcolor removeformat | table image media link | outdent indent superscript subscript',
					}
					if (KTThemeMode.getMode() === "dark") {
						options["skin"] = "oxide-dark";
						options["content_css"] = "dark";
					}
					tinymce.init(options);
				}
				if ($('.tinyMCE').length > 0) {
					init_tinymce('.tinyMCE', 500);
				}
				if ($('.tinyMCEsmall').length > 0) {
					init_tinymce('.tinyMCE', 300);
				}

				$('#frm_setting').submit(function (e) {
					e.preventDefault();
					const buttonElm = $(this).find('[type="submit"]');
					const field = $(this).find("[data-field]");
					const data = new FormData($(this)[0]);
					const url = $(this).attr('action');
					const type = $(this).attr('method');
					const dataType = 'json';
					//data.append('webDescription', tinymce.get("webDescription").getContent());
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
								}).then(() => location.reload())
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
		<script type="text/html" id="files-template-file-manager">
			<li class="media">
				<img class="preview-img" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="">
				<div class="media-body">
					<div class="progress">
						<div class="dm-progress-waiting">Waiting...</div>
						<div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</li>
		</script>

		<form id="frm_single" method="POST" action="<?= base_url('setting/update_single'); ?>" class="form w-100 mb-7"
			autocomplete="off" enctype="multipart/form-data">
			<div class="card">
				<div class="card-header">
					<div class="card-title m-0">
						<h1 class="fw-bold m-0 fs-1 align-items-center d-flex">
							<i class="fa-light fa-image me-2 fs-3"></i>
							<span>Logo</span>
						</h1>
					</div>
				</div>
				<div class="collapse show">
					<div class="card-body p-9">
						<div class="d-flex flex-wrap gap-10 gx-md-10 justify-content-start align-items-end">
							<!-- webLogoSecondary -->
							<div class="">
								<label class="mb-4">
									<span class="fw-semibold fs-6">Logo Panjang</span>
								</label>
								<div class="mb-7">
									<div class="image-input image-input-empty image-input-outline bgi-size-contain bgi-position-center"
										data-kt-image-input="true"
										style="background-image: url(<?= (isset($this->alphalib->settings['webLogoSecondary']) && file_exists("uploads/logo/{$this->alphalib->settings['webLogoSecondary']}")) ? base_url("uploads/logo/{$this->alphalib->settings['webLogoSecondary']}") : base_url("assets/image/blank-image.svg") ?>)">
										<div class="image-input-wrapper bgi-size-contain bgi-position-center"
											style="height: 170px; width: 250px;"></div>
										<label
											class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="change" data-bs-toggle="tooltip"
											data-bs-dismiss="click" title="Pilih Gambar">
											<i class="fa fa-pencil fs-7"></i>
											<input type="file" name="webLogoSecondary"
												accept=".png, .jpg, .jpeg, .webp, .avif" />
											<input type="hidden" name="webLogoSecondary_remove" />
										</label>
									</div>
									<div data-field="webLogoSecondary" class="text-danger fs-7"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="webLogoSecondary"></div> -->
								</div>
							</div>
							<!-- webLogo -->
							<div class="">
								<label class="mb-4">
									<span class="fw-semibold fs-6">Logo</span>
								</label>
								<div class="mb-7">
									<div class="image-input image-input-empty image-input-outline bgi-size-contain bgi-position-center"
										data-kt-image-input="true"
										style="background-image: url(<?= (isset($this->alphalib->settings['webLogo']) && file_exists("uploads/logo/{$this->alphalib->settings['webLogo']}")) ? base_url("uploads/logo/{$this->alphalib->settings['webLogo']}") : base_url("assets/image/blank-image.svg") ?>)">
										<div class="image-input-wrapper" style="height: 170px; width: 170px;"></div>
										<label
											class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="change" data-bs-toggle="tooltip"
											data-bs-dismiss="click" title="Pilih Gambar">
											<i class="fa fa-pencil fs-7"></i>
											<input type="file" name="webLogo"
												accept=".png, .jpg, .jpeg, .webp, .avif" />
											<input type="hidden" name="webLogo_remove" />
										</label>
									</div>
									<div data-field="webLogo" class="text-danger fs-7"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="webLogo"></div> -->
								</div>
							</div>
							<!-- webFavicon -->
							<div class="">
								<label class="mb-4">
									<span class="fw-semibold fs-6">Favicon</span>
								</label>
								<div class="mb-7">
									<div class="image-input image-input-empty image-input-outline bgi-size-auto bgi-position-center"
										data-kt-image-input="true"
										style="background-image: url(<?= (isset($this->alphalib->settings['webFavicon']) && file_exists("uploads/logo/{$this->alphalib->settings['webFavicon']}")) ? base_url("uploads/logo/{$this->alphalib->settings['webFavicon']}") : base_url("assets/image/blank-image.svg") ?>)">
										<div class="image-input-wrapper bgi-size-auto bgi-position-center"
											style="height: 100px; width: 100px;"></div>
										<label
											class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="change" data-bs-toggle="tooltip"
											data-bs-dismiss="click" title="Pilih Gambar">
											<i class="fa fa-pencil fs-7"></i>
											<input type="file" name="webFavicon"
												accept=".png, .jpg, .jpeg, .webp, .avif, .ico" />
											<input type="hidden" name="webFavicon_remove" />
										</label>
									</div>
									<div data-field="webFavicon" class="text-danger fs-7"></div>
									<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="webFavicon"></div> -->
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
			</div>
		</form>

		<?php if ($banners): ?>
			<form id="frm_multiple" method="POST" action="<?= base_url('setting/update_multiple'); ?>" class="form w-100"
				autocomplete="off" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title m-0">
							<h1 class="fw-bold m-0 fs-1 align-items-center d-flex">
								<i class="fa-light fa-image me-2 fs-3"></i>
								<span>Carousel</span>
							</h1>
						</div>
					</div>
					<div class="collapse show">
						<div class="card-body p-9">
							<div class="d-flex flex-wrap gap-10 gx-md-10 justify-content-between align-items-end">
								<?php foreach ($banners as $key => $banner): ?>
									<div class="">
										<div class="mb-7">
											<div class="image-input image-input-empty image-input-outline bgi-size-cover bgi-position-center"
												data-kt-image-input="true"
												style="background-image: url(<?= (isset($banner->image) && file_exists("uploads/banner/{$banner->image}")) ? base_url("uploads/banner/{$banner->image}") : base_url("assets/image/blank-image.svg") ?>)">
												<div class="image-input-wrapper bgi-size-cover bgi-position-center"
													style="height: 170px; width: 170px;"></div>
												<label
													class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
													data-kt-image-input-action="change" data-bs-toggle="tooltip"
													data-bs-dismiss="click" title="Pilih Gambar">
													<i class="fa fa-pencil fs-7"></i>
													<input type="file" name="banner<?= $banner->bannerId ?>"
														accept=".png, .jpg, .jpeg, .webp, .avif" />
													<input type="hidden" name="banner<?= $banner->bannerId ?>_remove" />
												</label>
											</div>
											<div data-field="banner<?= $banner->bannerId ?>" class="text-danger fs-7"></div>
											<!-- <div class="text-danger mx-4 py-0 mt-1 mb-7 fs-7 fw-semibold" data-field="banner<?= $banner->bannerId ?>"></div> -->
										</div>
									</div>
								<?php endforeach ?>
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
				</div>
			</form>
		<?php endif; ?>
		<script>
			$(document).ready(function () {
				// ? Submit single
				$('#frm_single').submit(function (e) {
					e.preventDefault();
					const field = $(this).find("[data-field]");
					const data = new FormData($(this)[0])
					const id = $(this).attr('id')
					$.ajax({
						type: "POST",
						url: $(this).attr('action'),
						dataType: "json",
						processData: false,
						contentType: false,
						cache: false,
						data,
						success: function (data) {
							if (data.success) {
								Swal.fire({
									html: data.msg,
									icon: "success",
									confirmButtonText: "Ok",
								}).then((result) => {
									if (result.isConfirmed) {
										location.reload()
									}
								})
							} else if (data.errors) {
								let errors = data.errors;
								let errorKey;
								$.each(field, (index, element) => {
									errorKey = element.getAttribute("data-field");
									if (errors[errorKey]) {
										$(`#${id} #${errorKey}`).addClass('is-invalid');
										element.innerHTML = errors[errorKey];
									} else {
										$(`#${id} #${errorKey}`).removeClass('is-invalid');
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
						}
					});
				});
				// ? Submit multiple
				$('#frm_multiple').submit(function (e) {
					e.preventDefault();
					const field = $(this).find("[data-field]");
					const data = new FormData($(this)[0])
					const id = $(this).attr('id')
					$.ajax({
						type: "POST",
						url: $(this).attr('action'),
						dataType: "json",
						processData: false,
						contentType: false,
						cache: false,
						data,
						success: function (data) {
							if (data.success) {
								Swal.fire({
									html: data.msg,
									icon: "success",
									confirmButtonText: "Ok",
								}).then((result) => {
									if (result.isConfirmed) {
										location.reload()
									}
								})
							} else if (data.errors) {
								let errors = data.errors;
								let errorKey;
								$.each(field, (index, element) => {
									errorKey = element.getAttribute("data-field");
									if (errors[errorKey]) {
										$(`#${id} #${errorKey}`).addClass('is-invalid');
										element.innerHTML = errors[errorKey];
									} else {
										$(`#${id} #${errorKey}`).removeClass('is-invalid');
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
						}
					});
				});
			});
		</script>
	</div>
</div>