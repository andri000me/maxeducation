<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Admin Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Program</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-md-3">

        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="img-thumbnail img-responsive " style="width: 100%;"  src="<?= base_url('uploads/images/avatars/'.$user->avatar) ?>" id='img-upload'>

            <h3 class="profile-username text-center"><?= $user->nama_lengkap_admin ?></h3>

            <p class="text-muted text-center"><?= $user_role->role ?></p>
          </div>

        </div>

      </div>

      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Perbarui Informasi</a></li>
            <li ><a href="#settingspassword" data-toggle="tab">Perbarui Password</a></li>
          </ul>
          <div class="tab-content">

            <div class="active tab-pane" id="settings">
              <form class="form-horizontal" method="POST" id="formUpdateInformasi" action="javascript:void(0)">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Nama Lengkap</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="nama_lengkap_admin" value="<?= isset($user) ? $user->nama_lengkap_admin : '' ?>">
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Jenis Kelamin</label>

                  <div class="col-sm-10">
                    <select class="form-control"  name="jenis_kelamin_id">
                      <option value="">--Pilih Jenis Kelamin--</option>
                      <?php foreach ($jenis_kelamin as $jenis_kelamin): ?>
                        <option <?= $user->jenis_kelamin_id == $jenis_kelamin->id_jenis_kelamin ? 'selected' : '' ?> value="<?= $jenis_kelamin->id_jenis_kelamin ?>"><?= $jenis_kelamin->jenis_kelamin ?></option>
                      <?php endforeach ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Foto</label>

                  <div class="col-sm-10">
                    <input type="file" id="imgInp" name="avatar" class="btn btn-default btn-file">
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" onclick="saveInformasiUserEdit()" id="btnSaveInformasi" class="btn btn-flat btn-primary">Simpan</button>
                    <a href="<?= site_url()?>admin/dashboard" class="btn btn-flat btn-danger btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>

            <div class="tab-pane" id="settingspassword">
              <form class="form-horizontal" method="POST" action="javascript:void(0)" id="formUpdatePassword">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Password Baru</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password Baru">
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Konfirmasi Password Baru</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password Baru">
                    <span class="help-block"></span>
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

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button  class="btn btn-flat btn-primary" onclick="savePasswordUserEdit()" id="btnSave"> Simpan </button>
                    <a href="<?= site_url()?>admin/dashboard" class="btn btn-flat btn-danger btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>


  </section>
  
</div>


<script>
  const URL_UPDATE_PASSWORD = `<?= site_url('admin/profile/password/update/')?>`;
  const URL_UPDATE_INFORMASI = `<?= site_url('admin/profile/informasi/update/')?>`;

  $(document).ready(function() {

   $("select").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
  });

   $("input").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
  });

   function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img-upload').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });

  $('.btn-file :file').on('fileselect', function(event, label) {

    var input = $(this).parents('.input-group').find(':text'),
    log = label;

    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }

  });

  $("#imgInp").change(function(){
    readURL(this);
  });

});


  function savePasswordUserEdit(){
    $('#btnSave').text('Menyimpan...'); 
    $('#btnSave').attr('disabled',true);

    let id_user = `<?= $this->session->userdata('user_id') ?>`;

    var formData = new FormData($('#formUpdatePassword')[0]);
    $.ajax({
      url : `${URL_UPDATE_PASSWORD}${id_user}`,
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
          }).then(() => {
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
        // console.log(err);
        swal("Gagal", "Data Gagal Diubah", "error");
        $('#btnSave').text('Save');
        $('#btnSave').attr('disabled',false);
      }
    });
  }

  function saveInformasiUserEdit() {
    $('#btnSaveInformasi').text('Menyimpan...');
    $('#btnSaveInformasi').attr('disabled',true);

    let id_user = `<?= $this->session->userdata('admin_id') ?>`;

    var formData = new FormData($('#formUpdateInformasi')[0]);
    $.ajax({
      url : `${URL_UPDATE_INFORMASI}${id_user}`,
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
          }).then(() => {
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
        $('#btnSaveInformasi').text('Simpan');
        $('#btnSaveInformasi').attr('disabled',false);

      },
      error: function (err){
        // console.log(err);
        swal("Gagal", "Data Gagal Diubah", "error");
        $('#btnSaveInformasi').text('Save');
        $('#btnSaveInformasi').attr('disabled',false);
      }
    });
  }


</script>
