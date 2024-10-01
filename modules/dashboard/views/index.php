<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-xxl">
		<div class="row g-5 g-xl-10">
			<div class="col-12">
				<div class="card card-flush bg-transparent">
					<div class="card-header rounded h-250px p-7 position-relative" style="background-color: #33866c;">
						<div class="position-relative fs-2x z-index-2 text-gray-200 fw-bold mt-10">
							<?php if ($this->session->flashdata('status')): ?>
								<span><?= $this->session->flashdata('msg'); ?></span>
							<?php endif; ?>
						</div>
						<img src="<?= base_url('assets/image/dashboard.png'); ?>"
							class="position-absolute me-3 h-md-350px h-300px" style="bottom: -35px;right: -10px;"
							alt="">
						<?php if (!$this->session->flashdata('status')): ?>
							<img src="<?= base_url('assets/image/welcome.png'); ?>"
								class="position-absolute me-3 h-md-200px h-150px d-none d-md-block"
								style="bottom: 55px;left: 10px;" alt="">
						<?php endif; ?>
					</div>
					<div class="card-body mt-n20">
						<div class="row g-5 g-xl-10">
							<div class="col-12 col-lg-3 col-md-6">
								<div>
									<div class="card card-flush py-3 px-7 h-100">
										<div class="card-header rounded px-0">
											<div class="card-title d-flex gap-3" style="color: #33866C !important;">
												<div class="symbol symbol-50px symbol-circle"
													style="background-color: #c3dbd3;">
													<div class="symbol-label fs-2 fw-semibold text-success">
														<i class="fa-solid fa-bed fs-3" style="color: #33866C;"></i>
													</div>
												</div>
												<div class="d-flex flex-column">
													<span class="fs-5 fw-bold me-2">Ruangan Tersedia</span>
												</div>
											</div>
										</div>
										<div class="row h-100 align-items-center">
											<div class="col-12">
												<div
													class="card-body rounded d-flex flex-column justify-content-end pb-3 px-0 mt-3">
													<div class="d-flex justify-content-between align-items-end">
														<span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">
															<?= $ruangan_tersedia; ?>
														</span>
														<a href="<?= base_url("ruangan"); ?>"
															style="color: #33866C !important;"
															class="text-primary fw-semibold fs-6 me-2">
															Lihat Semua
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3 col-md-6">
								<div>
									<div class="card card-flush py-3 px-7 h-100">
										<div class="card-header rounded px-0">
											<div class="card-title d-flex gap-3" style="color: #33866C !important;">
												<div class="symbol symbol-50px symbol-circle"
													style="background-color: #c3dbd3;">
													<div class="symbol-label fs-2 fw-semibold text-success">
														<i class="fa-solid fa-bed fs-3" style="color: #33866C;"></i>
													</div>
												</div>
												<div class="d-flex flex-column">
													<span class="fs-5 fw-bold me-2">Ruangan Terpakai</span>
												</div>
											</div>
										</div>
										<div class="row h-100 align-items-center">
											<div class="col-12">
												<div
													class="card-body rounded d-flex flex-column justify-content-end pb-3 px-0 mt-3">
													<div class="d-flex justify-content-between align-items-end">
														<span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">
															<?= $ruangan_terpakai; ?>
														</span>
														<a href="<?= base_url("ruangan"); ?>"
															style="color: #33866C !important;"
															class="text-primary fw-semibold fs-6 me-2">
															Lihat Semua
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3 col-md-6">
								<div>
									<div class="card card-flush py-3 px-7 h-100">
										<div class="card-header rounded px-0">
											<div class="card-title d-flex gap-3" style="color: #33866C !important;">
												<div class="symbol symbol-50px symbol-circle"
													style="background-color: #c3dbd3;">
													<div class="symbol-label fs-2 fw-semibold text-success">
														<i class="fa-solid fa-bed fs-3" style="color: #33866C;"></i>
													</div>
												</div>
												<div class="d-flex flex-column">
													<span class="fs-5 fw-bold me-2">Tempat Tidur</span>
												</div>
											</div>
										</div>
										<div class="row h-100 align-items-center">
											<div class="col-12">
												<div
													class="card-body rounded d-flex flex-column justify-content-end pb-3 px-0 mt-3">
													<div class="d-flex justify-content-between align-items-end">
														<span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">
															<?= $jumlah_kamar; ?>
														</span>
														<a href="<?= base_url("ruangan"); ?>"
															style="color: #33866C !important;"
															class="text-primary fw-semibold fs-6 me-2">
															Lihat Semua
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3 col-md-6">
								<div>
									<div class="card card-flush py-3 px-7 h-100">
										<div class="card-header rounded px-0">
											<div class="card-title d-flex gap-3" style="color: #33866C !important;">
												<div class="symbol symbol-50px symbol-circle"
													style="background-color: #c3dbd3;">
													<div class="symbol-label fs-2 fw-semibold text-success">
														<i class="fa-solid fa-users fs-3" style="color: #33866C;"></i>
													</div>
												</div>
												<div class="d-flex flex-column">
													<span class="fs-5 fw-bold me-2">Pasien</span>
												</div>
											</div>
										</div>
										<div class="row h-100 align-items-center">
											<div class="col-12">
												<div
													class="card-body rounded d-flex flex-column justify-content-end pb-3 px-0 mt-3">
													<div class="d-flex justify-content-between align-items-end">
														<span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">
															<?= $jumlah_pasien; ?>
														</span>
														<a href="<?= base_url("ruangan"); ?>"
															style="color: #33866C !important;"
															class="text-primary fw-semibold fs-6 me-2">
															Lihat Semua
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="row g-5 g-xl-10">
									<div class="col-12">
										<div class="card card-flush" style="height: 650px;">
											<div class="card-header px-7 pt-7">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bold text-gray-800">Data Pasien</span>
													<span class="text-gray-400 mt-1 fw-semibold fs-6">Total pasien
														<span id="pasien_total"><?= $jumlah_pasien; ?></span>
														orang</span>
												</h3>
												<div class="card-toolbar">
													<a href="<?= base_url('pasien'); ?>"
														class="btn btn-sm btn-light">Lihat semua</a>
													<div id="toolbar_pasien">
													</div>
												</div>
											</div>
											<div class="card-body px-7 pb-7">
												<table  id="grid_pasien">
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	#grid_pasien thead tr th{
		border-bottom: 2px solid #EBEDF3;
		border-bottom-width: 1px;
	}
</style>
<script>
	$(document).ready(function () {
		$('#grid_pasien').bootstrapTable({
			// add config after bootstrap bootstrapTableConfig if you want to override
			...bootstrapTableConfig(),
			url: `${SITE_URL}pasien/get_json`,
			fieldId: 'pasienId',
			toolbar: '#toolbar_pasien',
			columns: [
				{
					field: 'nama',
					title: 'Nama Pasien',
					align: 'start',
					valign: 'middle',
					sortable: true,
				},
				{
					field: 'alamat',
					title: 'Alamat',
					align: 'start',
					valign: 'middle',
					sortable: true,
					formatter: (val, row) => row.alamat?.length > 20 ? `${row.alamat.substr(0, 20)}...` : row.alamat
				},
				{
					field: 'createAt',
					title: 'Dibuat',
					align: 'start',
					valign: 'middle',
					sortable: true,
					formatter: (value, row, index) => {
						return moment(row.createAt).format('ll') + " jam " + moment(row.createAt).format('HH:mm')
					}
				}
			],
			classes: 'table border table-bordered table-hover',
			search: false,
			showColumns: false,
			showRefresh: false,
			showFullscreen: false,
			pagination: false,
			pageSize: 10,
		});
	});
</script>