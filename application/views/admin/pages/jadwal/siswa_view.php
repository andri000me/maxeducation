<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Siswa
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li><a href="<?= site_url() ?>admin/jadwal"> Data Jadwal Siswa</a></li>
      <li class="active">Data Siswa</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <!-- <a href="<?= site_url()?>admin/guru/add" role="button" class="btn btn-flat btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data Guru</a> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 table-responsive">
              <table id="table_siswa" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 15%">Foto</th>
                    <th style="width: 25%">Nama Siswa</th>
                    <th style="width: 15%">Jenis Kelamin</th>
                    <th style="width: 15%">Agama</th>
                    <th style="width: 18%">Program</th>
                    <th class="actions">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($siswas as $siswa): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <?php if (empty($siswa->avatar)): ?>
                        <img class="img-responsive img-thumbnail" id='img-upload' style="width: 100%" src="<?= base_url('uploads/images/avatars/avatar.jpg') ?>">
                      <?php else: ?>
                        <img class="img-responsive img-thumbnail" id='img-upload' style="width: 100%" src="<?= base_url('uploads/images/avatars/'.$siswa->avatar) ?>">
                      <?php endif ?>
                      <td><?= $siswa->nama_lengkap_siswa ?></td>
                      <td><?= $siswa->jenis_kelamin ?></td>
                      <td><?= $siswa->agama ?></td>
                      <td><?= $siswa->program ?></td>
                      <td><a href="<?= site_url('admin/jadwal/siswa/tambah/'.$siswa->id_siswa) ?>" class="btn btn-flat btn-primary" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fa fa-plus"></i></a></td>
                    </tr>
                  <?php endforeach ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<script>
  const URL_PROGRAM = `<?= site_url('admin/program/')?>`;
  const URL_DELETE_GURU = `<?= site_url('admin/guru/delete/')?>`;

  $(document).ready(function() {
    $('#table_siswa').DataTable();

  });

</script>
