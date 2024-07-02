<div class="container">
		<a href="home.php?page=tambah_alternatif">
			<button style="margin-bottom: 20px;" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </button>
		</a>

		<table id="example" class="table table-striped table-bordered" style="width:100%">
	    	<thead>
	    		<tr>
	    			<td>No</td>
	    			<td>Nama Alternatif</td>
	    			<td>Action</td>
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM master_alternatif ORDER BY id_alternatif ASC";
			        $master_pelamar = $koneksi->prepare($query);
			        $master_pelamar->execute();
			        $res1 = $master_pelamar->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {
				        	$id = $row['id_alternatif'];
				        	$nama = $row['nama'];
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $nama; ?></td>
						<td>
							<a href="home.php?page=edit_alternatif&aa=<?php echo base64_encode($id) ?>">
								<button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </button>
							</a>
							<a href="hapus_alternatif.php?aa=<?php echo base64_encode($id) ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
								<button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus </button>
							</a>
						</td>
					</tr>
			    <?php } } else { ?> 
				    <tr>
				    	<td colspan='7'>Tidak ada data ditemukan</td>
				    </tr>
			    <?php } ?>
	    	</tbody>
	    </table>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>