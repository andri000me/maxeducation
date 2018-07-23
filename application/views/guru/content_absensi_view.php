<style>
#cancel {
	margin-right: 15px;
}

.lap {
	margin-top: 2%;
}
</style>

<section class="content-header">
	<h1>
		Absensi Siswa
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= site_url()?>guru"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Absensi Siswa</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-info">
				<div class="box-header">
				</div>

				<form action="javascript:void(0)" method="post" id="formAbsensi">
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-3 control-label">Nama Siswa</label>
									<div class="col-md-9">
										<div class="form-line">
											<select class="form-control select2" name="siswa_id" style="width: 100%;" required>
												<option value=''>--pilih--</option>
												<?php foreach($siswa as $siswa): ?>
													<option value="<?= $siswa->id_siswa ?>"><?= $siswa->nama_lengkap_siswa ?></option>
												<?php endforeach ?>
											</select>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-3 control-label">Hari</label>
									<div class="col-md-9">
										<div class="form-line">
											<select class="form-control select2" name="hari_id" style="width: 100%;" required>
												<option value=''>--pilih--</option>
												<?php foreach($hari as $hari): ?>
													<option value="<?= $hari->id_hari ?>"><?= $hari->hari ?></option>
												<?php endforeach ?>
											</select>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-3 control-label">Mata Pelajaran</label>
									<div class="col-md-9">
										<div class="form-line">
											<select class="form-control select2" name="mata_pelajaran_id" style="width: 100%;" required>
												<option value=''>--pilih--</option>
												<?php foreach($siswa as $siswa): ?>
													<option value="<?= $siswa->id_siswa ?>"><?= $siswa->nama_lengkap_siswa ?></option>
												<?php endforeach ?>
											</select>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-3 control-label">Jam</label>
									<div class="col-md-9">
										<div class="form-line">
											<select class="form-control select2" name="jam_id" style="width: 100%;" required>
												<option value=''>--pilih--</option>
												<?php foreach($jam as $jam): ?>
													<option value="<?= $jam->id_jam ?>"><?= $jam->jam ?></option>
												<?php endforeach ?>
											</select>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="form-group lap">
							<label for="email">Laporan Perkembangan Siswa :</label>
							<textarea name="laporan" rows="5" class="form-control" required></textarea>
							
						</div>						
						
					</div>
					<br>


					<div class="box-footer clearfix">

						<button type="submit" id="btnSave" class="pull-right btn btn-flat btn-primary">Simpan</button>
						
						<a href="<?= site_url()?>guru" class="pull-right btn btn-flat btn-danger" id="cancel">Batal</a>
					</div>

				</form>
			</div>
		</div>		

	</div>


</section>

<script>
	const URL_TAMBAH_ABSENSI = `<?= site_url()?>guru/absensi/create`;

	$(document).ready(() => {
		$('.select2').select2();

		$('#cancel').click(function(event) {
			// console.log('Batal Clicked');
			$('#formPost')[0].reset();
		});

		$('#formAbsensi').submit(function(e){
			e.preventDefault();

			$('#btnSave').text('Menyimpan...'); 
			$('#btnSave').attr('disabled',true);

			var formData = new FormData($('#formAbsensi')[0]);
			$.ajax({
				url : `${URL_TAMBAH_ABSENSI}`,
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
								location.reload();
							}
						})
						.then(() => {
							setTimeout(() => {
								location.reload();
							}, 1000);
						});
					}
					$('#btnSave').text('Simpan');
					$('#btnSave').attr('disabled',false);

				},
				error: function (err){
					swal("Gagal", "Data Gagal Disimpan", "error");
					$('#btnSave').text('Save');
					$('#btnSave').attr('disabled',false);
				}
			});

		});
	});

</script>