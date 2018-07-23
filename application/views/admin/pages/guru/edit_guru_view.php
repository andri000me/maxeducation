<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Data Guru
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li>
        <a href="<?= site_url()?>admin/dataguru">Data Guru</a>
      </li>
      <li class="active">Edit Data Guru</li>
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
            <!--             <form method="POST" id="formTambahGuru" action="<?= site_url('admin/guru/update/'.$this->uri->segment(4))?>" enctype="multipart/form-data" accept-charset="utf-8"> -->

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="box-profile">
                      <?php if (empty($guru->avatar)): ?>
                        <img class="img-responsive img-thumbnail" id='img-upload' style="width: 100%" src="<?= base_url('uploads/images/avatars/avatar.jpg') ?>">
                      <?php else: ?>
                        <img class="img-responsive img-thumbnail" id='img-upload' style="width: 100%" src="<?= base_url('uploads/images/avatars/'.$guru->avatar) ?>">
                      <?php endif ?>
                      
                    </div>

                    <br>

                  </div>
                </div>

                <div class="col-md-9">
                  <form method="POST" id="formEditGuru" action="javascript:void(0)">

                    <div class="form-group">
                      <label for="nama_lengkap" class="col-md-3 control-label">Nama Lengkap *</label>
                      <div class="col-md-9">
                        <div class="form-line">
                          <input type="text" name="nama_lengkap_guru" class="form-control" placeholder="Nama Lengkap" value="<?= isset($guru) ? $guru->nama_lengkap_guru : '' ?>">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nama_lengkap" class="col-md-3 control-label">Jenis Kelamin *</label>
                      <div class="col-md-9">
                        <div class="form-line">
                          <select class="form-control" name="id_jenis_kelamin">
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <?php foreach ($jenis_kelamin as $jenis_kelamin): ?>
                              <option <?= $guru->id_jenis_kelamin == $jenis_kelamin->id_jenis_kelamin ? 'selected' : '' ?> value="<?= $jenis_kelamin->id_jenis_kelamin ?>"><?= $jenis_kelamin->jenis_kelamin ?></option>
                            <?php endforeach ?>
                          </select>
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nama_lengkap" class="col-md-3 control-label">Tempat Lahir *</label>
                      <div class="col-md-9">
                        <div class="form-line">
                          <input type="text" value="<?= isset($guru) ? $guru->tempat_lahir : '' ?>" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nama_lengkap" class="col-md-3 control-label">Tanggal Lahir *</label>
                      <div class="col-md-9">
                        <div class="form-line">
                          <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nama_lengkap" class="col-md-3 control-label">Agama *</label>
                      <div class="col-md-9">
                        <div class="form-line">
                          <select class="form-control"  name="id_agama">
                            <option value="">--Pilih Agama--</option>
                            <?php foreach ($agama as $agama): ?>
                              <option <?= $guru->id_agama == $agama->id_agama ? 'selected' : '' ?> value="<?= $agama->id_agama ?>"><?= $agama->agama ?></option>
                            <?php endforeach ?>
                          </select>
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nama_lengkap" class="col-md-3 control-label">Foto</label>
                      <div class="col-md-9">
                        <div class="form-line">
                          <input type="file" id="imgInp" name="avatar" class="btn btn-default btn-file">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="box-footer">
                  <button type="button" id="btnSave" onclick="update()" class="btn btn-flat btn-primary pull-right">SUBMIT</button> 
                  <a href="<?= site_url()?>admin/dataguru"  class="btn btn-flat btn-danger " role="button" >CANCEL</a>
                </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>

<script>
  const URL_EDIT_GURU = `<?= site_url('admin/guru/update/'.$this->uri->segment(4)) ?>`;

  $(document).ready(function() {

    $("select").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

    $("input").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

    $('#table_program').DataTable();

    $('#tanggal_lahir').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight: true,
      orientation: "bottom auto",
      todayBtn: true,
      todayHighlight: true,
    });

    $('[name="tanggal_lahir"]').datepicker('update', `<?= ($guru->tanggal_lahir == '0000-00-00') ? '' : $guru->tanggal_lahir ?>`);

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

  function update(){
    $('#btnSave').text('Menyimpan...');
    $('#btnSave').attr('disabled',true);

    let formData = new FormData($('#formEditGuru')[0]);
    $.ajax({
      url : `${URL_EDIT_GURU}`,
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
              location.href = `<?= site_url()?>admin/dataguru`;
            }
          }).then(() => {
            setTimeout(() => {
              location.href = `<?= site_url()?>admin/dataguru`;
            }, 2000);
          });

        } else{
          for (var i = 0; i < data.inputerror.length; i++){
            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
          }
        }
        $('#btnSave').text('SUBMIT');
        $('#btnSave').attr('disabled',false);
      },
      error: function (err){
        swal("Error", "Error Editing Data", "error");
        $('#btnSave').text('SUBMIT');
        $('#btnSave').attr('disabled',false);

      }
    });
  }




</script>
