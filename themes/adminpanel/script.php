<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<?= js_asset('bootstrap-table.min.js', 'bootstrap-table'); ?>
<?= js_asset('bootstrap-table-id-ID.js', 'bootstrap-table'); ?>
<?= js_asset('bootstrap-table-toolbar-buttons.js', 'bootstrap-table'); ?>
<?= js_asset('ripple.min.js', 'ripple'); ?>
<?= js_asset('lightgallery.min.js', 'lightgallery'); ?>
<?= js_asset('lg-zoom.umd.min.js', 'lightgallery'); ?>
<?= js_asset('lg-thumbnail.umd.min.js', 'lightgallery'); ?>
<?= js_asset('lg-fullscreen.umd.min.js', 'lightgallery'); ?>
<?= js_asset('lg-pager.umd.min.js', 'lightgallery'); ?>
<?= js_asset('lg-autoplay.umd.min.js', 'lightgallery'); ?>
<?= js_asset('lg-rotate.umd.min.js', 'lightgallery'); ?>
<script src="<?= site_url('assets/modules/custom/tinymce/tinymce.bundle.js'); ?>"></script>
<script src="https://unpkg.com/@develoka/angka-rupiah-js/index.min.js"></script>
<script>
	// toast change switch
	const tostChange = bootstrap.Toast.getOrCreateInstance($('#tost_change')[0]);
</script>
<?php if (isset($js)) : ?>
	<?php if (is_array($js)) : ?>
		<?php foreach ($js as $val) : ?>
			<?= $val; ?>
		<?php endforeach ?>
	<?php else : ?>
		<?= $js; ?>
	<?php endif; ?>
<?php endif; ?>
<!--end::Global Javascript Bundle-->