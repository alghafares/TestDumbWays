<div class="container" >
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
			  <div class="card-header">
			    Form ubah Data Mahasiswa
			  </div>
			 	 <div class="card-body">
			    <form action="" method="post">
			    	<input type="hidden" name="Id" name="Id" value="<?= $mahasiswa['Id']; ?>">


					<div class="form-group">
					    <label for="Nama">Nama Mahasiswa</label>
					    <input type="text" name="Nama" class="form-control" id="Nama" value="<?= $mahasiswa['Nama'] ?>">
					    <small class="form-text text-danger"><?= form_error('Nama'); ?></small>
					</div>

					<div class="form-group">
					    <label for="Nim">NIM</label>
					    <input type="text" name="Nim" class="form-control" id="Nim" value="<?= $mahasiswa['Nim'] ?>">
					    <small class="form-text text-danger"><?= form_error('Nim'); ?></small>
					</div>

					<div class="form-group">
					    <label for="Email">Email Mahasiswa</label>
					    <input type="text" name="Email" class="form-control" id="Email" value="<?= $mahasiswa['Email'] ?>">
					    <small class="form-text text-danger"><?= form_error('Email'); ?></small>
					</div>

					<div class="form-group">
					    <label for="Jurusan">Jurusan Mahasiswa</label>
					    <select class="form-control" id="Jurusan" name="Jurusan">
					      <?php foreach ($Jurusan as $j): ?>
					      	<?php if ($j == $mahasiswa['Jurusan']) :?>
					      	<option value="<?= $j; ?>" selected><?= $j; ?></option>
					      	<?php else : ?>
					      		<option value="<?= $j; ?>"><?= $j; ?></option>
					      	<?php endif; ?>
					      <?php endforeach; ?>
					    </select>
					</div>
					<button type="submit" name="ubah" class="btn btn-primary float-right">ubah Data</button>
				</form>
			  </div>
			</div>

			
		</div>
	</div>
</div>