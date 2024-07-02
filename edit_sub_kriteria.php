<div class="container">
		<h2 align="center" style="margin: 30px;">Edit Data Kriteria</h2>
		<?php
			// data difilter terlebih dahulu & base64_decode berguna untuk mendeskripsi id yg sebelumnya di enkripsi/encoding
			$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['aa']) ,ENT_QUOTES)));

			$query = "SELECT * FROM pm_faktor_nilai WHERE id_faktor_nilai=?";
	        $Kriteria = $koneksi->prepare($query);
	        $Kriteria->bind_param("i", $id);
	        $Kriteria->execute();
	        $res1 = $Kriteria->get_result();
	        while ($row = $res1->fetch_assoc()) {
	        	$id = $row['id_faktor_nilai'];
	            $id_faktor = $row['id_faktor'];
	            $nama = $row['nama'];
	            $nilai = $row['nilai'];
	        }
		?>
		<form method="POST" action="edit_sub_kriteria_action.php">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<div class="form-group">
						<label>Faktor</label>
						<input type="text" name="id_faktor_nilai" id="id_faktor_nilai" value="<?php echo $id; ?>">
						<select name="id_faktor" id="id_faktor" class="form-control" required="true">
                            <?php
								$query = "SELECT * FROM pm_faktor";
								$sql = mysqli_query($koneksi, $query);
								if (mysqli_num_rows($sql) > 0) {
									while ($row = mysqli_fetch_array($sql)) {
							?>
								<option value="<?=$row['id_faktor'];?>" <?php if ($id_faktor == $row['id_faktor']){ echo "selected"; } ?>><?=$row['faktor'];?></option>
							<?php } } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama; ?>" required="true">
					</div>
					<div class="form-group">
						<label>Nilai</label>
						<input type="number" name="nilai" id="nilai" class="form-control" value="<?php echo $nilai; ?>" required="true">
					</div>
					
					<div class="form-group">
						<button type="submit" name="simpan" id="simpan" class="btn btn-primary">
							<i class="fa fa-save"></i> Simpan
						</button>
						<button type="button" name="simpan" id="simpan" class="btn btn-danger" >
							<a href="home.php?page=subkriteria" style="color:white;text-decoration: none; "></i>Batal</a>
						</button>
					</div>
				</div>
			</div>
		</form>
    </div>