<div class="container">
		<h2 align="center" style="margin: 30px;">Tambah Data Alternatif</h2>
		<form method="POST" action="tambah_alternatif_action.php">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="nama" id="nama" class="form-control" required="true">
					</div>
					<div class="form-group">
						<button type="submit" name="simpan" id="simpan" class="btn btn-primary">
							<i class="fa fa-save"></i> Simpan
						</button>

						<button type="submit" name="simpan" id="simpan" class="btn btn-danger" >
							<a href="home.php?page=alternatif" style="color:white;text-decoration: none; "></i>Batal</a>
						</button>
					</div>
				</div>
			</div>
		</form>
    </div>