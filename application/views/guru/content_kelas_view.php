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
		<?= $kelas->nama_kelas ?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= site_url()?>guru"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?= $kelas->nama_kelas ?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-lg-9">
			<div class="box box-info">
				<div class="box-header">
					<h1 class="box-title"><b>Kabar Berita</b></h1> <br>
					<p>Update Materi</p>
				</div>
				<form action="javascript:void(0)" method="post" id="formPost">
					<div class="box-body">
						<textarea name="catatan" rows="3" placeholder="Ketik catatanmu di sini" class="form-control"></textarea>
						<span class="help-block"></span>

						<br>

						<select name="kelas_id" id="" class="form-control">
							<option value="<?= $kelas->id_kelas?>"><?= $kelas->nama_kelas ?></option>
						</select>
						<span class="help-block"></span>
						
					</div>


					<div class="box-footer clearfix">
						<!-- <p>Lampirkan : </p> -->
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

						<button type="botton" id="btnSave" onclick="save()" class="pull-right btn btn-flat btn-primary">Kirim</button>
						
						<a href="javascript:void(0)" class="pull-right btn btn-flat btn-danger" id="cancel">Batal</a>
					</div>

				</form>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="box box-info">
				<div class="box-header">
					<h1 class="box-title"><b>Info</b></h1> <br>
				</div>
				<div class="box-body">
					<p>Info Untuk Kelas</p>
				</div>
			</div>

			<div class="box box-info">
				<div class="box-header">
					<h1 class="box-title"><b>Iklan</b></h1> <br>
				</div>
				<div class="box-body">
					<p>Iklan Untuk Kelas</p>
				</div>
			</div>
		</div>

		

	</div>

	<div class="row">
		<div class="col-lg-9">
			<div class="box box-info">
				<div class="box-header">
					<h1 class="box-title"><b>Kiriman Terbaru</b></h1>
				</div>
			</div>

			<?php foreach ($kelas_posts as $post): ?>

				<div class="box box-info">
					<div class="box-header with-border">
						<div class="user-block">
							<span class="username"><strong><?= $post->username ?>
							<?php if ($post->role_id == 2): ?>
								<span class="fa fa-graduation-cap text-red"></span>

								<?php else: ?>
									<span class="fa fa-user text-green"></span>
								<?php endif ?>
							</strong> untuk <a href="<?= site_url('guru/'.$post->slug) ?>"><?= $post->nama_kelas ?></a></span>
							<span class="description">Shared - <?= $post->created_at?></span>
						</div>


						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>

							<?php if ($this->session->userdata('user_id') == $post->id_user): ?>
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a role="botton" href="javascript:void(0)" onclick="deletePost(<?= $post->id_kelas_posts ?>)">Hapus Kiriman</a>
										</li>
										<li>
											<a href="<?= site_url('guru/post/edit/'.$post->id_kelas_posts)?>">Ubah Kiriman</a>
										</li>
									</ul>
								</div>
							<?php endif ?>

						</div>
					</div>

					<div class="box-body">
						<div class="col-xs-12 col-md-12">
							<p><?= $post->catatan ?></p>
						</div>
					</div>
					<div class="box-footer clearfix">
						<a class="btn btn-flat btn-primary btn-xs" href="<?= site_url('guru/post/'.$post->id_kelas_posts)?>">Lihat Kiriman</a>
					</div>

				</div>
			<?php endforeach ?>
		</div>
	</div>


</section>

<script>
	const URL_TAMBAH_POST = `<?= site_url()?>post/create`;
	const URL_DELETE_POST = `<?= site_url() ?>post/delete/`;

	$(document).ready(() => {
		$('#cancel').click(function(event) {
			// console.log('Batal Clicked');
			$('#formPost')[0].reset();
		});

		$("select").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});

		$("textarea").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	});

	function save(){
		$('#btnSave').text('Mengirim...');
		$('#btnSave').attr('disabled',true);

		var formData = new FormData($('#formPost')[0]);
		$.ajax({
			url : `${URL_TAMBAH_POST}`,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data){
				// console.log(data);
				if(data.success){
					swal({
						title: "Sukses",
						text: `${data.message}`,
						icon: "success",
					})
					.then((success) => {
						if (success) {
							location.reload();
						}
					}).then(() => {
						setTimeout(() => {
							location.reload();
						}, 2000);
					});

				} else{
					for (var i = 0; i < data.inputerror.length; i++){
						$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
						$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
					}
				}
				$('#btnSave').text('Kirim');
				$('#btnSave').attr('disabled',false);
			},
			error: function (err){
				swal("Error", "Error Adding Data", "error");
				$('#btnSave').text('Kirim');
				$('#btnSave').attr('disabled',false);

			}
		});
	}

	function deletePost(id_post){
		// console.log(id_post);

		swal({
			title: "Hapus Kiriman ??",
			text: "Kiriman Yang Anda Pilih Akan Dihapus",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					url: `${URL_DELETE_POST}${id_post}`,
					dataType: 'JSON',
					success: function(response){
						// console.log(response);
						swal({
							title: "Sukses",
							text: `${response.message}`,
							icon: "success",
						})
						.then((success) => {
							if (success) {
								location.reload();
							}
						})
						.then(() => {
							setTimeout(() => {
								location.reload();
							}, 1000);
						});
					},
					error : function(){
						swal("Gagal", "Data Gagal Dihapus", "error");
					}
				});
			}
		});

	}
</script>