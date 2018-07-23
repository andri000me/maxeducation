<style>
#siswa_mata_pelajaaran, #siswa_hari, #siswa_jam {
  margin-bottom: 5px;
}
</style>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data Jadwal Siswa
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li><a href="<?= site_url() ?>admin/jadwal"> Data Jadwal Siswa</a></li>
      <li><a href="<?= site_url() ?>admin/jadwal/siswa"> Data Siswa</a></li>
      <li class="active">Tambah Data Jadwal Siswa</li>
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
            <form method="POST">

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
                      <label for="Nama Lengkap">Nama Lengkap Siswa</label>
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
                      <label >Program</label>
                      <input type="text" name="id_agama" value="<?= isset($siswa) ? $siswa->program : '' ?>" class="form-control" placeholder="Agama" readonly>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label >Mata Pelajaran</label>
                          <?php foreach ($siswa_mata_pelajaarans as $siswa_mata_pelajaaran): ?>
                            <input type="text" id="siswa_mata_pelajaaran" value="<?= isset($siswa_mata_pelajaaran) ? $siswa_mata_pelajaaran->mata_pelajaran : '' ?>" class="form-control" readonly>
                          <?php endforeach ?>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label >Hari</label>
                          <?php foreach ($siswa_haris as $hari): ?>
                            <input type="text" id="siswa_hari" value="<?= isset($hari) ? $hari->hari : '' ?>" class="form-control" readonly>
                          <?php endforeach ?>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label >Jam</label>
                          <?php foreach ($siswa_jams as $jam): ?>
                            <input type="text" id="siswa_jam" value="<?= isset($jam) ? $jam->jam : '' ?>" class="form-control" readonly>
                          <?php endforeach ?>
                        </div>
                      </div>
                    </div>



                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 table-responsive">
                    <div class="box-header">
                      <a href="javascript:void(0);" onclick="tambahJadwal()" class="btn btn-flat btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data Jadwal Siswa</a>

                      <a href="<?= site_url()?>admin/jadwal/siswa" class="btn btn-flat btn-danger ">CANCEL</a>
                    </div>

                    <br>

                    <table id="table_jadwal_siswa" class="table table-striped table-hover dataTable">
                      <thead>
                        <tr>
                          <th style="width: 5%">No</th>
                          <th style="width: 20%">Program</th>
                          <th style="width: 25%">Mata Pelajaran</th>
                          <th>Nama Guru</th>
                          <th>Hari</th>
                          <th>Jam</th>
                          <th style="width: 10%" class="actions">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($jadwal_siswas as $jadwal_siswa): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $jadwal_siswa->program ?></td>
                          <td><?= $jadwal_siswa->mata_pelajaran ?></td>
                          <td><?= $jadwal_siswa->nama_lengkap_guru ?></td>
                          <td><?= $jadwal_siswa->hari?></td>
                          <td><?= $jadwal_siswa->jam?></td>
                          <td>
                            <a role="button" onclick="editJadwal('<?= $jadwal_siswa->id_siswa_jadwal ?>')" class="btn btn-success btn-flat" 
                              data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="deleteJadwal(<?= $jadwal_siswa->id_siswa_jadwal ?>)" class="btn btn-flat btn-danger " data-toggle="tooltip" data-placement="bottom" title="Delete">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>

                          </td>
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

  <!-- Modal for Mapel -->
  <div class="modal fade" id="modal-form" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" id="formTambahJadwalSiswa" action="javascript:void(0)" method="POST">

         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
          <h3 class="modal-title"></h3>
        </div>

        <input type="hidden" name="siswa_id" id="siswa_id" value="<?= $this->uri->segment(5)?>">
        <input type="hidden" name="program_id" id="program_id" value="<?= $siswa->id_program ?>">
        <input type="hidden" id="id_siswa_jadwal">

        <div class="modal-body">

          <div class="form-group">
            <label class="col-md-3 control-label">Nama Guru</label>
            <div class="col-md-6">
              <div class="form-line">
                <select class="form-control" name="guru_id" id="guru_id" style="width: 100%;" required>
                  <option value=''>--pilih--</option>
                  <?php foreach($gurus as $guru): ?>
                    <option value="<?= $guru->id_guru ?>"><?= $guru->nama_lengkap_guru ?></option>
                  <?php endforeach ?>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Program</label>
            <div class="col-md-6">
              <div class="form-line">
                <input type="text" value="<?= isset($siswa) ? $siswa->program : '' ?>" class="form-control" readonly>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Mata Pelajaran</label>
            <div class="col-md-6">
              <div class="form-line">
                <select class="form-control" name="mata_pelajaran_id" id="mata_pelajaran_id" style="width: 100%;" required="">
                  <option value=''>--pilih--</option>
                  <?php foreach($mata_pelajarans as $mata_pelajaran): ?>
                    <option value="<?= $mata_pelajaran->id_mata_pelajaran ?>"><?= $mata_pelajaran->mata_pelajaran ?></option>
                  <?php endforeach ?>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Hari</label>
            <div class="col-md-6">
              <div class="form-line">
                <select class="form-control" name="hari_id" id="hari_id" style="width: 100%;" required="">
                  <option value=''>--pilih--</option>
                  <?php foreach($haris as $row): ?>
                    <option value="<?= $row->id_hari ?>"><?= $row->hari ?></option>
                  <?php endforeach ?>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Jam</label>
            <div class="col-md-6">
              <div class="form-line">
                <select class="form-control" name="jam_id" id="jam_id" style="width: 100%;" required="">
                  <option value=''>--pilih--</option>
                  <?php foreach($jams as $jam): ?>
                    <option value="<?= $jam->id_jam ?>"><?= $jam->jam ?></option>
                  <?php endforeach ?>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-flat btn-primary btn-save">Simpan </button>
          <button type="button" class="btn btn-flat btn-warning" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  const URL_GET_JADWAL_SISWA = `<?= site_url('admin/jadwal/get/') ?>`;

  const URL_TAMBAH_JADWAL_SISWA =  `<?= site_url('admin/jadwal/create') ?>`;
  const URL_EDIT_JADWAL_SISWA =  `<?= site_url('admin/jadwal/update/') ?>`;
  const URL_DELETE_SISWA_JADWAL = `<?= site_url('admin/jadwal/delete/') ?>`;

  $(document).ready(function() {
    $('#guru_id').select2({
      selectOnClose: true
    });

    $('#mata_pelajaran_id').select2({
      selectOnClose: true
    });
    $('#hari_id').select2({
      selectOnClose: true
    });
    $('#jam_id').select2({
      selectOnClose: true
    });

    $('#table_jadwal_siswa').DataTable();

    $('#formTambahJadwalSiswa').submit(function(e) {
      e.preventDefault();

      $('#btnSave').text('Menyimpan...'); 
      $('#btnSave').attr('disabled',true);

      let id_siswa_jadwal = $('#id_siswa_jadwal').val();

      if(save_method == 'add') {
        url_method = `${URL_TAMBAH_JADWAL_SISWA}`;
      } else {
        url_method = `${URL_EDIT_JADWAL_SISWA}${id_siswa_jadwal}`;
      }

      var formData = new FormData($('#formTambahJadwalSiswa')[0]);
      $.ajax({
        url : url_method,
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
              $('#modal-form').modal('hide');
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
          swal("Gagal", "Data Gagal Ditambahkan", "error");
          $('#btnSave').text('Save');
          $('#btnSave').attr('disabled',false);
        }
      });
    });

  });

  function tambahJadwal() {
    save_method = 'add';

    $('#modal-form form')[0].reset();
    $("#guru_id").val('').trigger('change');
    $("#mata_pelajaran_id").val('').trigger('change');
    $("#hari_id").val('').trigger('change');
    $("#jam_id").val('').trigger('change');

    $('#modal-form').modal('show');

    $('.modal-title').text('Tambah Data Jadwal Siswa');

    $('.form-group').removeClass('has-error');
    $('.help-block').empty();


  }

  function editJadwal(id_siswa_jadwal) {
    // console.log(id_siswa_jadwal);
    save_method = 'update';

    $('#id_siswa_jadwal').val(id_siswa_jadwal);

    $('#modal-form form')[0].reset();

    $('#modal-form form')[0].reset();
    $("#guru_id").val('').trigger('change');
    $("#mata_pelajaran_id").val('').trigger('change');
    $("#hari_id").val('').trigger('change');
    $("#jam_id").val('').trigger('change');

    $('#modal-form').modal('show');
    $('.modal-title').text('Edit Data Jadwal Siswa');

    $.ajax({
      url : `${URL_GET_JADWAL_SISWA}${id_siswa_jadwal}`,
      type : "GET",
      dataType : "JSON",
      success : function(response){
        // console.log(response);

        $('#guru_id').val(response.guru_id).trigger('change');
        $('#mata_pelajaran_id').val(response.mata_pelajaran_id).trigger('change');
        $('#hari_id').val(response.hari_id).trigger('change');
        $('#jam_id').val(response.jam_id).trigger('change');

      },
      error : function(err){
        swal("Gagal", "Data Gagal Ditampilkan", "error");
        // console.log(err);
      }
    });
  }


  function deleteJadwal(id_jadwal_siswa){
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
          url : `${URL_DELETE_SISWA_JADWAL}${id_jadwal_siswa}`,
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


</script>
