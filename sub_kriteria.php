<div class="container">
		<a href="home.php?page=tambah_sub_kriteria">
			<button style="margin-bottom: 20px;" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </button>
		</a>

		<table id="example" class="table table-striped table-bordered" style="width:100%">
	    	<thead>
	    		<tr>
	    			<td>No</td>
	    			<td>Nama</td>
	    			<td>Faktor</td>
	    			<td>Nilai</td>
	    			<td>Action</td>
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM pm_faktor_nilai a LEFT join pm_faktor b on a.id_faktor = b.id_faktor ORDER BY a.id_faktor ASC, a.nilai ASC";
			        $pm_faktor = $koneksi->prepare($query);
			        $pm_faktor->execute();
			        $res1 = $pm_faktor->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {
				        	$id = $row['id_faktor_nilai'];
				        	$nama = $row['nama'];
				            $faktor = $row['faktor'];
				            $nilai = $row['nilai'];
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $faktor; ?></td>
						<td><?php echo $nama; ?></td>
						<td><?php echo $nilai; ?></td>
						<td>
							<!-- base64_encode berguna untuk enkripsi id jadi nanti akan mengubah urlnya menjadi tulisan acak -->
							<a href="home.php?page=edit_sub_kriteria&aa=<?php echo base64_encode($id) ?>">
								<button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </button>
							</a>
							<a href="hapus_sub_kriteria.php?aa=<?php echo base64_encode($id) ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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