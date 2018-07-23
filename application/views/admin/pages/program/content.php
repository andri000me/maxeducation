<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Program
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Program</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <button type="button" onclick="addForm()" class="btn btn-flat btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data Program</button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 table-responsive">
              <table id="table_program" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 70%">Nama Program</th>
                    <th class="actions">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($programs as $program): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><a href="<?= site_url('admin/program/mata_pelajaran/'.$program->id_program) ?>"><span class="label label-primary"><?= $program->program ?></span></a></td>
                    <td>
                      <a href="javascript:void(0);" onclick="editProgram(<?= $program->id_program ?>)" class="btn btn-flat btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a> 
                      <a href="javascript:void(0);" onclick="deleteProgram(<?= $program->id_program ?>)" class="btn btn-flat btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
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
<!-- /.content -->
</div>


<div class="modal fade" id="modal-form" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="form-horizontal" id="formProgram" action="javascript:void(0)" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
          <h3 class="modal-title"></h3>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label class="col-md-3 control-label">Nama Program</label>
            <div class="col-md-6">
              <div class="form-line">
                <input type="hidden" id="id" value="">
                <input id="nama_program" placeholder="Nama Program" type="text" class="form-control" name="program" autofocus="true">
                <span class="help-block"></span>
              </div>
            </div>
          </div>
        </div>


        <div class="modal-footer">
          <button onclick="saveProgram()" id="btnSave" class="btn btn-flat btn-primary btn-save"> Simpan </button>
          <button type="button" class="btn btn-flat btn-warning" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const URL_TAMBAH_PROGRAM  = `<?= site_url('admin/program/add')?>`;
  const URL_EDIT_PROGRAM    = `<?= site_url('admin/program/edit/')?>`;
  const URL_DELETE_PROGRAM  = `<?= site_url('admin/program/delete/')?>`;
  const URL_UPDATE_PROGRAM  = `<?= site_url('admin/program/update/')?>`;

  let save_method;
  let url_method;

  $(document).ready(function() {
    $("input").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

    $('#table_program').DataTable();

  });

  function addForm() {
    save_method = 'add';

    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $('#modal-form').modal('show');
    $('#modal-form form')[0].reset();
    $('.modal-title').text('Tambah Data Program');
  }

  function saveProgram(){
    $('#btnSave').text('Menyimpan...'); 
    $('#btnSave').attr('disabled',true);

    let program = $('#nama_program').val();
    let id_program = $('#id').val();

    if(save_method == 'add') {
      url_method = `${URL_TAMBAH_PROGRAM}`;
    } else {
      url_method = `${URL_UPDATE_PROGRAM}${id_program}`;
    }

    $.ajax({
      type: "POST",
      url: url_method,
      dataType: 'JSON',
      data: {
        program: program,
      },
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
      url : `${URL_EDIT_PROGRAM}${id}`,
      type : "GET",
      dataType : "JSON",
      success : function(response){
        let data = response.data;
        $('#modal-form').modal('show');
        $('.modal-title').text('Edit Data Program');
        $('#id').val(data.id_program);
        $('#nama_program').val(data.program);

        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

      },
      error : function(){
        swal("Gagal", "Data Gagal Ditampilkan", "error");
      }
    });
  }

  function deleteProgram(id){
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
          url: `${URL_DELETE_PROGRAM}${id}`,
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
