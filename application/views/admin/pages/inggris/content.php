<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Siswa Inggris
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Siswa Inggris</li>
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
              <table id="tableInggris" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Nomor HP Siswa</th>
                    <th>Nama Orang Tua</th>
                    <th>Alamat Lengkap</th>
                    <th>Domisili</th>
                    <th>Nama Sekolah</th>
                    <!-- <th>Mata Pelajaran</th> -->
                    <th>Mendaftar Pada</th>
                    <th class="actions">Action</th>
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
      table = $('#tableInggris').DataTable({
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ],
        "responsive": true,
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
          "url": "<?= site_url('get_siswa_inggris')?>",
          "type": "POST"
        },
        "columnDefs": [{
          "targets": [ -1 ],
          "orderable": false },
          ],
          "order": [[ 9, "desc" ]],
        });
    });
  });

  function reload_table(){
    table.ajax.reload(null,false);
  }

  function detail(id){
    $("#mata_pelajaran_siswa").empty();
    $("#hari_siswa").empty();
    $("#jam_siswa").empty();
    
    $.ajax({
      url : `<?= site_url('detail_siswa/')?>${id}`,
      type: "GET",
      success: function(data){
        $('#modal_detail_siswa').modal('show');
        $('#nama_lengkap_siswa').val(data.siswa.nama_lengkap_siswa);
        $('#jenis_kelamin_siswa').val(data.siswa.jenis_kelamin);
        $('#agama_siswa').val(data.siswa.agama);
        $('#nomor_hp_siswa').val(data.siswa.nomor_hp_siswa);
        $('#nomor_hp_ayah_siswa').val(data.siswa.nomor_hp_ayah);
        $('#nomor_hp_ibu_siswa').val(data.siswa.nomor_hp_ibu);
        $('#nama_orang_tua_siswa').val(data.siswa.nama_orang_tua);
        $('#nomor_hp_saudara_serumah_siswa').val(data.siswa.nomor_hp_saudara_serumah);
        $('#nomor_telepon_rumah_siswa').val(data.siswa.nomor_telepon_rumah);
        $('#alamat_lengkap_siswa').val(data.siswa.alamat_lengkap);
        $('#domisili_siswa').val(data.siswa.domisili);
        $('#tingkat_sekolah_siswa').val(data.siswa.tingkat_sekolah);
        $('#program_siswa').val(data.siswa.program);
        $('#kelas_siswa').val(data.siswa.kelas);
        $('#nama_sekolah_siswa').val(data.siswa.nama_sekolah);
        $('#mendaftar_pada_siswa').val(data.siswa.registered);

        for (var i = 0; i < data.mata_pelajaran.length; i++) {
          // console.log(data.mata_pelajaran[i].mata_pelajaran);
          $('#mata_pelajaran_siswa').html(`
            <input type="text" class="form-control" value="${data.mata_pelajaran[i].mata_pelajaran}">
            <br>
            `);
        }

        for (var i = 0; i < data.hari.length; i++) {
          // console.log(data.mata_pelajaran[i].mata_pelajaran);
          $('#hari_siswa').html(`
            <input type="text" class="form-control" value="${data.hari[i].hari}">
            <br>

            `);
        }

        for (var i = 0; i < data.jam.length; i++) {
          // console.log(data.mata_pelajaran[i].mata_pelajaran);
          $('#jam_siswa').html(`
            <input type="text" class="form-control" value="${data.jam[i].jam}">
            <br>

            `);
        }


      }, error: function (jqXHR, textStatus, errorThrown){
        alert('Error getting data siswa');
      }
    });


  }

</script>