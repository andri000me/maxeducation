<style>
.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}

#img-upload{
  width: 100%;
}

</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Slideshow
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li>
        <a href="<?= site_url() ?>admin/slideshow"> Data Slideshow</a>
      </li>
      <li class="active">Tambah Slideshow</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title ">Tambah Slideshow</h3>
          </div>

          <div class="box-body">
            <form  method="POST" action="javascript:void(0)" id="formTambahSlideshow">
              <div class="row">
                <div class="col-md-8">
                  <img class="img-thumbnail" id='img-upload'/>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Keterangan</label>
                    <div class="form-line">
                      <input type="text" name="keterangan" class="form-control" placeholder="Keterangan Pada Slideshow">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label">Upload Image</label>
                    <div class="form-line">
                      <input type="file" id="imgInp" name="image_slideshow" class="btn btn-default btn-file" data-toggle="tooltip" data-placement="top" title="Lampirkan File Gambar Slideshow">
                      <span class="help-block"></span>
                    </div>
                  </div>


                </div>

              </div>

              <div class="box-footer">

                <button id="btnSave" onclick="saveSlideshow()" class="btn btn-flat btn-primary pull-right">SUBMIT</button>
                <a href="<?= site_url()?>admin/slideshow" class="btn btn-flat btn-danger ">CANCEL</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</section>
</div>

<script>
  const URL_TAMBAH_SLIDESHOW = `<?= site_url() ?>admin/slideshow/create`;

  $(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });

    $("textarea").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

    $("input").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

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

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img-upload').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function(){
    readURL(this);
  });

  $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
  });

  function saveSlideshow(){
    $('#btnSave').text('Menyimpan...');
    $('#btnSave').attr('disabled',true);

    var formData = new FormData($('#formTambahSlideshow')[0]);
    $.ajax({
      url : `${URL_TAMBAH_SLIDESHOW}`,
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
              location.href = `<?= site_url()?>admin/slideshow`;
            }
          }).then(() => {
            setTimeout(() => {
              location.href = `<?= site_url()?>admin/slideshow`;
            }, 1000);
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
        swal("Error", "Error Adding Data", "error");
        $('#btnSave').text('SUBMIT');
        $('#btnSave').attr('disabled',false);

      }
    });
  }


</script>
