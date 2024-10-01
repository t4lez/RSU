/**
 ------------------------------------------------------------------------------------------------
 File Manager
 ------------------------------------------------------------------------------------------------
 */
var data_editor_id = "";
$(document).on("click", "#btn_add_image_editor", function () {
	data_editor_id = $(this).attr("data-editor-id");
	refresh_ck_images();
	$("#selected_ckimg_file_id").val("");
	$("#selected_ckimg_file_path").val("");
	$("#btn_ckimg_delete").hide();
	$("#btn_ckimg_select").hide();
});

$(document).on("click", "#mdl_file_manager .file-box", function () {
	$(".file-manager .file-box").removeClass("selected");
	$(this).addClass("selected");
	var val_id = $(this).attr("data-file-id");
	var val_path = $(this).attr("data-file-path");
	$("#selected_ckimg_file_id").val(val_id);
	$("#selected_ckimg_file_path").val(val_path);

	$("#btn_ckimg_delete").show();
	$("#btn_ckimg_select").show();
});

//refresh ck images
function refresh_ck_images() {
	var data = {};
	data[csrf_name] = $(`.${csrf_name}`).val();
	$.ajax({
		type: "POST",
		url: `${BASE_URL}media/file/get_file_manager_images`,
		data: data,
		success: function (response) {
			let obj = JSON.parse(response);
			$(`.${csrf_name}`).val(obj[`${csrf_name}`]);
			if (obj.result == 1) {
				document.getElementById("ckimage_file_upload_response").innerHTML =
					obj.content;
			}
		},
	});
}

//select image file
$(document).on("click", "#mdl_file_manager #btn_ckimg_select", function () {
	let imgUrl = $("#selected_ckimg_file_path").val();
	tinymce
		.get(data_editor_id)
		.execCommand(
			"mceInsertContent",
			false,
			`<p><img src="${imgUrl}" alt=""/></p>`
		);
	$("#mdl_file_manager").modal("toggle");
});

//select image file on double click
$(document).on("dblclick", "#mdl_file_manager .file-box", function () {
	//var imgUrl = `${BASE_URL}uploads/file-manager/${$("#selected_ckimg_file_path").val()}`;
	var imgUrl = `${$("#selected_ckimg_file_path").val()}`;
	tinymce
		.get(data_editor_id)
		.execCommand(
			"mceInsertContent",
			false,
			`<p><img src="${imgUrl}" alt=""/></p>`
		);
	$("#mdl_file_manager").modal("toggle");
});

//delete image file
$(document).on("click", "#mdl_file_manager #btn_ckimg_delete", function () {
	let file_id = $("#selected_ckimg_file_id").val();
	$("#ckimg_col_id_" + file_id).remove();
	let data = {
		file_id: file_id,
	};
	data[csrf_name] = $(`.${csrf_name}`).val();
	$.ajax({
		type: "POST",
		url: `${BASE_URL}media/file/delete_file_manager_image`,
		data: data,
		success: function (response) {
			let obj = JSON.parse(response);
			$(`.${csrf_name}`).val(obj[`${csrf_name}`]);
			$("#btn_ckimg_delete").hide();
			$("#btn_ckimg_select").hide();
		},
	});
});
