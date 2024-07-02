<div class="container">
		<h2 align="center" style="margin: 30px;">Edit Data Alternatif</h2>
		<?php
			// data difilter terlebih dahulu & base64_decode berguna untuk mendeskripsi id yg sebelumnya di enkripsi/encoding
			$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['aa']) ,ENT_QUOTES)));

			$query = "SELECT * FROM master_alternatif WHERE id_alternatif=?";
	        $pelamar = $koneksi->prepare($query);
	        $pelamar->bind_param("i", $id);
	        $pelamar->execute();
	        $res1 = $pelamar->get_result();
	        while ($row = $res1->fetch_assoc()) {
	        	$id = $row['id_alternatif'];
	            $nama = $row['nama'];
	        }
		?>
		<form method="POST" action="edit_alternatif_action.php">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<div class="form-group">
						<label>Nama Alternatif</label>
						<input type="hidden" name="id_alternatif" id="id_alternatif" value="<?php echo $id; ?>">
						<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama; ?>" required="true">
					</div>
					<div class="form-group">
						<button type="submit" name="simpan" id="simpan" class="btn btn-primary">
							<i class="fa fa-save"></i> Simpan
						</button>
						<button type="button" name="simpan" id="simpan" class="btn btn-danger" >
							<a href="home.php?page=alternatif" style="color:white;text-decoration: none; "></i>Batal</a>
						</button>
					</div>
				</div>
			</div>
		</form>
    </div>