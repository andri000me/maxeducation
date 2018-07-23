<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Siswa Belajar Gratis
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Siswa Belajar Gratis</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <!-- <h3 class="box-title">Hover Data Table</h3> -->

            <button class="btn btn-flat btn-default pull-right" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 table-responsive">
              <table id="tableBelajarGratis" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Gelombang</th>
                    <th>Nama IG</th>
                    <th>Mendaftar Pada</th>
                  </tr>
                </thead>
                <tbody>

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

<script>
  let table;
  $(document).ready(function() {
    $(function(){
      table = $('#tableBelajarGratis').DataTable({
        "oLanguage": {
          "sProcessing": "Loading...",
          "sSearch": "Search Data :  ",
          "sZeroRecords": "Data Kosong",
          "sEmptyTable": "No data available in table"
        },
        "processing": true, 
        "serverSide": true,
        "iDisplayLength": 50,
        "order": [],
        "ajax": {
          "url": "<?= site_url('admin/belajar_gratis/get_siswa_belajar_gratis')?>",
          "type": "POST"
        },

        "columnDefs": [{ 
          // "targets": [ -1 ], 
          "orderable": false
        },
        ],

        "order": [[ 4, "desc" ]],
      });
    });
  });



  function reload_table(){
    table.ajax.reload(null,false);
  }


</script>