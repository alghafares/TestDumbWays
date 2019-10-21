<div class="container" >
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
			  <div class="card-header">
			    Form Tambah Data Mahasiswa
			  </div>
			 	 <div class="card-body">
			    <form action="" method="post">
					<div class="form-group">
					    <label for="Nama">Nama Mahasiswa</label>
					    <input type="text" name="Nama" class="form-control" id="Nama" >
					    <small class="form-text text-danger"><?= form_error('Nama'); ?></small>
					</div>

					<div class="form-group">
					    <label for="Nim">NIM</label>
					    <input type="text" name="Nim" class="form-control" id="Nim" >
					    <small class="form-text text-danger"><?= form_error('Nim'); ?></small>
					</div>

					<div class="form-group">
					    <label for="Email">Email Mahasiswa</label>
					    <input type="text" name="Email" class="form-control" id="Email" >
					    <small class="form-text text-danger"><?= form_error('Email'); ?></small>
					</div>

					<div class="form-group">
					    <label for="Jurusan">Jurusan Mahasiswa</label>
					    <select class="form-control" id="Jurusan" name="Jurusan">
					      <option value="Teknik Informatika">Teknik Informatika</option>
					      <option value="Teknik Mesin">Teknik Mesin</option>
					      <option value="Teknik Elektro">Teknik Elektro</option>
					      <option value="Bahasa">Bahasa</option>
					      <option value="Akutansi">Akutansi</option>
					    </select>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				</form>
			  </div>
			</div>

			
		</div>
	</div>
</div>