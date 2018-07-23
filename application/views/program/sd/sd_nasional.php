<section class="header11 cid-qIoZib7Tzp mbr-fullscreen" id="header11-9">
    <div class="container align-left">
        <div class="media-container-column mbr-white col-md-12">
            <h3 class="mbr-section-subtitle py-3 mbr-fonts-style display-5"><br><br>SD NASIONAL</h3>
            <h1 class="mbr-section-title py-3 mbr-fonts-style display-1">Les Private Menjadi Menyenangkan di <strong>MAX Education</strong>.<br>
            </h1>
            <p class="mbr-text py-3 mbr-fonts-style display-5">Masa Anak-Anak adalah masa yang sangat penting bagi dasar-dasar pendidikannya. Mari percayakan buah hati Anda kepada Kakak-Kakak Guru yang akan mengajari dan mendidik mereka dengan sepenuh hati.</p>
        </div>
    </div>
</section>

<section class="cid-qItLVIE1Zp" id="pricing-tables1-1d" style="background-image: url(<?= base_url() ?>assets/images/mbr-1620x1080.jpg);">

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container">
        <div class="media-container-row">

            <div class="plan col-12 mx-2 my-2 justify-content-center col-lg-6">
                <div class="plan-header text-center pt-5">
                    <h3 class="plan-title mbr-fonts-style display-5">Private (1 Siswa)</h3>
                    <div class="plan-price">
                        <span class="price-value mbr-fonts-style display-7">Rp.</span>
                        <span class="price-figure mbr-fonts-style display-5">650.000</span>
                        <small class="price-term mbr-fonts-style display-7">
                        per bulan</small>
                    </div>
                </div>
                <div class="plan-body">
                    <div class="plan-list align-center">
                        <ul class="list-group list-group-flush mbr-fonts-style display-7">
                            <li class="list-group-item">
                            Termasuk Semua Mata Pelajaran</li>
                            <li class="list-group-item">
                            Waktu Belajar 2 Jam</li>
                        </ul>
                    </div>
                    <div class="mbr-section-btn text-center py-4 pb-5">
                        <a class="btn btn-primary display-4"  id="btnOnRegisterPrivate">
                            <span class="mbri-edit mbr-iconfont mbr-iconfont-btn"></span>DAFTAR
                        </a>
                    </div>
                </div>
            </div>

            <div class="plan col-12 mx-2 my-2 justify-content-center col-lg-6">
                <div class="plan-header text-center pt-5">
                    <h3 class="plan-title mbr-fonts-style display-5">Tag Team (2 Siswa)</h3>
                    <div class="plan-price">
                        <span class="price-value mbr-fonts-style display-7">Rp.</span>
                        <span class="price-figure mbr-fonts-style display-5">1.000.000</span>
                        <small class="price-term mbr-fonts-style display-7">
                        per bulan</small>
                    </div>
                </div>
                <div class="plan-body">
                    <div class="plan-list align-center">
                        <ul class="list-group list-group-flush mbr-fonts-style display-7">
                            <li class="list-group-item">Termasuk Semua Mata Pelajaran</li>
                            <li class="list-group-item">Waktu Belajar 2 Jam</li>
                        </ul>
                    </div>
                    <div class="mbr-section-btn text-center py-4 pb-5"><a id="btnOnRegisterTagTeam" class="btn btn-primary display-4"><span class="mbri-edit mbr-iconfont mbr-iconfont-btn"></span>DAFTAR</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Register -->
    <div class="modal fade" id="modal_Register" role="document">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Register Form</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="javascript:void(0);" id="form_Register">
                        <div class="form-group">
                            <label class="control-label">Nama Lengkap *</label>
                            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="hari">Jenis Kelamin *</label>
                            <div class="form-line">
                                <select name="id_jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option value=''>--pilih--</option>
                                    <?php foreach ($jenis_kelamin as $row): ?>
                                        <option value="<?= $row->id_jenis_kelamin ?>"><?= $row->jenis_kelamin ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="hari">Agama *</label>
                            <div class="form-line">
                                <select name="id_agama" class="form-control" id="agama">
                                    <option value=''>--pilih--</option>
                                    <?php foreach ($agama as $row): ?>
                                        <option value="<?= $row->id_agama ?>"><?= $row->agama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nomor HP Siswa *</label>
                            <input type="number" name="nomor_hp_siswa" placeholder="Nomor HP Siswa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nomor HP Orang Tua Murid (Ayah)</label>
                            <input type="number" name="nomor_hp_ayah" placeholder="Nomor HP Orang Tua Murid (Ayah)" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nomor HP Orang Tua Murid (Ibu)</label>
                            <input type="number" name="nomor_hp_ibu" placeholder="Nomor HP Orang Tua Murid (Ibu)" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama Orang Tua (Yang Dihubungi) *</label>
                            <input type="text" name="nama_orang_tua" placeholder="Nama Orang Tua (Yang Dihubungi)" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nomor HP Saudara se-Rumah Lainnya (Jika ada)</label>
                            <input type="number" name="nomor_hp_saudara_serumah" placeholder="Nomor HP Saudara se-rumah lainnya (Jika ada)" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nomor Telepon Rumah</label>
                            <input type="number" name="nomor_telepon_rumah" placeholder="Nomor Telepon Rumah" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label class="control-label">Alamat Lengkap *</label>
                            <div class="form-line">
                                <textarea name="alamat_lengkap" rows="4" placeholder="Alamat Lengkap" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="domisili">Domisili *</label>
                            <div class="form-line">
                                <select name="id_domisili" class="form-control" id="domisili">
                                    <option value=''>--pilih--</option>
                                    <?php foreach ($domisili as $row): ?>
                                        <option value="<?= $row->id_domisili ?>"><?= $row->domisili ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tingkat_sekolah">Tingkat Sekolah *</label>
                            <div class="form-line">
                                <select name="id_tingkat_sekolah" class="form-control" id="tingkat_sekolah">
                                    <?php foreach ($tingkat_sekolah as $row): ?>
                                        <option value=''>--pilih--</option>
                                        <option value="<?= $row->id_tingkat_sekolah ?>"><?= $row->tingkat_sekolah ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kelas *</label>
                            <input type="text" name="kelas" placeholder="Kelas" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama Sekolah *</label>
                            <input type="text" name="nama_sekolah" placeholder="Nama Sekolah" class="form-control">
                        </div>



                        <div class="form-group">
                            <label for="mata_pelajaran">Mata Pelajaran *</label>
                            <div class="form-line">
                                <select style="width: 100%; " class="form-control"  name="mata_pelajaran[]" multiple="" id="mata_pelajaran" >
                                    <?php foreach ($mata_pelajaran as $row): ?>
                                        <option value="<?= $row->mata_pelajaran ?>"><?= $row->mata_pelajaran ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mata_pelajaran">Hari *</label>
                            <div class="form-line">
                                <select style="width: 100%; " class="form-control"  name="hari[]" multiple="" id="hari" >
                                    <?php foreach ($hari as $row): ?>
                                        <option value="<?= $row->hari ?>"><?= $row->hari ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mata_pelajaran">Jam *</label>
                            <div class="form-line">
                                <select style="width: 100%; " class="form-control"  name="jam[]" multiple="" id="jam" >
                                    <?php foreach ($jam as $row): ?>
                                        <option value="<?= $row->jam ?>"><?= $row->jam. ' WIB' ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Durasi</label>
                            <input type="text" placeholder="Durasi" class="form-control" value="2 Jam" disabled="">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Tahu MAX Education dari: *</label>
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

                        <div class="form-group">
                            <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                            <label for="terms">I Agree to the <strong>Terms of Use</strong> and <strong>Privacy Policy</strong></label>
                        </div>

                        <input type="hidden" name="id_program" value="1">

                        <button type="submit" id="btnRegister" class="btn btn-primary display-4"><span class="mbri-edit mbr-iconfont mbr-iconfont-btn" style="font-size: 20px;"></span>Register</button>
                        <button type="button" class="btn btn-danger display-4" data-dismiss="modal"><span class="mbri-close mbr-iconfont mbr-iconfont-btn" style="font-size: 20px;"></span>Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(() => {
        $('#btnOnRegisterPrivate').click(() => {
            $('#form_Register')[0].reset(); 
            $('#modal_Register').modal({backdrop: 'static', keyboard: false, show: true});
        });

        $('#btnOnRegisterTagTeam').click(() => {
            $('#form_Register')[0].reset(); 
            $('#modal_Register').modal({backdrop: 'static', keyboard: false, show: true});
        });
    });

</script>