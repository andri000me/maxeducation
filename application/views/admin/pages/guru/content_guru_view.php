<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Guru
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Guru</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="<?= site_url()?>admin/guru/add" role="button" class="btn btn-flat btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data Guru</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 table-responsive">
              <table id="table_guru" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 25%">Foto</th>
                    <th style="width: 25%">Nama Guru</th>
                    <th style="width: 18%">Jenis Kelamin</th>
                    <th style="width: 15%">Agama</th>
                    <th class="actions">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($gurus as $guru): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <?php if (empty($guru->avatar)): ?>
                        <img class="img-responsive img-thumbnail" id='img-upload' style="width: 100%" src="<?= base_url('uploads/images/avatars/avatar.jpg') ?>">
                        <?php else: ?>
                          <img class="img-responsive img-thumbnail" id='img-upload' style="width: 100%" src="<?= base_url('uploads/images/avatars/'.$guru->avatar) ?>">
                        <?php endif ?>
                        <td>
                          <a href="<?= site_url('admin/guru/mata_pelajaran/'.$guru->id_guru) ?>"><span class="label label-danger"><?= $guru->nama_lengkap_guru ?> </span>
                          </a>
                        </td>
                        <td><?= $guru->jenis_kelamin ?></td>
                        <td><?= $guru->agama ?></td>
                        <td>
                          <a href="<?= site_url('admin/guru/edit/'.$guru->id_guru) ?>" class="btn btn-flat btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
                          <a href="javascript:void(0);" onclick="deleteGuru(<?= $guru->id_guru ?>)" class="btn btn-flat btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
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
    const URL_PROGRAM = `<?= site_url('admin/program/')?>`;
    const URL_DELETE_GURU = `<?= site_url('admin/guru/delete/')?>`;

    $(document).ready(function() {
      $('table').DataTable();

    });

    function deleteGuru(id_guru){
      swal({
        title: "Yakin Ingin Menghapus ?",
        text: "Data Yang Anda Pilih Akan Dihapus Dari Database",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url : `${URL_DELETE_GURU}${id_guru}`,
            type: "POST",
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
                })
                .then(() => {
                  setTimeout(() => {
                    location.reload();
                  }, 1000);
                });

              }
            },
            error: function (err){
              // console.log(err);
              swal("Error", "Delete Data Gagal", "error");
            }
          });

        }
      });

    }
  </script>
