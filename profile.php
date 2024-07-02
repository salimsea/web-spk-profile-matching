    <form class="form-kecerdasan" method="post" action="" role="form">
    <div class="card mb-6 shadow-sm">
      <div class="card-header">
         <div class="col-6">
            <select class="custom-select d-block w-50" id="aspek" name="aspek" required>
              <option value="">Pilih Aspek... </option>
              <?php
                  $query = "SELECT * FROM pm_aspek";
                  $sql = mysqli_query($koneksi, $query);
                  if (mysqli_num_rows($sql) > 0) {
                      while ($row = mysqli_fetch_array($sql)) {
              ?>
                <option value="<?=$row['id_aspek'];?>" <?php echo $_REQUEST['aspek'] == $row['aspek'] ? "selected=selected" : "";?>><?=$row['aspek'];?></option>
              <?php } } ?>
            </select>
         </div>
      </div>
      <div class="card-body">
          <div class="container">
                <?php
                    if (isset($_POST['savearray'])) {
                        $id_pelamar = $_POST['id_alternatif'];
                        $id_aspek = $_POST['id_aspek'];
                        $id_faktor = $_POST['id_faktor'];
                        $values = $_POST['id_faktor_nilai'];
                        
                        for ($i = 0; $i < count($id_pelamar); $i++) {
                            $id_p = $id_pelamar[$i];
                            $id_f = $id_faktor[$i];
                            $id_a = $id_aspek[$i];
                            $val = $values[$i];
                            
                            $query_sample = "SELECT * FROM pm_faktor_nilai A join pm_faktor B on A.id_faktor = B.id_faktor WHERE A.id_faktor_nilai=$val and A.id_faktor=$id_f and B.id_aspek=$id_a";
                            // print_r($query_sample);
                            // die();
                            $sql_sample = mysqli_query($koneksi, $query_sample);
                            $data_sample = mysqli_fetch_assoc($sql_sample);
                            if($data_sample != null) {
                                 $query = "DELETE FROM pm_sample 
                                          WHERE id_faktor_nilai IN (
                                              SELECT A.id_faktor_nilai
                                              FROM pm_faktor_nilai A
                                              JOIN pm_faktor B ON A.id_faktor = B.id_faktor
                                              WHERE A.id_faktor=$id_f 
                                              AND B.id_aspek=$id_a
                                          )";
                                mysqli_query($koneksi, $query);
                                //  print_r("kadieu".$data_sample);
                                // die();
                              }
                        }

                        for ($i = 0; $i < count($id_pelamar); $i++) {
                            $id_p = $id_pelamar[$i];
                            // $id_f = $id_faktor[$i];
                            $val = $values[$i];

                            $query_sample = "SELECT * FROM pm_sample WHERE id_alternatif=$id_p";
                            $sql_sample = mysqli_query($koneksi, $query_sample);
                            $data_sample = mysqli_fetch_assoc($sql_sample);
                            if($val != 0) {
                                $query = "INSERT INTO pm_sample (id_alternatif, id_faktor_nilai) VALUES ('$id_p', '$val')";
                                mysqli_query($koneksi, $query);
                              }
                          }
                        echo "<script>alert('Proses Profile Matching Tersimpan');location='home.php?page=profile';</script>";
                    }
                    $query = "SELECT * FROM pm_aspek";
                    $sql = mysqli_query($koneksi, $query);
                    if (mysqli_num_rows($sql) > 0) {
                        while ($row_aspek = mysqli_fetch_array($sql)) {
                ?>
                    <div id="spninactive_<?=$row_aspek['id_aspek'];?>" style="display:none;">
                         <form method="POST" action="#">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Pelamar</th>
                                        <?php
                                        $query1 = "SELECT * FROM pm_faktor WHERE id_aspek = " . $row_aspek['id_aspek'];
                                        $sql1 = mysqli_query($koneksi, $query1);
                                        if (mysqli_num_rows($sql1) > 0) {
                                            while ($row1 = mysqli_fetch_array($sql1)) {
                                        ?>
                                            <th><?= $row1['faktor']; ?></th>
                                        <?php }} ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_pelamar = "SELECT * FROM master_alternatif";
                                    $sql_pelamar = mysqli_query($koneksi, $query_pelamar);
                                    if (mysqli_num_rows($sql_pelamar) > 0) {
                                        while ($row = mysqli_fetch_array($sql_pelamar)) {
                                    ?>
                                    <tr>
                                        <td><?= $row['nama']; ?></td>
                                        <?php
                                        $query2 = "SELECT * FROM pm_faktor WHERE id_aspek = " . $row_aspek['id_aspek'];
                                        $sql2 = mysqli_query($koneksi, $query2);
                                        if (mysqli_num_rows($sql2) > 0) {
                                            while ($row2 = mysqli_fetch_array($sql2)) {
                                                $quer3 = "SELECT * FROM pm_sample A join pm_faktor_nilai B on A.id_faktor_nilai = B.id_faktor_nilai WHERE B.id_faktor=$row2[id_faktor] and A.id_alternatif=$row[id_alternatif]";
                                                $sql3 = mysqli_query($koneksi, $quer3);
                                                $data3 = mysqli_fetch_assoc($sql3);
                                                $nilai = 0;
                                                if($data3){
                                                    $nilai = $data3['id_faktor_nilai'];
                                                } 
                                        ?>
                                            <td>
                                                <input type="hidden" name="id_alternatif[]" value="<?= $row['id_alternatif']; ?>">
                                                <input type="hidden" name="id_faktor[]" value="<?= $row2['id_faktor']; ?>">
                                                <input type="hidden" name="id_aspek[]" value="<?= $row_aspek['id_aspek']; ?>">
                                                <select class="custom-select d-block w-100" name="id_faktor_nilai[]">
                                                    <option value="0" <?= $nilai == 0 ? "selected" : ""; ?>>Pilih Salah Satu</option>
                                                    <?php
                                                        $query4 = "SELECT * FROM pm_faktor_nilai WHERE id_faktor = " . $row2['id_faktor'];
                                                        $sql4 = mysqli_query($koneksi, $query4);
                                                        if (mysqli_num_rows($sql4) > 0) {
                                                            while ($row4 = mysqli_fetch_array($sql4)) {
                                                    ?>
                                                        <option value="<?=$row4['id_faktor_nilai'];?>" <?= $row4['id_faktor_nilai'] == $nilai ? "selected" : ""; ?>><?=$row4['nilai'];?> - <?=$row4['nama'];?></option>
                                                    <?php }} ?>
                                                </select>
                                            </td>
                                        <?php }} ?>
                                       
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <button class="btn btn-success" type="submit" id="savearray" name="savearray">Simpan</button>
                        </form>
                    </div>
                <?php } } ?>

           </div>
          </div>
      </div>
    </div>
    </form>
  <script src="js/jquery-1.12.4.min.js"></script>
  <script>
   $(document).ready(function() {
      var ddlTxt = $("#aspek option:selected").val();
      $("#spninactive_" + ddlTxt).show();

      $("#aspek").on("change", function() {
        var ddlTxt = $("#aspek option:selected").val();
        $(".container div").hide();
        $("#spninactive_" + ddlTxt).show();
      });

  });
  </script>