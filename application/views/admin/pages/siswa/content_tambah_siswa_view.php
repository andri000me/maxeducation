<style>
#sectionDaftarMurid{
  background: url(<?= base_url() ?>assets/images/space-background.jpeg);

  margin-top: 77px;
  min-height:400px;

  background-position:center;
  background-size:cover;
  background-repeat:no-repeat;
  background-attachment:fixed;

}

.header{
  text-align: center;
  color: white;
  margin-bottom: 5%;
}

#form_Register {
  color: white;
  padding: 10px 10% 10px 10%;

  margin-bottom: 10%;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
  background-color: blue;
  border-color: blue;
}


@media(min-width: 568px) {
  /*#btnRegister {
    margin-left: 80%;
    }*/
  }


  @media(max-width:568px){
    #sectionBelajarGratis{
      background-attachment:fixed;
    }

  }

</style>

<section id="sectionDaftarMurid" class="features3 cid-qInDyo8xet" >

  <div class="container">
    <h3 class="header" >PENDAFTARAN MURID MAX EDUCATION</h3>

    <div class="row">
      <div class="col-md-12">
        <div class="form">
          <form method="POST" action="javascript:void(0);" id="form_Register">
            <div class="form-group row">
              <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap *</label>
              <div class="col-sm-9">
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin *</label>
              <div class="col-sm-9">
                <select name="id_jenis_kelamin" class="form-control" id="jenis_kelamin">
                  <option value=''>--pilih--</option>
                  <?php foreach ($jenis_kelamin as $row): ?>
                    <option value="<?= $row->id_jenis_kelamin ?>"><?= $row->jenis_kelamin ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="agama" class="col-sm-3 col-form-label">Agama *</label>
              <div class="col-sm-9">
                <select name="id_agama" class="form-control" id="agama">
                  <option value=''>--pilih--</option>
                  <?php foreach ($agama as $row): ?>
                    <option value="<?= $row->id_agama ?>"><?= $row->agama ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="nomor_hp_siswa" class="col-sm-3 col-form-label">Nomor HP Siswa *</label>
              <div class="col-sm-9">
                <input type="number" name="nomor_hp_siswa" placeholder="Nomor HP Siswa" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nomor_hp_ayah" class="col-sm-3 col-form-label">Nomor HP Orang Tua Murid (Ayah)</label>
              <div class="col-sm-9">
                <input type="number" name="nomor_hp_ayah" placeholder="Nomor HP Orang Tua Murid (Ayah)" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nomor_hp_ibu" class="col-sm-3 col-form-label">Nomor HP Orang Tua Murid (Ibu)</label>
              <div class="col-sm-9">
                <input type="number" name="nomor_hp_ibu" placeholder="Nomor HP Orang Tua Murid (Ibu)" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nama_orang_tua" class="col-sm-3 col-form-label">Nama Orang Tua (Yang Dihubungi) *</label>
              <div class="col-sm-9">
                <input type="text" name="nama_orang_tua" placeholder="Nama Orang Tua (Yang Dihubungi)" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nomor_hp_saudara_serumah" class="col-sm-3 col-form-label">Nomor HP Saudara se-rumah lainnya (Jika ada)</label>
              <div class="col-sm-9">
                <input type="number" name="nomor_hp_saudara_serumah" placeholder="Nomor HP Saudara se-rumah lainnya (Jika ada)" class="form-control" >
              </div>
            </div>

            <div class="form-group row">
              <label for="nomor_telepon_rumah" class="col-sm-3 col-form-label">Nomor Telepon Rumah</label>
              <div class="col-sm-9">
                <input type="number" name="nomor_telepon_rumah" placeholder="Nomor Telepon Rumah" class="form-control" >
              </div>
            </div>

            <div class="form-group row">
              <label for="alamat_lengkap" class="col-sm-3 col-form-label">Alamat Lengkap *</label>
              <div class="col-sm-9">
                <textarea name="alamat_lengkap" rows="4" placeholder="Alamat Lengkap" class="form-control"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="domisili" class="col-sm-3 col-form-label">Domisili *</label>
              <div class="col-sm-9">
                <select name="id_domisili" class="form-control" id="domisili">
                  <option value=''>--pilih--</option>
                  <?php foreach ($domisili as $row): ?>
                    <option value="<?= $row->id_domisili ?>"><?= $row->domisili ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="tingkat_sekolah" class="col-sm-3 col-form-label">Tingkat Sekolah *</label>
              <div class="col-sm-9">
                <select name="id_tingkat_sekolah" class="form-control" id="tingkat_sekolah">
                  <option value=''>--pilih--</option>
                  <?php foreach ($tingkat_sekolah as $row): ?>
                    <option value="<?= $row->id_tingkat_sekolah ?>"><?= $row->tingkat_sekolah ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="kelas" class="col-sm-3 col-form-label">Kelas *</label>
              <div class="col-sm-9">
                <input type="text" name="kelas" placeholder="Kelas" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nama_sekolah" class="col-sm-3 col-form-label">Nama Sekolah *</label>
              <div class="col-sm-9">
                <input type="text" name="nama_sekolah" placeholder="Nama Sekolah" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="program" class="col-sm-3 col-form-label">Program *</label>
              <div class="col-sm-9">
                <select name="id_program" class="form-control" id="id_program">
                  <option value=''>--pilih--</option>
                  <?php foreach ($program as $row): ?>
                    <option value="<?= $row->id_program ?>"><?= $row->program ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="nama_sekolah" class="col-sm-3 col-form-label">Mata Pelajaran *</label>
              <div class="col-sm-9">
                <select style="width: 100%; " class="form-control"  name="mata_pelajaran[]" multiple="" id="mata_pelajaran" >
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="hari" class="col-sm-3 col-form-label">Hari *</label>
              <div class="col-sm-9">
                <select style="width: 100%; " class="form-control"  name="hari[]" multiple="" id="hari" >
                  <?php foreach ($hari as $row): ?>
                    <option value="<?= $row->id_hari ?>"><?= $row->hari ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            

            <div class="form-group row">
              <label for="jam" class="col-sm-3 col-form-label">Jam *</label>
              <div class="col-sm-9">
                <select style="width: 100%; " class="form-control"  name="jam[]" multiple="" id="jam" >
                  <?php foreach ($jam as $row): ?>
                    <option value="<?= $row->id_jam ?>"><?= $row->jam. ' WIB' ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
              <div class="col-sm-9">
                <input type="text" placeholder="Durasi" class="form-control" value="2 Jam" readonly="">
              </div>
            </div>

            <div class="form-group row">
              <label for="tahu_dari" class="col-sm-3 col-form-label">Tahu MAX Education dari: *</label>
              <div class="col-sm-9">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tahu_dari" id="radio_di_sekolah" value="Flyer di Sekolah" checked>
                  <label class="form-check-label">Flyer di Sekolah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tahu_dari" id="radio_di_perumahan" value="Flyer di Perumahan">
                  <label class="form-check-label">Flyer di Perumahan</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tahu_dari" id="radio_social_media" value="Social Media">
                  <label class="form-check-label">Social Media</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tahu_dari" id="radio_teman" value="Teman / Kerabat">
                  <label class="form-check-label">Teman / Kerabat</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tahu_dari" id="radio_website" value="Website">
                  <label class="form-check-label">Website</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tahu_dari" id="radio_lainnya" value="Lainnya">
                  <label class="form-check-label">Lainnya</label>
                </div>
              </div>
            </div>

            <br>

            <div class="form-group">
              <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
              <label for="terms">I Agree to the <strong>Terms of Use</strong> and <strong>Privacy Policy</strong></label>
            </div>

            <button type="button" id="btnRegister" class="btn btn-primary">SUBMIT</button>
            <a id="btnOnBatal" class="btn btn-danger" href="<?= site_url() ?>">BATAL</a>

          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<script>

  $(document).ready(function() {
   $('select[name="id_program"]').on('change', function() {
    let program = $(this).val();
    if(program) {
      $.ajax({
        url: `<?= site_url('pages/get_mata_pelajaran_by_program') ?>/${program}`,
        type: "GET",
        dataType: "JSON",
        success:function(data) {
          // console.log(data);
          $('select[name="mata_pelajaran[]"]').empty();
          $.each(data, function(key, value) {
            // console.log(value);
            $('select[name="mata_pelajaran[]"]').append(`<option value="${value.id_mata_pelajaran}">${value.mata_pelajaran}</option>`);
          });
        }
      });
    }else{
      $('select[name="mata_pelajaran[]"]').empty();
    }

  });

   

 });

</script>