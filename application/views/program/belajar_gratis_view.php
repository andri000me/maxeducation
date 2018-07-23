<style>
#sectionBelajarGratis{
	background: url(<?= base_url() ?>assets/images/belajar_gratis_background.jpeg);

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

#formBelajarGratis {
	color: white;
}



.keterangan1 {
	border-radius: 30px 0px;
	box-sizing: content-box;
	background-color: white;

	color: white;
	padding: 20px;
	opacity:0.70;
}

.keterangancaranya {
	border-radius: 30px 0px;
	box-sizing: content-box;
	background-color: white;

	color: white;
	padding: 20px;
	opacity:0.70;
}

.keterangancaranya > p {
	color: black;
}

.keterangan2 {
	border-radius: 30px 0px;
	box-sizing: content-box;
	background-color: white;

	color: white;
	padding: 20px;
	opacity:0.70;
}

.keterangan1 > p {
	color: black;
}

.keterangan2 > p {
	color: black;
}

@media(min-width: 568px) {

	#btnOnKirim {
		margin-left: 26%;
	}

	.forSMP {
		margin-top: 2%;

		box-sizing: content-box;
		background-color: white;

		color: white;
		padding: 20px;

		border-radius: 10px;
	}

	.forSMP > h1 {
		text-align: center;
		color: black;
	}

}

@media(max-width:568px){
	#sectionBelajarGratis{
		background-attachment:fixed;
	}

	.keterangan1 {
		margin-top: 10%;
	}

	.keterangan2 {
		margin-top: 10%;
	}

	.keterangancaranya {
		margin-top: 10%;
	}

	.button{
		margin-top: 10%;
		margin-left: 18%;
	}

	.forSMP {
		margin-top: 2%;

		box-sizing: content-box;
		background-color: white;

		color: white;
		padding: 20px;

		border-radius: 10px;
	}

	.forSMP > h1 {
		color: black;
		text-align: center;

	}
}

</style>

<section id="sectionBelajarGratis" class="features3 cid-qInDyo8xet" >

	<div class="container">
		<h3 class="header" >BELAJAR UN GRATIS MAX EDUCATION</h3>

		<div class="row">
			<div class="col-md-6">
				<form action="javascript:void(0);" method="POST" id="formBelajarGratis">
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama_lengkap_siswa">
						</div>
					</div>
					<div class="form-group row">
						<label for="Gelombang" class="col-sm-3 col-form-label">Gelombang</label>
						<div class="col-sm-9">
							<select name="gelombang" id="" class="form-control">
								<option value="Gelombang 1">Gelombang 1</option>
								<option value="Gelombang 2">Gelombang 2</option>
								<option value="Gelombang 3">Gelombang 3</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="NamaIG" class="col-sm-3 col-form-label">Nama IG</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama_ig">
						</div>
					</div>
					<button type="submit" id="btnOnKirim" class="btn btn-primary">KIRIM</button>
				</form>
			</div>

			<div class="col-md-6">
				<div class="keterangan1">
					<p>Sudah Mau UN</p>
					<p>Namun masih kesulitan belajar ??</p>
					<p>Belajar untuk UN bersama MAX Education Yuk !!</p>
					<p>Belajar jadi lebih mudah, menyenangkan dan GRATIS !!!</p>
				</div>


			</div>


			
		</div>

		<br>

		<div class="row">
			<div class="col-sm-6" >
				<div class="keterangan2">
					<p>Waktu Pelaksaan :</p>
					<p>Gel. I : 2 - 7 April 2018 pukul 17.00</p>
					<p>Gel. II : 9 - 14 April 2018 pukul 17.00</p>
					<p>Gel. II : 16 - 21 April 2018 pukul 17.00</p>
					<br>
					<p>Yuk Buruan Daftar !</p>
					<br>
					<p>Info lebih lanjut hubungi : 087785210130</p>
				</div>
			</div>

			<div class="col-md-6">
				<div class="keterangancaranya">
					<p>Caranya :</p>
					<p>1. Follow Instagram MAX Education @maxeducation</p>
					<p>2. Upload postingan Belajar UN Gratis MAX Education </p>
					<p>3. Tag ke 5 orang temanmu dan ke akun Instagram MAX Education @maxeducation</p>
					<p>4. Jika Tag-an kamu sudah masuk ke Instagram MAX Education, Tunggu sampai MAX Education mengirimkan formulir pendaftaran ke DM kamu</p>
				</div>

				<div class="forSMP">
					<h1>HANYA UNTUK SMP</h1>
				</div>
			</div>

		</div>

	</div>

</section>

<script>
	const URL_FORM_BELAJAR_GRATIS = `<?= site_url('api/siswa/') ?>`;

	$('#formBelajarGratis').submit((e) => {
		e.preventDefault();
		
		axios({
			method: "POST",
			url: `${URL_FORM_BELAJAR_GRATIS}belajar_gratis`,
			data: $('#formBelajarGratis').serialize()
		})
		.then(response => {
			// console.log(response);
			if(response.data){
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

	});
</script>