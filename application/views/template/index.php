<!DOCTYPE html>
<html >
<head>
	<!-- Site made with Mobirise Website Builder v4.6.4, https://mobirise.com -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo-max-education21-1041x635.png" type="image/x-icon">
	<title><?= $title; ?></title>
	<!--<link rel="stylesheet" href="<?= base_url() ?>assets/web/assets/mobirise-icons/mobirise-icons.css">-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/tether/tether.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dropdown/css/style.css">
	<!--<link rel="stylesheet" href="<?= base_url() ?>assets/socicon/css/styles.css">-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/theme/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/mobirise/css/mbr-additional.css" type="text/css">

	<!-- <link href="cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"> -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/datetimepicker/css/bootstrap-datetimepicker.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<script
	src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>

	<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/moment/moment.min.js"></script>
	<!-- <script src="<?= base_url() ?>assets/axios/axios.min.js"></script> -->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?= base_url() ?>assets/select2/js/select2.min.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114932927-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-114932927-1');
	</script>

</head>
<body>

	<section class="menu cid-qInCwdu3am" once="menu" id="menu1-7">

		<nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>
			<div class="menu-logo">
				<div class="navbar-brand">
					<span class="navbar-logo">

						<a href="<?= site_url() ?>"><img src="<?= base_url() ?>assets/images/logo-max-education21-1041x635.png" alt="#" title="" style="height: 3.8rem;"></a>
					</span>

				</div>
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
					<li class="nav-item"><a class="nav-link link text-black display-4" href="<?= site_url() ?>" aria-expanded="false">
						<span class="fas fa-file-alt mbr-iconfont-btn" style="font-size: 20px;"></span>&nbsp;Beranda</a>
					</li>
					<li class="nav-item dropdown open">
						<a class="nav-link link text-black dropdown-toggle display-4" href="https://mobirise.com" data-toggle="dropdown-submenu" aria-expanded="true"><span class="fas fa-file-alt mbr-iconfont-btn" style="font-size: 20px;"></span>
						Program</a>
						<div class="dropdown-menu">
							<div class="dropdown">
								<a class="text-black dropdown-item dropdown-toggle display-4" href="https://mobirise.com" data-toggle="dropdown-submenu" aria-expanded="false">SD</a>
								<div class="dropdown-menu dropdown-submenu">
									<a class="text-black dropdown-item display-4" href="<?= site_url() ?>daftarsdnasional">Nasional</a>
									<a class="text-black dropdown-item display-4" href="<?= site_url() ?>daftarsdinternasional">Internasional</a>
								</div>
							</div>
							<a class="text-black dropdown-item display-4" href="<?= site_url() ?>daftarsmp" aria-expanded="false">SMP</a>
							<a class="text-black dropdown-item display-4" href="<?= site_url() ?>daftarsma" aria-expanded="false">SMA</a>
							<a class="text-black dropdown-item display-4" href="<?= site_url() ?>daftarsbmptn" aria-expanded="false">SBMPTN</a>
							<a class="text-black dropdown-item display-4" href="<?= site_url() ?>daftarenglish" aria-expanded="false">ENGLISH CONVERSATION</a>
							<a class="text-black dropdown-item display-4" href="<?= site_url() ?>daftarmusic" aria-expanded="false">MUSIC CLASS</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link link text-black display-4" href="<?= site_url() ?>about"><span class="fas fa-search mbr-iconfont-btn" style="font-size: 20px;"></span>&nbsp;Tentang Kami</a>
					</li>
				</ul>

				<div class="navbar-buttons mbr-section-btn">
					<a class="btn btn-sm btn-primary-outline display-4"  href="<?= site_url()?>login"><i class="fas fa-sign-in-alt"> </i>&nbsp; Masuk</a>
				</div>
			</div>
		</nav>


	</div>
</section>

<?= $content; ?>

