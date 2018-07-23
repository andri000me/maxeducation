<style>
#cancelComment {
	margin-right: 5px;
}

#btnLampirkanFile {
	margin-top: 5px;
}
</style>

<section class="content-header">
	<h1>
		Kiriman
		<!-- <small>Control panel</small> -->
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= site_url()?>guru"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Kiriman</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-lg-9">
			<div class="box box-info">
				<div class="box-header with-border">

					<div class="user-block">
						<span class="username">Oleh <strong><?= $kiriman->username ?> 
							<?php if ($kiriman->role_id == 2): ?>
								<span class="fa fa-graduation-cap text-red"></span>

							<?php else: ?>
								<span class="fa fa-user text-green"></span>
							<?php endif ?>

						</strong> untuk <a href="<?= site_url('guru/kelas/'.$kiriman->slug) ?>"><?= $kiriman->nama_kelas ?></a></span>
						<span class="description">Shared publicly - <?= $kiriman->created_at?></span>
					</div>


					<div class="box-tools pull-right">
						<button type="button" class="btn btn-flat btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>

						<?php if ($this->session->userdata('user_id') == $kiriman->user_id): ?>
							<div class="btn-group">
								<button type="button" class="btn btn-flat btn-info dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a role="botton" href="javascript:void(0)" onclick="deletePost(`<?= $kiriman->id_kelas_posts ?>`)">Hapus Kiriman</a>
									</li>
									<li>
										<a href="<?= site_url('guru/post/edit/'.$kiriman->id_kelas_posts)?>">Ubah Kiriman</a>
									</li>
								</ul>
							</div>
						<?php endif ?>

					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-xs-12 col-md-12">
						<p><?= $kiriman->catatan ?></p>

						<?php if (!empty($kiriman->document)): ?>
							<div class="attachment-block clearfix">
								<a href="<?= site_url('guru/post/download/'. $kiriman->id_kelas_posts); ?>"><?= $kiriman->document?></a>
							</div>
						<?php endif ?>

						
					</div>
				</div>

				<div class="box-footer clearfix">
					<span class="pull-right text-muted"><?= $jumlah_comment?> Komentar</span>
				</div>

				<div class="box-footer box-comments">
					<?php foreach ($kiriman_comment as $comment): ?>
						<div class="box-comment" style="margin-bottom: 2px">
							<div class="comment-text">
								<div class="">
									<span class="username"><?= $comment->username ?> 

										<?php if ($comment->role_id == 2): ?>
											<span class="fa fa-graduation-cap text-red"></span>

										<?php else: ?>
											<span class="fa fa-user text-green"></span>
										<?php endif ?>
									</span>
									<span class="description"><?= $comment->created_at?></span>

									<div class="box-tools  pull-right">
										<?php if ($this->session->userdata('user_id') == $comment->user_id): ?>
											<div class="btn-group">
												<button type="button" class="btn btn-flat btn-info dropdown-toggle btn-xs" data-toggle="dropdown">
													<span class="caret"></span>
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a role="botton" href="javascript:void(0)" onclick="deleteCommentPost(`<?= $comment->id_kelas_comments ?>`)">Hapus Balasan</a>
													</li>
												</ul>
											</div>
										<?php endif ?>

									</div>
								</div>
								
								<br>

								<?= $comment->comment ?>

								<br>
								<br>

								<?php if (!empty($comment->document)): ?>
									<div class="attachment-block clearfix">
										<a href="<?= site_url('guru/post/download/'. $comment->id_kelas_comments); ?>"><?= $comment->document?></a>
									</div>
								<?php endif ?>

							</div>
						</div>
					<?php endforeach ?>

				</div>

				<div class="box-footer">
					<form action="javascript:void(0)" method="POST" id="formComment">
						<div class="img-push">
							<textarea name="comment" rows="2" id="comment" placeholder="Ketik balasan.." class="form-control"></textarea>
							<span class="help-block"></span>
							<!-- <input type="text" class="form-control input-sm" id="comment" placeholder="Ketik balasan.."> -->
						</div>


						<div class="box-footer clearfix">
							<div class="row">
								<div class="col-xs-12 col-md-12">
									<div class="form-group">
										<div class="btn btn-flat btn-default btn-file" data-toggle="tooltip" data-placement="top" title="Lampirkan File Document">
											<i class="fa fa-paperclip"></i> Document
											<input type="file" name="document" >
											<span class="help-block"></span>
										</div>
										<p class="help-block">Jenis file yang diperbolehkan : DOC/DOCX/PDF/XLS/XLSX/PPT/PPTX/ZIP/RAR</p>
									</div>
								</div>

							</div>
						</div>

						
					</form>

					<button type="botton" class="btn btn-flat btn-primary pull-right" id="btnSaveComment" onclick="comment()">Kirim</button>

				</div>

			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-lg-9">
			<div class="box">
				<div class="box-body">
					<!-- <button class="btn btn-danger btn-block" type="reset">Kembali</button> -->
					<a href="<?= site_url()?>guru" class="btn btn-flat btn-danger btn-block">Kembali</a>
				</div>
			</div>

		</div>
	</div>
</section>

<script>
	const URL_DELETE_POST = `<?= site_url() ?>post/delete/`;
	const URL_TAMBAH_COMMENT = `<?= site_url()?>post/comment/create/`;
	const URL_DELETE_COMMENT = `<?= site_url()?>post/comment/delete/`;

	let id_kelas_posts = `<?= $this->uri->segment(3)?>`;

	$(document).ready(() => {

		$('#cancelComment').click(function(event) {
			// console.log('Batal Clicked');
			$('#formComment')[0].reset();
		});

		$("textarea").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});

		$("input").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});

	});

	function comment() {
		$('#btnSaveComment').text('Mengirim...');
		$('#btnSaveComment').attr('disabled',true);


		var formData = new FormData($('#formComment')[0]);
		$.ajax({
			url : `${URL_TAMBAH_COMMENT}${id_kelas_posts}`,
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
				$('#btnSaveComment').text('Kirim');
				$('#btnSaveComment').attr('disabled',false);
			},
			error: function (err){
				swal("Error", "Error Adding Data", "error");
				$('#btnSaveComment').text('Kirim');
				$('#btnSaveComment').attr('disabled',false);

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

						if (response.success) {
							swal({
								title: "Sukses",
								text: `${response.message}`,
								icon: "success",
							})
							.then((success) => {
								if (success) {
									location.href = `<?= site_url()?>guru`;
								}
							})
							.then(() => {
								setTimeout(() => {
									location.href = `<?= site_url()?>guru`;
								}, 1000);
							});
						}
						
					},
					error : function(){
						swal("Gagal", "Data Gagal Dihapus", "error");
					}
				});
			}
		});

	}

	function deleteCommentPost(id_kelas_comments){
		// console.log(id_kelas_comments);

		swal({
			title: "Hapus Balasan ??",
			text: "Balasan Yang Anda Pilih Akan Dihapus",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					url: `${URL_DELETE_COMMENT}${id_kelas_comments}`,
					dataType: 'JSON',
					success: function(response){
						// console.log(response);

						if (response.success) {
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
						}
						
					},
					error : function(){
						swal("Gagal", "Data Gagal Dihapus", "error");
					}
				});
			}
		});

	}
</script>