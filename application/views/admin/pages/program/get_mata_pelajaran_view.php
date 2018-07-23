<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Mata Pelajaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?= site_url() ?>admin/program">Data Program</a></li>
      <li class="active">Data Mata Pelajaran</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <button type="button" onclick="addForm()" class="btn btn-flat btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data Mata Pelajaran</button>

            <a href="<?= site_url()?>admin/program" class="btn btn-flat btn-danger ">CANCEL</a>
            
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 table-responsive">
              <table id="table_mata_pelajaran" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 30%">Program</th>
                    <th style="width: 50%">Nama Mata Pelajaran</th>
                    <th class="actions">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($mata_pelajaran as $mata_pelajaran): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $mata_pelajaran->program?></td>
                    <td><?= $mata_pelajaran->mata_pelajaran?></td>
                    <td>
                      <a href="javascript:void(0);" onclick="editProgram(<?= $mata_pelajaran->id_mata_pelajaran ?>)" class="btn btn-warning btn-flat" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a> 
                      <a href="javascript:void(0);" onclick="deleteMataPelajaran(<?= $mata_pelajaran->id_mata_pelajaran ?>)" class="btn btn-danger btn-flat" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
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

  <div class="modal fade" id="modal-form" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" id="formMataPelajaran" action="javascript:void(0)" method="post">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
          <h3 class="modal-title"></h3>
        </div>

        <div class="modal-body">
          <input type="hidden" id="id_mata_pelajaran">
          <input type="hidden" id="program_id">

          <div class="form-group">
            <label for="kategori" class="col-md-3 control-label">Nama Program</label>
            <div class="col-md-6">
              <div class="form-line">
                <input id="program" type="text" class="form-control" readonly="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="kategori" class="col-md-3 control-label">Nama Mata Pelajaran</label>
            <div class="col-md-6">
              <div class="form-line">
                <input id="mata_pelajaran" placeholder="Nama Mata Pelajaran" type="text" class="form-control" name="mata_pelajaran" autofocus="true">
                <span class="help-block"></span>

              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button onclick="saveMataPelajaran()" id="btnSave" class="btn btn-flat btn-primary btn-save"> Simpan </button>
          <button type="button" class="btn btn-flat btn-warning" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>


</section>
</div>

<script>
  const URL_EDIT_PROGRAM_MATA_PELAJARAN   = `<?= site_url('admin/program/edit/')?>`;

  const URL_TAMBAH_MATA_PELAJARAN = `<?= site_url('admin/program/mata_pelajaran/add') ?>`;
  const URL_EDIT_MATA_PELAJARAN   = `<?= site_url('admin/program/mata_pelajaran/edit/') ?>`;
  const URL_UPDATE_MATA_PELAJARAN = `<?= site_url('admin/program/mata_pelajaran/update/')?>`;
  const URL_DELETE_MATA_PELAJARAN = `<?= site_url('admin/program/mata_pelajaran/delete/')?>`;

  const URI_SEGMENT = `<?= $this->uri->segment(4) ?>`;

  let save_method;
  let url_method;

  $(document).ready(() => {

    $("input").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

    $('#table_mata_pelajaran').DataTable();

  });

  function addForm(){
    save_method = 'add';
    $('#modal-form form')[0].reset();

    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
      url : `${URL_EDIT_PROGRAM_MATA_PELAJARAN}${URI_SEGMENT}`,
      type : "GET",
      dataType : "JSON",
      success : function(response){
        let data = response.data;
        $('#modal-form').modal('show');
        $('.modal-title').text('Tambah Data Mata Pelajaran');

        $('#program_id').val(data.id_program);
        $('#program').val(data.program);
      },
      error : function(){
        swal("Gagal", "Data Gagal Ditampilkan", "error");
      }
    });

  }

  function saveMataPelajaran(){
    $('#btnSave').text('Menyimpan...'); 
    $('#btnSave').attr('disabled',true);

    let id_mata_pelajaran = $('#id_mata_pelajaran').val();
    let id_program = $('#program_id').val();
    let mata_pelajaran = $('#mata_pelajaran').val();

    if(save_method == 'add') {
      url_method = `${URL_TAMBAH_MATA_PELAJARAN}`;
    } else {
      url_method = `${URL_UPDATE_MATA_PELAJARAN}${id_mata_pelajaran}`;
    }

    $.ajax({
      type: "POST",
      url: url_method,
      dataType: 'JSON',
      data: {
        program_id: id_program,
        mata_pelajaran: mata_pelajaran
      },
      success: function(data){
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
      error: function(err){
        swal("Gagal", "Data Gagal Disimpan", "error");
      }
    });
  }

  function editProgram(id){
    save_method = 'update';

    $.ajax({
      url : `${URL_EDIT_MATA_PELAJARAN}${id}`,
      type : "GET",
      dataType : "JSON",
      success : function(response){
        console.log(response);
        let data = response.data;

        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $('#modal-form').modal('show');
        $('.modal-title').text('Edit Data Mata Pelajaran');

        $('#id_mata_pelajaran').val(data.id_mata_pelajaran);
        $('#program_id').val(data.id_program);

        $('#program').val(data.program);
        $('#mata_pelajaran').val(data.mata_pelajaran);

      },
      error : function(){
        swal("Gagal", "Data Gagal Ditampilkan", "error");
      }
    });
  }

  function deleteMataPelajaran(id){
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
        url: `${URL_DELETE_MATA_PELAJARAN}${id}`,
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
          }).then(() => {
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


</script>
