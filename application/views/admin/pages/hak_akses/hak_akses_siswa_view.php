<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Hak Akses Siswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Hak Akses Siswa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header ">
            <!-- <span class="pull-right"><a href="<?= site_url()?>admin/slideshow/add" class="btn btn bg-red "><i class="fa fa-plus" aria-hidden="true"></i> Tambah User</a></span> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 table-responsive">
              <table id="table_user" class="table table-striped table-hover dataTable">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Username</th>
                    <th>Program</th>
                    <th>Role</th>
                    <th style="width: 10%" class="actions">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($user_siswa as $siswa): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $siswa->nama_lengkap_siswa ?></td>
                    <td><?= $siswa->jenis_kelamin ?></td>
                    <td><span class="label label-success"><i class="fa fa-unlock-alt">  <?= $siswa->username ?></i></span>
                    </td>
                    <td><?= $siswa->program ?></td>
                    <td>
                      <?php if ($siswa->id_role == 3): ?>
                        <span class="label label-success"><i class="fa fa-check-circle"> Siswa</i></span>
                      <?php endif ?>
                    </td>
                    <td>
                      <?php if ($siswa->password == ''): ?>
                        <a role="button" onclick="addUser('<?= $siswa->id_siswa ?>', '<?= $siswa->program ?>', '<?= $siswa->nama_lengkap_siswa ?>')" class="btn btn-success btn-flat btn-sm" 
                          data-toggle="tooltip" data-placement="bottom" title="Register"><i class="fa fa-plus"></i>
                        </a>
                        <?php else: ?>
                          <a role="button" onclick="deleteUser('<?= $siswa->id_user ?>')" class="btn btn-danger btn-flat btn-sm" 
                            data-toggle="tooltip" data-placement="bottom" title="Hapus Hak Akses"><i class="fa fa-trash"></i>
                          </a>
                          <a role="button" onclick="editUser('<?= $siswa->id_user ?>', '<?= $siswa->nama_lengkap_siswa ?>', '<?= $siswa->username ?>', '<?= $siswa->program ?>')" class="btn btn-success btn-flat btn-sm" 
                            data-toggle="tooltip" data-placement="bottom" title="Edit Hak Akses"><i class="fa fa-pencil"></i>
                          </a>
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach ?>

                </tbody>

              </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

  <div class="modal fade" id="modal-form" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" id="formTambahHakAsesSiswa" action="javascript:void(0)" method="POST">
          <input type="hidden" name="role_id" value="3" id="id_role">
          <input type="hidden" name="siswa_id" id="id_siswa">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
            <h3 class="modal-title"></h3>
          </div>

          <div class="modal-body">
           <div class="form-group">
            <label for="nama_lengkap" class="col-md-3 control-label">Nama Siswa</label>
            <div class="col-md-6">
              <div class="form-line">
                <input type="text" id="nama_lengkap" class="form-control" readonly="" >
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="program" class="col-md-3 control-label">Program</label>
            <div class="col-md-6">
              <div class="form-line">
                <input type="text" id="program" class="form-control" readonly="" >
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="program" class="col-md-3 control-label">Username</label>
            <div class="col-md-6">
              <div class="form-line">
                <input type="text" id="username" name="username" class="form-control" autofocus="" >
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="program" class="col-md-3 control-label">Password</label>
            <div class="col-md-6">
              <div class="form-line">
                <input type="password" id="password" name="password" class="form-control">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="program" class="col-md-3 control-label">Konfirmasi Password</label>
            <div class="col-md-6">
              <div class="form-line">
                <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6">
              <div class="form-line">
                <input type="hidden" id="username_sudah_ada" name="username_sudah_ada" class="form-control">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6">
              <div class="form-line">
                <input type="hidden" id="password_tidak_sama" name="password_tidak_sama" class="form-control">
                <span class="help-block"></span>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button  class="btn btn-flat btn-primary btn-save" onclick="save()" id="btnSave"> Simpan </button>
          <button type="button" class="btn btn-flat btn-warning" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for Edit User Guru -->
