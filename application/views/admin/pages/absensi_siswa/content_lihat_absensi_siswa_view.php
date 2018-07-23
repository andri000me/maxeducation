<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Absensi - <?= $siswa->nama_lengkap_siswa ?>
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li>
        <a href="<?= site_url()?>admin/absensisiswa">Data Absensi Siswa</a>
      </li>
      <li class="active">Data Absensi - <?= $siswa->nama_lengkap_siswa ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form method="POST" id="formTambahGuru" action="<?= site_url('admin/guru/create')?>" enctype="multipart/form-data" accept-charset="utf-8">

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="box-profile">
                      <?php if (empty($siswa->avatar)): ?>
                        <img class="img-responsive img-thumbnail" id='img-upload' style="width: 100%" src="<?= base_url('uploads/images/avatars/avatar.jpg') ?>">
                        <?php else: ?>
                          <img class="img-responsive img-thumbnail" id='img-upload' style="width: 100%" src="<?= base_url('uploads/images/avatars/'.$siswa->avatar) ?>">
                        <?php endif ?>
                      </div>

                      <br>
                    </div>
                  </div>

                  <div class="col-md-9">
                    <div class="form-group">
                      <label for="Nama Lengkap">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap_siswa" value="<?= isset($siswa) ? $siswa->nama_lengkap_siswa : '' ?>" class="form-control" placeholder="Nama Lengkap" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Jenis Kelamin">Jenis Kelamin</label>
                      <input type="text" name="id_jenis_kelamin" value="<?= isset($siswa) ? $siswa->jenis_kelamin : '' ?>" class="form-control" placeholder="Jenis Kelamin" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Agama">Agama</label>
                      <input type="text" name="id_agama" value="<?= isset($siswa) ? $siswa->agama : '' ?>" class="form-control" placeholder="Agama" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Agama">Program</label>
                      <input type="text" name="id_agama" value="<?= isset($siswa) ? $siswa->program : '' ?>" class="form-control" placeholder="Agama" readonly>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 table-responsive">
                    <div class="box-header">
                      <!-- <a href="javascript:void(0);" role="button" onclick="tambahDataMengajar()" class="btn btn-flat btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data Mengajar siswa</a> -->
                      <a href="<?= site_url()?>admin/absensisiswa" class="btn btn-flat btn-danger ">CANCEL</a>
                    </div>

                    <br>

                    <table class="table table-striped table-hover dataTable">
                      <thead>
                        <tr>
                          <th style="width: 5%">No</th>
                          <th style="width: 20%">Nama Guru</th>
                          <th style="width: 20%">Mata Pelajaran</th>
                          <th style="width: 15%">Hari</th>
                          <th style="width: 15%">Jam</th>
                          <th style="width: 30%">Laporan</th>
                          <!-- <th style="width: 10%" class="actions">Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($absensis as $absensi): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $absensi->nama_lengkap_guru ?></td>
                          <td><?= $absensi->mata_pelajaran ?></td>
                          <td><?= $absensi->hari ?></td>
                          <td><?= $absensi->jam ?></td>
                          <td><?= $absensi->laporan ?></td>
                        </tr>
                      <?php endforeach ?>

                    </tbody>

                  </table>
                </div>
              </div>

              <div class="box-footer">
                <!-- <button type="submit" id="btnSubmitTambahGuru" class="btn btn-primary pull-right">SUBMIT</button> -->
              </div>


            </form>
          </div>
        </div>

      </div>
    </div>



  </section>




  <script>
    const URL_FORM_TAMBAH_MENGAJAR_GURU = `<?= site_url('admin/guru/mata_pelajaran/create')?>`;
    const URL_DELETE_MENGAJAR_GURU = `<?= site_url('admin/guru/mata_pelajaran/delete/')?>`;

    $(document).ready(function() {

      $('table').DataTable();

      $('#formTambahMataPelajaranGuru').submit(() => {

        var formData = new FormData($('#formTambahMataPelajaranGuru')[0]);
        $.ajax({
          url : `${URL_FORM_TAMBAH_MENGAJAR_GURU}`,
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data){
            console.log(data);
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
                $('#modal-form').modal('hide');
              })
              .then(() => {
                setTimeout(() => {
                  location.reload();
                }, 2000);
              });

            }

            $('#btnSave').text('SUBMIT');
            $('#btnSave').attr('disabled',false);
          },
          error: function (err){
          // console.log(err);
          swal("Error", "Error Adding Data", "error");
          $('#btnSave').text('SUBMIT');
          $('#btnSave').attr('disabled',false);

        }
      });
      });

      $('select[name="id_program"]').on('change', function() {
        let program = $(this).val();
        if(program) {
          $.ajax({
            url: `<?= site_url('pages/get_mata_pelajaran_by_program') ?>/${program}`,
            type: "GET",
            dataType: "JSON",
            success:function(data) {
            // console.log(data);
            $('select[name="id_mata_pelajaran"]').empty();
            $.each(data, function(key, value) {
              // console.log(value);
              $('select[name="id_mata_pelajaran"]').append(`<option value="${value.id_mata_pelajaran}">${value.mata_pelajaran}</option>`);
            });
          }
        });
        }else{
          $('select[name="id_mata_pelajaran"]').empty();
        }

      });

    });

    function deleteMengajarGuru(id_guru_mengajar){
    // console.log(id_guru_mengajar);
    
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
          url : `${URL_DELETE_MENGAJAR_GURU}${id_guru_mengajar}`,
          type: "POST",
          dataType: "JSON",
          success: function(data){
            console.log(data);
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
                $('#modal-form').modal('hide');
              })
              .then(() => {
                setTimeout(() => {
                  location.reload();
                }, 2000);
              });

            }
          },
          error: function (err){
            swal("Error", "Delete Data Gagal", "error");
          }
        });

      }
    });
  }

  function tambahDataMengajar() {
    $('#modal-form').modal('show');
    $('#modal-form form')[0].reset();

    $('.modal-title').text('Tambah Data Mengajar Guru');

    $('select[name="id_mata_pelajaran"]').empty();

  }

</script>
