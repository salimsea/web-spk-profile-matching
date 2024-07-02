<div class="container">
		<h2 align="center" style="margin: 30px;">Tambah Data Sub Kriteria</h2>
		<form method="POST" action="tambah_sub_kriteria_action.php">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<div class="form-group">
						<label>Faktor Penilaian</label>
						<select name="id_faktor" id="id_faktor" class="form-control" required="true">
							<option value="">Pilih Salah Satu</option>
							<?php
								$query = "SELECT * FROM pm_faktor";
								$sql = mysqli_query($koneksi, $query);
								if (mysqli_num_rows($sql) > 0) {
									while ($row = mysqli_fetch_array($sql)) {
							?>
								<option value="<?=$row['id_faktor'];?>"><?=$row['faktor'];?></option>
							<?php } } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" id="nama" class="form-control" required="true">
					</div>
					<div class="form-group">
						<label>Nilai</label>
						<input type="number" name="nilai" id="nilai" class="form-control" required="true">
					</div>
					<div class="form-group">
						<button type="submit" name="simpan" id="simpan" class="btn btn-primary">
							<i class="fa fa-save"></i> Simpan
						</button>

						<button type="submit" name="simpan" id="simpan" class="btn btn-danger" >
							<a href="home.php?page=subkriteria" style="color:white;text-decoration: none; "></i>Batal</a>
						</button>
					</div>
				</div>
			</div>
		</form>
    </div>