<div class="modal fade" id="modal-form_Edit" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="form-horizontal" id="formEditHakAsesSiswa" action="javascript:void(0)" method="POST">
        <input type="hidden" name="id_user" id="id_user">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
          <h3 class="modal-title"></h3>
        </div>

        <div class="modal-body">
         <div class="form-group">
          <label for="nama_lengkap" class="col-md-3 control-label">Nama Guru</label>
          <div class="col-md-6">
            <div class="form-line">
              <input type="text" id="nama_lengkap_edit" class="form-control" readonly="" >
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="program" class="col-md-3 control-label">Program</label>
          <div class="col-md-6">
            <div class="form-line">
              <input type="text" id="program_edit" class="form-control" readonly="" >
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="program" class="col-md-3 control-label">Username</label>
          <div class="col-md-6">
            <div class="form-line">
              <input type="text" id="username_edit" class="form-control" readonly="" >
              <!-- <span class="help-block"></span> -->
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="program" class="col-md-3 control-label">Password Baru</label>
          <div class="col-md-6">
            <div class="form-line">
              <input type="password" id="password_baru" name="password" class="form-control" autofocus="">
              <span class="help-block"></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="program" class="col-md-3 control-label">Konfirmasi Password Baru</label>
          <div class="col-md-6">
            <div class="form-line">
              <input type="password" id="konfirmasi_password_baru" name="konfirmasi_password_baru" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-md-6">
            <div class="form-line">
              <input type="hidden" id="password_lama_tidak_sesuai" name="password_lama_tidak_sesuai" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6">
            <div class="form-line">
              <input type="hidden" id="password_lama_tidak_sama" name="password_lama_tidak_sama" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button  class="btn btn-flat btn-primary btn-save" onclick="saveUserEdit()" id="btnSaveEditUser"> Simpan </button>
        <button type="button" class="btn btn-flat btn-warning" data-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- /.content -->
</div>

<script>

  const URL_DELETE_USER_SISWA = `<?= site_url()?>admin/hakaksessiswa/delete/`;
  const URL_SAVE_USER_SISWA = `<?= site_url()?>admin/hakakses/siswa/create`;
  const URL_EDIT_USER_SISWA = `<?= site_url()?>admin/hakakses/guru/edit/`;

  $(document).ready(function() {

    $("input").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

    $('#table_user').DataTable();

  });

  function deleteUser(id_user){
    // console.log(id_user);

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
          type: "POST",
          url: `${URL_DELETE_USER_SISWA}${id_user}`,
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

  function addUser(id_siswa, program, nama_lengkap, id_role)
  {
    // console.log(id_siswa, program, nama_lengkap);
    $('.form-group').removeClass('has-error');
    
    $('#formTambahHakAsesSiswa')[0].reset();
    $('.help-block').empty();

    $('#modal-form').modal('show');
    $('.modal-title').text('Register Hak Akses Siswa');

    $('#nama_lengkap').val(nama_lengkap);
    $('#program').val(program);
    $('#id_siswa').val(id_siswa);


  }

  function save(){
    $('#btnSave').text('Menyimpan'); 
    $('#btnSave').attr('disabled',true);

    var formData = new FormData($('#formTambahHakAsesSiswa')[0]);
    $.ajax({
      url : `${URL_SAVE_USER_SISWA}`,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data){
        // console.log(data);
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
        else{
          for (var i = 0; i < data.inputerror.length; i++){
            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
          }
        }
        $('#btnSave').text('Simpan');
        $('#btnSave').attr('disabled',false);

      },
      error: function (err){
        alert('Error adding data');
        $('#btnSave').text('Simpan');
        $('#btnSave').attr('disabled',false);
      }
    });
  }

  function editUser(id_user, nama_siswa, username, program) {
    // console.log(id_user, nama_siswa, username, program);

    $('.form-group').removeClass('has-error');
    
    $('#formEditHakAsesSiswa')[0].reset();
    $('.help-block').empty();

    $('#modal-form_Edit').modal('show');
    $('.modal-title').text('Edit Hak Akses Siswa');

    $('#id_user').val(id_user);
    $('#nama_lengkap_edit').val(nama_siswa);
    $('#program_edit').val(program);
    $('#username_edit').val(username);
  }

  function saveUserEdit() {
    $('#btnSaveEditUser').text('Menyimpan...'); 
    $('#btnSaveEditUser').attr('disabled',true);

    let id_user = $('#id_user').val();

    var formDataEditUser = new FormData($('#formEditHakAsesSiswa')[0]);
    $.ajax({
      url : `${URL_EDIT_USER_SISWA}${id_user}`,
      type: "POST",
      data: formDataEditUser,
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
            $('#modal-form_Edit').modal('hide');
          })
          .then(() => {
            setTimeout(() => {
              location.reload();
            }, 1000);
          });
        }
        else{
          for (var i = 0; i < data.inputerror.length; i++){
            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
          }
        }
        $('#btnSaveEditUser').text('Simpan');
        $('#btnSaveEditUser').attr('disabled',false);

      },
      error: function (err){
        swal("Gagal", "Data Gagal Diubah", "error");
        $('#btnSaveEditUser').text('Simpan');
        $('#btnSaveEditUser').attr('disabled',false);
      }
    });
  }

</script>
