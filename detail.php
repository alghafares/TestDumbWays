<div class="container" >
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
				  <div class="card-header">
				    Detail Data Mahasiswa
				  </div>
					<div class="card-body">
					    <h5 class="card-title"><?= $mahasiswa['Nama'];  ?></h5>
					    <p class="card-text"><?= $mahasiswa['Nim'];  ?></p>
					    <p class="card-text"><?= $mahasiswa['Email'];  ?></p>
					    <p class="card-text"><?= $mahasiswa['Jurusan'];  ?></p>
					    <a href="<?= base_url ();  ?>mahasiswa" class="btn btn-primary">Kembali</a>
					 </div>
			</div>



		</div>
	</div>
</div>