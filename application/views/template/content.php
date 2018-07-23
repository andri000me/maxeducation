<style>

#slider1-2 {
    margin-top: 77px;
}

.link_promo {
    left: 7%;
}

.btn-warning {
    background-color: orange !important;
    border-color: orange !important;
}

.btn-warning:hover {
    background-color: #FF8C00 !important;
    border-color: #FF8C00 !important;
}

.caption {
    text-shadow: 0px 0px 20px black;
}

@media(max-width:568px){
    .link_promo {
        left: 1%;
    }
}


</style>

<section class="carousel slide cid-qInDfvEr3N " data-interval="false" id="slider1-2" >
    <div class="full-screen">
        <div id="carouselExampleIndicators" class="carousel mbr-slider slide" data-ride="carousel" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="8000">

            <div class="carousel-inner">
                <ol class="carousel-indicators">
                    <?php for ($i=0; $i < count($slideshows); $i++): ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? "active" : " " ?>"></li>
                    <?php endfor ?>
                </ol>

                <?php $no= 1; foreach ($slideshows as $slideshow): ?>
                <div class="carousel-item <?= $no == 1 ? " active" : " " ?>">
                    <img class="d-block w-100 img-carousel" src="<?= base_url('uploads/images/slideshows/'.$slideshow->image_slideshow) ?>">

                    <?php if ($slideshow->id_slideshow == 57): ?>
                        <div class="carousel-caption d-md-block">
                            <div class="col-sm-4 col-md-4 align-center link_promo">
                                <a href="<?= site_url()?>belajargratis" class="btn btn-warning ">LIHAT PROMO</a>
                            </div>
                        </div>

                    <?php endif ?>
                </div>
                <?php $no++ ?>
            <?php endforeach ?>
        </div>

        <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#carouselExampleIndicators">
            <i class="fas fa-arrow-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#carouselExampleIndicators">
            <i class="fas fa-arrow-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>


</section>

