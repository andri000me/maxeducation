<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <?php if ($this->session->flashdata('success')): ?>
    <br>
    <div class="alert alert-success alert-dismissible" id="success-alert">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Success!</h4>
      <?= $this->session->flashdata('success'); ?>
    </div>
  <?php endif ?>

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Slideshow
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Slideshow</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header ">
            <span class="pull-right"><a href="<?= site_url()?>admin/slideshow/add" class="btn btn-flat bg-red "><i class="fa fa-plus" aria-hidden="true"></i> Tambah Slideshow</a></span>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 table-responsive">
              <table id="table_slideshow" class="table table-striped table-hover dataTable">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 40%">Image</th>
                    <th style="width: 30%">Keterangan</th>
                    <th style="width: 30%">Uploaded at</th>
                    <th style="width: 10%" class="actions">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($slideshows as $slideshow): ?>
                  <tr>
                    <td><?= $no++ ?></td>

                    <td>
                      <img class="img-thumbnail" style="width: 60%" src="<?= base_url('uploads/images/slideshows/'.$slideshow->image_slideshow) ?>" >
                    </td>
                    <td><?= $slideshow->keterangan ?></td>
                    <td><?= $slideshow->created_at ?></td>
                    <td>

                      <a href="javascript:void(0);" onclick="deleteSlideshow(<?= $slideshow->id_slideshow ?>)" class="btn btn-danger btn-flat" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

<script>

  const URL_DELETE_SLIDESHOW = `<?= site_url()?>admin/slideshow/delete/`;

  $(document).ready(function() {
    $('#table_slideshow').DataTable();

  });

  function deleteSlideshow(id_slideshow){
    swal({
      title: "Yakin Ingin Menghapus ?",
      text: "Data Yang Anda Pilih Akan Dihapus Dari Database",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        axios({
          method: 'POST',
          url: `${URL_DELETE_SLIDESHOW}${id_slideshow}`,
        })
        .then(response => {
          swal({
            title: "Sukses",
            text: "Data Slideshow Berhasil Dihapus",
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
        }).catch(err => {
          console.log(err);
          swal("Delete Data Gagal", "Delete Data Slideshow Gagal", "error");
        });
      }
    });



  }
</script>
