<style>
#cancel {
	margin-right: 5px;
}

#cancelComment {
	margin-right: 5px;
}

#btnLampirkanFile {
	margin-top: 5px;
}
</style>

<section class="content-header">
	<h1>
		Edit Kiriman
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-lg-9">
			<div class="box box-info">
				<div class="box-header">

				</div>

				<form action="javascript:void(0)" method="POST" id="formEditPost">
					<div class="box-body">
						<textarea name="catatan" rows="3" class="form-control"><?= $kiriman->catatan ?></textarea>
						<span class="help-block"></span>

						<select name="kelas_id" class="form-control">
							<option value="">--Pilih Kelas--</option>
							<?php foreach ($kelass as $kelas): ?>
								<option <?= $kiriman->id_kelas == $kelas->id_kelas ? 'selected' : '' ?> value="<?= $kelas->id_kelas ?>"><?= $kelas->nama_kelas ?></option>
							<?php endforeach ?>
						</select>
						<span class="help-block"></span>

						<div class="box-footer clearfix">

							<div class="row">
								<div class="col-xs-12 col-md-12">
									<div class="form-group">
										<div class="btn btn-default btn-file" data-toggle="tooltip" data-placement="top" title="Lampirkan File Document">
											<i class="fa fa-paperclip"></i> Document
											<input type="file" name="document" >
											<span class="help-block"></span>
										</div>
										<p class="help-block">Jenis file yang diperbolehkan : DOC/DOCX/PDF/XLS/XLSX/PPT/PPTX/ZIP/RAR</p>
									</div>
								</div>

							</div>


							<button type="botton" id="btnSave" onclick="save()" class="pull-right btn btn-primary">Edit Kiriman
								<i class="fa fa-arrow-circle-right"></i>
							</button>

							<button class="btn btn-danger pull-right" onclick="window.history.go(-1)" type="reset" id="cancel">Kembali</button>

							<!-- <a href="javascript:void(0)" class="pull-right btn btn-danger" id="cancel">Kembali</a> -->
						</div>


					</div>
				</form>
			</div>


		</div>
	</div>


</section>

<script>
	const URL_EDIT_POST = `<?= site_url()?>siswa/post/edit/store/`;

	const ID_POST = `<?= $this->uri->segment(4)?>`;

	$(document).ready(() => {
		$('#cancel').click(function(event) {
			// console.log('Batal Clicked');
			$('#formPost')[0].reset();
		});

		$("textarea").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});

		$("select").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	});

	function save(){
		$('#btnSave').text('Mengedit...');
		$('#btnSave').attr('disabled',true);

		var formData = new FormData($('#formEditPost')[0]);
		$.ajax({
			url : `${URL_EDIT_POST}${ID_POST}`,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data){
				if(data.status){
					swal({
						title: "Sukses",
						text: `${data.message}`,
						icon: "success",
					})
					.then((success) => {
						if (success) {
							location.href = `<?= site_url()?>siswa/post/${ID_POST}`;
						}
					}).then(() => {
						setTimeout(() => {
							location.href = `<?= site_url()?>siswa/post/${ID_POST}`;

							// location.href = `<?= redirect('guru','refresh')?>`;
						}, 2000);
					});

				} else{
					for (var i = 0; i < data.inputerror.length; i++){
						$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
						$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
					}
				}
				$('#btnSave').text('Edit Kiriman');
				$('#btnSave').attr('disabled',false);
			},
			error: function (err){
				swal("Error", "Error Editing Data", "error");
				$('#btnSave').text('Edit Kiriman');
				$('#btnSave').attr('disabled',false);

			}
		});
	}
</script>