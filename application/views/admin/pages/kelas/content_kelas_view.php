<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Kelas
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li class="active">Data Kelas</li>
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

            <div class="row">
              <div class="col-md-12 table-responsive">
                <div class="box-header">
                  <a href="javascript:void(0);" role="button" onclick="tambahDataKelas()" class="btn btn-flat btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data Kelas</a>
                  <!-- <button class="btn btn-danger " onclick="window.history.go(-1)" type="reset">CANCEL</button> -->
                </div>

                <br>

                <table id="table_kelas" class="table table-striped table-hover dataTable">
                  <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th>Nama Kelas</th>
                      <th style="width: 20%">Program</th>
                      <th style="width: 30%">Mata Pelajaran</th>
                      <th style="width: 10%" class="actions">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($kelas as $kelas): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $kelas->nama_kelas ?></td>
                      <td><?= $kelas->program ?></td>
                      <td><?= $kelas->mata_pelajaran ?></td>
                      <td>
                        <a href="javascript:void(0)" onclick="editKelas('<?= $kelas->id_kelas?>')" class="btn btn-flat btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i>
                        </a>
                        <a href="javascript:void(0);" onclick="deleteKelas(<?= $kelas->id_kelas ?>)" class="btn btn-flat btn-danger " data-toggle="tooltip" data-placement="bottom" title="Delete">
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
      <form class="form-horizontal" id="formTambahKelas" action="javascript:void(0)" method="POST">

       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
        <h3 class="modal-title"></h3>
      </div>

      <div class="modal-body">
        <input type="hidden" name="id_kelas" id="id_kelas">
        <div class="form-group">

          <label for="kategori" class="col-md-3 control-label">Nama Kelas</label>
          <div class="col-md-6">
            <div class="form-line">
              <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" autofocus="" >
              <span class="help-block"></span>
            </div>
          </div>
        </div>

        <div class="form-group">

          <label for="kategori" class="col-md-3 control-label">Nama Program</label>
          <div class="col-md-6">
            <div class="form-line">
              <select class="form-control"  name="program_id" id="id_program">
                <option value=''>--pilih--</option>
                <?php foreach ($program as $program): ?>
                  <option value="<?= $program->id_program ?>"><?= $program->program ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="kategori" class="col-md-3 control-label">Nama Mata Pelajaran</label>
          <div class="col-md-6">
            <div class="form-line">
              <select class="form-control" name="mata_pelajaran_id" id="mata_pelajaran_id" >

              </select>
              <span class="help-block"></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6">
            <div class="form-line">
              <input type="hidden" id="mata_pelajaran_id_sudah_ada" name="mata_pelajaran_id_sudah_ada" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" id="btnSave" onclick="saveKelas()" class="btn btn-flat btn-primary"> Simpan </button>
        <button type="button" class="btn btn-flat btn-warning" data-dismiss="modal"> Batal</button>
      </div>
    </form>
  </div>
</div>
</div>

</div>

<script>
  const URL_DELETE_KELAS = `<?= site_url('admin/kelas/delete/') ?>`;
  const URL_TAMBAH_KELAS = `<?= site_url('admin/kelas/create')?>`;
  const URL_EDIT_KELAS = `<?= site_url('admin/kelas/update/')?>`;

  const URL_GET_DATA_KELAS = `<?= site_url('admin/kelas/get_kelas_by_id/')?>`;

  $(document).ready(function() {

    $("input").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

    $("select").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

    $('#table_kelas').DataTable();

    $('select[name="program_id"]').on('change', function() {
      let id_program = $(this).val();

      if(id_program) {
        $.ajax({
          url: `<?= site_url('pages/get_mata_pelajaran_by_program') ?>/${id_program}`,
          type: "GET",
          dataType: "JSON",
          success:function(data) {
            // console.log(data);
            $('select[name="mata_pelajaran_id"]').empty();
            
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();
            
            $.each(data, function(key, value) {
              // console.log(value);
              $('select[name="mata_pelajaran_id"]').append(`<option value="${value.id_mata_pelajaran}">${value.mata_pelajaran}</option>`);
            });
          }
        });
      }else{
        $('select[name="mata_pelajaran_id"]').empty();
      }

    });
  });

  function tambahDataKelas() {
    save_method = 'add';

    $('#modal-form').modal('show');
    $('#modal-form form')[0].reset();

    $('select[name="program_id"]').attr('disabled',false);
    $('select[name="mata_pelajaran_id"]').attr('disabled',false);

    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $('.modal-title').text('Tambah Data Kelas');

    $('select[name="mata_pelajaran_id"]').empty();
  }

  function editKelas(id_kelas){
    save_method = 'update';
    // console.log(id_kelas);
    
    $.ajax({
      url : `${URL_GET_DATA_KELAS}${id_kelas}`,
      type : "GET",
      dataType : "JSON",
      success : function(response){
        // console.log(response);

        $('.form-group').removeClass('has-error');

        $('#formTambahKelas')[0].reset();
        $('.help-block').empty();

        $('#modal-form').modal('show');
        $('.modal-title').text('Edit Data Kelas');

        $('select[name="program_id"]').attr("disabled", true);

        $('#id_kelas').val(response.id_kelas);
        $('#nama_kelas').val(response.nama_kelas);
        $('#id_program').val(response.program_id);
        $('#program').val(response.program);

        let id_program = $('#id_program').val();

        if(id_program) {
          $.ajax({
            url: `<?= site_url('pages/get_mata_pelajaran_by_program') ?>/${id_program}`,
            type: "GET",
            dataType: "JSON",
            success:function(data) {
              // console.log(data);
              $('select[name="mata_pelajaran_id"]').empty();

              // console.log(response);
              let selected = 'selected';

              $.each(data, function(key, value) {
                if (response.mata_pelajaran_id == value.id_mata_pelajaran) {
                  $('select[name="mata_pelajaran_id"]').append(`<option ${selected} value="${value.id_mata_pelajaran}">${value.mata_pelajaran}</option>`);
                  $('select[name="mata_pelajaran_id"]').attr("disabled", true);
                } else {
                  $('select[name="mata_pelajaran_id"]').attr("disabled", true);
                  $('select[name="mata_pelajaran_id"]').append(`<option value="${value.id_mata_pelajaran}">${value.mata_pelajaran}</option>`);
                }

                
              });

            }
          });
        }
        else{
          $('select[name="mata_pelajaran_id"]').empty();
        }

      },
      error : function(){
        swal("Gagal", "Data Gagal Ditampilkan", "error");
      }
    });

  }

  function saveKelas() {
    $('#btnSave').text('Menyimpan...'); 
    $('#btnSave').attr('disabled',true);

    let id_kelas = $('#id_kelas').val();

    if(save_method == 'add') {
      url_method = `${URL_TAMBAH_KELAS}`;
    } else {
      url_method = `${URL_EDIT_KELAS}${id_kelas}`;
    }

    let formData = new FormData($('#formTambahKelas')[0]);
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

        swal("Gagal", "Data Gagal Ditambahkan", "error");
        $('#btnSave').text('Save');
        $('#btnSave').attr('disabled',false);
      }
    });
  }


  function deleteKelas(id_kelas){    
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
          url : `${URL_DELETE_KELAS}${id_kelas}`,
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
