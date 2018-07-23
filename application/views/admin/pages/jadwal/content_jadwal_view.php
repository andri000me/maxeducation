<style>
.no {
	width: 40px;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Jadwal Siswa
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Data Jadwal Siswa</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header ">
						<span class="pull-right"><a href="<?= site_url()?>admin/jadwal/siswa" class="btn btn-flat bg-red "><i class="fa fa-plus" aria-hidden="true"></i> Tambah Jadwal</a></span>
					</div>
					<div class="box-body">

						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#senin" data-toggle="tab"><i class="fa fa-calendar"></i> Senin</a></li>
								<li ><a href="#selasa" data-toggle="tab"><i class="fa fa-calendar"></i> Selasa</a></li>
								<li ><a href="#rabu" data-toggle="tab"><i class="fa fa-calendar"></i> Rabu</a></li>
								<li ><a href="#kamis" data-toggle="tab"><i class="fa fa-calendar"></i> Kamis</a></li>
								<li ><a href="#jumat" data-toggle="tab"><i class="fa fa-calendar"></i> Jumat</a></li>
								<li ><a href="#sabtu" data-toggle="tab"><i class="fa fa-calendar"></i> Sabtu</a></li>
								<li ><a href="#minggu" data-toggle="tab"><i class="fa fa-calendar"></i> Minggu</a></li>
							</ul>
							<div class="tab-content">

								<div class="active tab-pane" id="senin">
									<div class="row">
										<div class="col-md-12 table-responsive">
											<table class="table table-striped table-hover dataTable">
												<thead>
													<tr>
														<th >No</th>
														<th >Nama Siswa</th>
														<th >Program</th>
														<th >Mata Pelajaran</th>
														<th >Nama Guru</th>
														<th >Hari</th>
														<th >Jam</th>
													</tr>
												</thead>
												<tbody>
													<?php $no = 1; foreach ($jadwal_senins as $jadwal_senin): ?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $jadwal_senin->nama_lengkap_siswa ?></td>
														<td><?= $jadwal_senin->program ?></td>
														<td><?= $jadwal_senin->mata_pelajaran ?></td>
														<td><?= $jadwal_senin->nama_lengkap_guru ?></td>
														<td><?= $jadwal_senin->hari?></td>
														<td><?= $jadwal_senin->jam?></td>
													</tr>
												<?php endforeach ?>

											</tbody>

										</table>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="selasa">
								<div class="row">
									<div class="col-md-12">
										<table class="table table-striped table-hover dataTable">
											<thead>
												<tr>
													<th>No</th>
													<th >Nama Siswa</th>
													<th >Program</th>
													<th >Mata Pelajaran</th>
													<th >Nama Guru</th>
													<th >Hari</th>
													<th>Jam</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1; foreach ($jadwal_selasas as $jadwal_selasa): ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $jadwal_selasa->nama_lengkap_siswa ?></td>
													<td><?= $jadwal_selasa->program ?></td>
													<td><?= $jadwal_selasa->mata_pelajaran ?></td>
													<td><?= $jadwal_selasa->nama_lengkap_guru ?></td>
													<td><?= $jadwal_selasa->hari?></td>
													<td><?= $jadwal_selasa->jam?></td>
												</tr>
											<?php endforeach ?>

										</tbody>

									</table>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="rabu">
							<div class="row">
								<div class="col-md-12 table-responsive">
									<table id="table_jadwal_siswa" class="table table-striped table-hover dataTable">
										<thead>
											<tr>
												<th>No</th>
												<th >Nama Siswa</th>
												<th >Program</th>
												<th >Mata Pelajaran</th>
												<th >Nama Guru</th>
												<th >Hari</th>
												<th>Jam</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; foreach ($jadwal_rabus as $jadwal_rabu): ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $jadwal_rabu->nama_lengkap_siswa ?></td>
												<td><?= $jadwal_rabu->program ?></td>
												<td><?= $jadwal_rabu->mata_pelajaran ?></td>
												<td><?= $jadwal_rabu->nama_lengkap_guru ?></td>
												<td><?= $jadwal_rabu->hari?></td>
												<td><?= $jadwal_rabu->jam?></td>
											</tr>
										<?php endforeach ?>

									</tbody>

								</table>
							</div>
						</div>
					</div>

					<div class="tab-pane" id="kamis">
						<div class="row">
							<div class="col-md-12 table-responsive">
								<table id="table_jadwal_siswa" class="table table-striped table-hover dataTable">
									<thead>
										<tr>
											<th >No</th>
											<th >Nama Siswa</th>
											<th >Program</th>
											<th >Mata Pelajaran</th>
											<th >Nama Guru</th>
											<th >Hari</th>
											<th >Jam</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach ($jadwal_kamiss as $jadwal_kamis): ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $jadwal_kamis->nama_lengkap_siswa ?></td>
											<td><?= $jadwal_kamis->program ?></td>
											<td><?= $jadwal_kamis->mata_pelajaran ?></td>
											<td><?= $jadwal_kamis->nama_lengkap_guru ?></td>
											<td><?= $jadwal_kamis->hari?></td>
											<td><?= $jadwal_kamis->jam?></td>
										</tr>
									<?php endforeach ?>

								</tbody>

							</table>
						</div>
					</div>
				</div>

				<div class="tab-pane" id="jumat">
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table  class="table table-striped table-hover dataTable">
								<thead>
									<tr>
										<th>No</th>
										<th >Nama Siswa</th>
										<th >Program</th>
										<th >Mata Pelajaran</th>
										<th >Nama Guru</th>
										<th >Hari</th>
										<th >Jam</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($jadwal_jumats as $jadwal_jumat): ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $jadwal_jumat->nama_lengkap_siswa ?></td>
										<td><?= $jadwal_jumat->program ?></td>
										<td><?= $jadwal_jumat->mata_pelajaran ?></td>
										<td><?= $jadwal_jumat->nama_lengkap_guru ?></td>
										<td><?= $jadwal_jumat->hari?></td>
										<td><?= $jadwal_jumat->jam?></td>
									</tr>
								<?php endforeach ?>

							</tbody>

						</table>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="sabtu">
				<div class="row">
					<div class="col-md-12 table-responsive">
						<table class="table table-striped table-hover dataTable">
							<thead>
								<tr>
									<th>No</th>
									<th style="width: 20%">Nama Siswa</th>
									<th style="width: 17%">Program</th>
									<th style="width: 17%">Mata Pelajaran</th>
									<th >Nama Guru</th>
									<th >Hari</th>
									<th>Jam</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; foreach ($jadwal_sabtus as $jadwal_sabtu): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $jadwal_sabtu->nama_lengkap_siswa ?></td>
									<td><?= $jadwal_sabtu->program ?></td>
									<td><?= $jadwal_sabtu->mata_pelajaran ?></td>
									<td><?= $jadwal_sabtu->nama_lengkap_guru ?></td>
									<td><?= $jadwal_sabtu->hari?></td>
									<td><?= $jadwal_sabtu->jam?></td>
								</tr>
							<?php endforeach ?>

						</tbody>

					</table>
				</div>
			</div>
		</div>

		<div class="tab-pane" id="minggu">
			<div class="row">
				<div class="col-md-12 table-responsive">
					<table class="table table-striped table-hover dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th style="width: 20%">Nama Siswa</th>
								<th style="width: 17%">Program</th>
								<th style="width: 17%">Mata Pelajaran</th>
								<th style="width: 20%">Nama Guru</th>
								<th style="width: 25%">Hari</th>
								<th>Jam</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($jadwal_minggus as $jadwal_minggu): ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $jadwal_minggu->nama_lengkap_siswa ?></td>
								<td><?= $jadwal_minggu->program ?></td>
								<td><?= $jadwal_minggu->mata_pelajaran ?></td>
								<td><?= $jadwal_minggu->nama_lengkap_guru ?></td>
								<td><?= $jadwal_minggu->hari?></td>
								<td><?= $jadwal_minggu->jam?></td>
							</tr>
						<?php endforeach ?>

					</tbody>

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
</section>
</div>


<script>
	$(document).ready(function() {
		$('table').dataTable();

	});
</script>