<section once="" class="cid-qIoKIMDfPp" id="footer7-5">

	<div class="container">
		<div class="media-container-row align-center mbr-white">
			<div class="row">
				<ul class="foot-menu">
					<li class="foot-menu-item mbr-fonts-style display-7">
						<a class="text-white mbr-bold" href="#" target="_blank">About us</a>
					</li><li class="foot-menu-item mbr-fonts-style display-7">
						<a class="text-white mbr-bold" href="#" target="_blank">Services</a>
					</li><li class="foot-menu-item mbr-fonts-style display-7">
						<a class="text-white mbr-bold" href="tel:+628111099978">Get In Touch</a>
					</li><li class="foot-menu-item mbr-fonts-style display-7">
						<a class="text-white mbr-bold" href="#" target="_blank">Careers</a>
					</li></ul>
				</div>

				<div class="row">
					<div class="social-list align-right pb-2">

						<div class="soc-item">
							<a href="#" target="_blank">
								<i class="fab fa-twitter fa-3x"></i>
							</a>
						</div>
						<div class="soc-item">
							<a href="https://www.facebook.com/maxeducationindonesia/?hc_ref=ARR-qrGwwXtt1h-0lCciXtZRKrvrLf6qbbzITuky8Ed0h9XEuvC6Faqy0p4ie2nZaRQ&fref=nf" target="_blank">
								<i class="fab fa-facebook-square fa-3x"></i>
							</a>
						</div>
						<div class="soc-item">
							<a href="#" target="_blank">
								<i class="fab fa-youtube fa-3x"></i>
							</a>
						</div>
						<div class="soc-item">
							<a href="https://www.instagram.com/maxeducation/" target="_blank">
								<i class="fab fa-instagram fa-3x"></i>
							</a>
						</div>
						<div class="soc-item">
							<a href="https://api.whatsapp.com/send?phone=6287785210130" target="_blank">
								<i class="fab fa-whatsapp fa-3x"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="row row-copirayt">
					<p class="mbr-text mb-0 mbr-fonts-style mbr-white display-7">
						© Copyright 2018 Max Education Indonesia - All Rights Reserved
					</p>
				</div>
			</div>
		</div>
	</section>


	<script src="<?= base_url() ?>assets/popper/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/tether/tether.min.js"></script>
	<script src="<?= base_url() ?>assets/smoothscroll/smooth-scroll.js"></script>
	<script src="<?= base_url() ?>assets/dropdown/js/script.min.js"></script>
	<script src="<?= base_url() ?>assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
	<script src="<?= base_url() ?>assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
	<script src="<?= base_url() ?>assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
	<script src="<?= base_url() ?>assets/touchswipe/jquery.touch-swipe.min.js"></script>
	<script src="<?= base_url() ?>assets/theme/js/script.js"></script>
	<script src="<?= base_url() ?>assets/slidervideo/script.js"></script>

	<script src="<?= base_url() ?>assets/formoid/formoid.min.js"></script>


	<script>
		const URL_FORM = `<?= site_url('siswa/register') ?>`;

		$(document).ready(() => {

			$(function () {
				$('#mata_pelajaran').select2();
				$('#hari').select2();
				$('#jam').select2();
			});

			$('#btnRegister').click((e) => {
				e.preventDefault();
				// console.log(e.preventDefault());
				if ($('#terms').prop('checked') == true){
					axios({
						method: "POST",
						url: `${URL_FORM}`,
						data: $('#form_Register').serialize()
					})
					.then(response => {
						// console.log(response);
						if(response.data){
							$('#modal_Register').modal('hide');

							swal({
								title: "Registrasi Sukses",
								text: `Akan segera diproses. Admin akan menghubungi kamu!`,
								icon: "success",
							})
							.then((success) => {
								if (success) {
									location.href = `<?= site_url()?>`;
								}
							}).then(() => {
								setTimeout(() => {
									location.href = `<?= site_url()?>`;
								}, 2000);
							}).then(() => {
								$('#form_Register')[0].reset();
							});
						} 
					})
					.catch(err => {
						// console.log(err);
						let data = err.response.data;
						if(data.status == false){
							swal("Registrasi Gagal", `${data.message}`, "error");
						}
					});
				} else {
					swal("Klik Checkbox Persetujuan", "Anda Belum Menchecklist Perjanjian Persetujuan" , "error");
				}
			});

		});

	</script>
</body>
</html>