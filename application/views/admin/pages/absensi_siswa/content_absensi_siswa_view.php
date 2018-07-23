<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Absensi Siswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Absensi Siswa</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 17%">Foto</th>
                    <th style="width: 25%">Nama Siswa</th>
                    <th style="width: 18%">Jenis Kelamin</th>
                    <th style="width: 15%">Agama</th>
                    <th >Program</th>
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
                      </td>
                      <td><?= $siswa->nama_lengkap_siswa ?></td>
                      <td><?= $siswa->jenis_kelamin ?></td>
                      <td><?= $siswa->agama ?></td>
                      <td><?= $siswa->program ?></td>
                      <td>
                        <a href="<?= site_url('admin/absensisiswa/lihat/'.$siswa->id_siswa) ?>" class="btn btn-flat btn-primary" data-toggle="tooltip" data-placement="bottom" title="Lihat"><i class="fa fa-eye"></i></a>
                      </td>
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

  $(document).ready(function() {
    $('table').DataTable();

  });

</script>