<section class="features3 cid-qInDyo8xet" id="features17-3">
    <div class="container-fluid">
        <div class="media-container-row">
            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="<?= base_url() ?>assets/images/quintal-sekolah-indonesia-ilustrasi-800x450.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">SD</h4>
                        <p class="mbr-text mbr-fonts-style display-7">Semua Mata Pelajaran</p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="<?= base_url() ?>assets/images/siswa-batu-640x360.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">SMP</h4>
                        <p class="mbr-text mbr-fonts-style display-7">Matematika
                            <br>Ipa
                            <br>Bahasa Inggris
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="<?= base_url() ?>assets/images/saaa-315x199.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">SMA</h4>
                        <p class="mbr-text mbr-fonts-style display-7">Matematika
                            <br>Fisika
                            <br>Kimia
                            <br>Ekonomi
                            <br>Sosiologi
                            <br>Geografi
                            <br>Bahasa Inggris
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="<?= base_url() ?>assets/images/ujian-640x315.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">SBMPTN</h4>
                        <p class="mbr-text mbr-fonts-style display-7">Matematika
                            <br>Fisika
                            <br>Kimia
                            <br>Ekonomi
                            <br>Sosiologi
                            <br>Geografi
                            <br>Bahasa Inggris
                        </p>
                    </div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="<?= base_url() ?>assets/images/englishclass-ty-net-980x551.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">ENGLISH</h4>
                        <p class="mbr-text mbr-fonts-style display-7">Conversation
                            <br>Reading<br>Writing
                        </p>
                    </div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="<?= base_url() ?>assets/images/hqdefault-480x360.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">MUSIC CLASS</h4>
                        <p class="mbr-text mbr-fonts-style display-7">Guitar
                            <br>Piano
                            <br>Keyboard
                            <br>Drum&nbsp;<br>Violin
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="timeline1 cid-qInDDXzMRL" id="timeline1-4">
    <div class="container align-center">
        <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2">Pelayanan Spesial Kami</h2>
        <h3 class="mbr-section-subtitle pb-5 mbr-fonts-style display-5">Kenapa Private Harus di MAX Education.?</h3>

        <div class="container timelines-container" mbri-timelines="">
            <div class="row timeline-element reverse separline">
                <div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
                    <div class="time-line-date-content">
                        <p class="mbr-timeline-date mbr-fonts-style display-5">Guru Profesional &amp; Supel</p>
                    </div>
                </div>
                <span class="iconBackground"></span>
                <div class="col-xs-12 col-md-6 align-right">
                    <div class="timeline-text-content">
                        <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-5">Waktu &amp; Tempat Fleksibel&nbsp;</h4>
                        <p class="mbr-timeline-text mbr-fonts-style display-7"></p>
                    </div>
                </div>
            </div>

            <div class="row timeline-element  separline">
                <div class="timeline-date-panel col-xs-12 col-md-6 align-right">
                    <div class="time-line-date-content">
                        <p class="mbr-timeline-date mbr-fonts-style display-5">
                            Tim Akademis Kami Sangat<br>Berfokus Menaikan Prestasi Anak
                        </p>
                    </div>
                </div>
                <span class="iconBackground"></span>
                <div class="col-xs-12 col-md-6 align-left ">
                    <div class="timeline-text-content">
                        <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-5">
                            Garansi uang kembali (Jika Guru Tidak Bisa)
                        </h4>
                        <p class="mbr-timeline-text mbr-fonts-style display-7"></p>
                    </div>
                </div>
            </div> 


            <div class="row timeline-element reverse separline">
                <div class="timeline-date-panel col-xs-12 col-md-6  align-left">
                    <div class="time-line-date-content">
                        <p class="mbr-timeline-date mbr-fonts-style display-5">Evaluasi Perkembangan Anak</p>
                    </div>
                </div>
                <span class="iconBackground"></span>
                <div class="col-xs-12 col-md-6 align-right">
                    <div class="timeline-text-content">
                        <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-5">
                        Persiapan Materi Untuk Ujian</h4>      
                        <p class="mbr-timeline-text mbr-fonts-style display-7"></p>
                    </div>
                </div>
            </div>

            <div class="row timeline-element ">
                <div class="timeline-date-panel col-xs-12 col-md-6 align-right">
                    <div class="time-line-date-content">
                        <p class="mbr-timeline-date mbr-fonts-style display-5">Guru Profesional Datang ke Rumah<br></p>
                    </div>
                </div>
                <span class="iconBackground"></span>
                <div class="col-xs-12 col-md-6 align-left ">
                    <div class="timeline-text-content">
                        <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-5">Bantuan Belajar Online&nbsp;</h4>
                        <p class="mbr-timeline-text mbr-fonts-style display-7"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cid-qIoKMvnLIs" id="footer2-6">

    <div class="container">
        <div class="media-container-row content mbr-white">
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <p class="mbr-text"></p>
                <p>
                    <strong>Address</strong>
                    <br>
                    <br>Jl. Raya Taman Narogong Indah Blok A6 no.2, Dealer Yamaha Brilyan Motor, LT 3<br>
                    <br>
                    <br><strong>Contacts</strong>
                    <br>
                    <br>Email:  contact@maxeducation.id
                    <br>Phone : &nbsp;087785210130 &nbsp;&nbsp;
                </p>
                <p></p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <p class="mbr-text">
                    <strong>Coverages Area</strong>
                    <br>
                    <br>Kota Bekasi&nbsp;
                    <br>DKI Jakarta
                    <br>Kota Depok<br>
                    <br><strong>Detail</strong>
                    <br>
                    <br>Max Education adalah Sebuah lembaga pendidikan SD, SMP,SMA/SMK yang menyediakan layanan Bimbingan Belajar dan tanya jawab soal online.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJF1ofXgqOaS4RHs7_TQ-ormI" allowfullscreen=""></iframe></div>
            </div>
        </div>

    </div>
</section>