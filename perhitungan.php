<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan</title>
    <link href="css/perhitungan.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>PERHITUNGAN</strong></div>
                <div class="panel-body" style="border: 1px solid #e7e7e7;">
                <?php
                $query_aspek = "SELECT * FROM pm_aspek";
                $sql_aspek = mysqli_query($koneksi, $query_aspek);
                if (mysqli_num_rows($sql_aspek) > 0) {
                    while ($row_aspek = mysqli_fetch_array($sql_aspek)) {
                        ?>
                        <div class="panel panel-default">
                            <!-- MAPPING ALTERNATIF -->
                            <div class="panel-heading">Aspek <strong><?= $row_aspek['aspek']; ?></strong></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" style="border: 0px;">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelamar</th>
                                            <?php
                                                $query = "SELECT * FROM pm_faktor WHERE id_aspek = ". $row_aspek['id_aspek'];
                                                $sql = mysqli_query($koneksi, $query);
                                                if (mysqli_num_rows($sql) > 0) {
                                                    while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                            <th><?=$row['faktor'];?></th>
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
                                            <td><?=$row['nama'];?></td>
                                            <?php
                                                $query_value = "SELECT A.id_alternatif, A.nama as nama_alternatif, B.id_faktor_nilai, B1.nama, B1.nilai, C.id_faktor, C.faktor, C.target, C.type, D.* 
                                                FROM master_alternatif A 
                                                JOIN pm_sample B on A.id_alternatif = B.id_alternatif 
                                                JOIN pm_faktor_nilai B1 ON B.id_faktor_nilai = B1.id_faktor_nilai 
                                                JOIN pm_faktor C on B1.id_faktor = C.id_faktor 
                                                JOIN pm_aspek D on C.id_aspek = D.id_aspek 
                                                WHERE C.id_aspek = ".$row_aspek['id_aspek']." AND A.id_alternatif = ".$row['id_alternatif']." ORDER BY C.id_faktor ASC";
                                                $sql_value = mysqli_query($koneksi, $query_value);
                                                if (mysqli_num_rows($sql_value) > 0) {
                                                    while ($row_value = mysqli_fetch_array($sql_value)) {
                                            ?>
                                                <td><?=$row_value['nilai'];?></td>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nilai Kriteria</th>
                                            <?php
                                                $query = "SELECT A.id_faktor, B.nilai FROM pm_faktor A 
                                                JOIN pm_faktor_nilai B ON A.id_faktor = B.id_faktor AND A.target = B.id_faktor_nilai  
                                                WHERE id_aspek = ". $row_aspek['id_aspek']." 
                                                ORDER BY A.id_faktor ASC";

                                                $sql = mysqli_query($koneksi, $query);
                                                if (mysqli_num_rows($sql) > 0) {
                                                    while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                            <td class="text-primary"><?=$row['nilai'];?></td>
                                            <?php }} ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- PERHITUNGAN GAP -->
                            <div class="panel-body">Perhitungan pemetaan gap <strong></strong>:</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" style="border: 0px;">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelamar</th>
                                            <?php
                                                $query = "SELECT * FROM pm_faktor WHERE id_aspek = ". $row_aspek['id_aspek'];
                                                $sql = mysqli_query($koneksi, $query);
                                                if (mysqli_num_rows($sql) > 0) {
                                                    while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                            <th><?=$row['faktor'];?></th>
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
                                            <td><?=$row['nama'];?></td>
                                            <?php
                                                $query_value = "SELECT A.id_alternatif, A.nama as nama_alternatif, B.id_faktor_nilai, B1.nama, B1.nilai, C.id_faktor, C.faktor, C1.nilai AS target, C.type, D.* 
                                                FROM master_alternatif A 
                                                JOIN pm_sample B on A.id_alternatif = B.id_alternatif 
                                                JOIN pm_faktor_nilai B1 ON B.id_faktor_nilai = B1.id_faktor_nilai 
                                                JOIN pm_faktor C on B1.id_faktor = C.id_faktor 
                                                JOIN pm_faktor_nilai C1 ON C.id_faktor = C1.id_faktor AND C.target = C1.id_faktor_nilai 
                                                JOIN pm_aspek D on C.id_aspek = D.id_aspek 
                                                WHERE C.id_aspek = ".$row_aspek['id_aspek']." AND A.id_alternatif = ".$row['id_alternatif']." ORDER BY C.id_faktor ASC";
                                                // print_r($query_value);
                                                // die();
                                                $sql_value = mysqli_query($koneksi, $query_value);
                                                if (mysqli_num_rows($sql_value) > 0) {
                                                    while ($row_value = mysqli_fetch_array($sql_value)) {
                                            ?>
                                                <td><?=$row_value['nilai'] - $row_value['target'];?></td>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- PEMBOBOTAN GAP -->
                            <div class="panel-body">Pembobotan gap <strong></strong>:</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" style="border: 0px;">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelamar</th>
                                            <?php
                                                $query = "SELECT * FROM pm_faktor WHERE id_aspek = ". $row_aspek['id_aspek'];
                                                $sql = mysqli_query($koneksi, $query);
                                                if (mysqli_num_rows($sql) > 0) {
                                                    while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                            <th><?=$row['faktor'];?></th>
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
                                            <td><?=$row['nama'];?></td>
                                            <?php
                                                $query_value = "SELECT A.id_alternatif, A.nama as nama_alternatif, B.id_faktor_nilai, B1.nama, B1.nilai, C.id_faktor, C.faktor, C1.nilai AS target, C.type, D.* 
                                                FROM master_alternatif A 
                                                JOIN pm_sample B on A.id_alternatif = B.id_alternatif 
                                                JOIN pm_faktor_nilai B1 ON B.id_faktor_nilai = B1.id_faktor_nilai 
                                                JOIN pm_faktor C on B1.id_faktor = C.id_faktor 
                                                JOIN pm_faktor_nilai C1 ON C.id_faktor = C1.id_faktor AND C.target = C1.id_faktor_nilai 
                                                JOIN pm_aspek D on C.id_aspek = D.id_aspek 
                                                WHERE C.id_aspek = ".$row_aspek['id_aspek']." AND A.id_alternatif = ".$row['id_alternatif']." ORDER BY C.id_faktor ASC";
                                                // print_r($query_value);
                                                // die();
                                                $sql_value = mysqli_query($koneksi, $query_value);
                                                if (mysqli_num_rows($sql_value) > 0) {
                                                    while ($row_value = mysqli_fetch_array($sql_value)) {
                                                        $selisih = $row_value['nilai'] - $row_value['target'];
                                                        $query = "SELECT * FROM pm_bobot WHERE selisih = ". $selisih;
                                                        $sql = mysqli_query($koneksi, $query);
                                                        $bobot = mysqli_fetch_assoc($sql);

                                            ?>
                                                <td><?=$bobot['bobot'];?></td>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- PERHITUNGAN FAKTOR -->
                            <div class="panel-body">Perhitungan faktor <strong></strong>:</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" style="border: 0px;">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelamar</th>
                                            <?php
                                                $query = "SELECT * FROM pm_faktor WHERE id_aspek = ". $row_aspek['id_aspek'];
                                                $sql = mysqli_query($koneksi, $query);
                                                if (mysqli_num_rows($sql) > 0) {
                                                    while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                            <th><?=$row['faktor'];?></th>
                                            <?php }} ?>
                                            <th>NCF</th>
                                            <th>NSF</th>
                                            <th>Total</th>
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
                                            <td><?=$row['nama'];?></td>
                                            <?php
                                                $nilai_cf = 0;
                                                $nilai_nsf = 0;
                                                $query_value = "SELECT A.id_alternatif, A.nama as nama_alternatif, B.id_faktor_nilai, B1.nama, B1.nilai, C.id_faktor, C.faktor, C1.nilai AS target, C.type, D.* 
                                                FROM master_alternatif A 
                                                JOIN pm_sample B on A.id_alternatif = B.id_alternatif 
                                                JOIN pm_faktor_nilai B1 ON B.id_faktor_nilai = B1.id_faktor_nilai 
                                                JOIN pm_faktor C on B1.id_faktor = C.id_faktor 
                                                JOIN pm_faktor_nilai C1 ON C.id_faktor = C1.id_faktor AND C.target = C1.id_faktor_nilai 
                                                JOIN pm_aspek D on C.id_aspek = D.id_aspek 
                                                WHERE C.id_aspek = ".$row_aspek['id_aspek']." AND A.id_alternatif = ".$row['id_alternatif']." ORDER BY C.id_faktor ASC";
                                                $sql_value = mysqli_query($koneksi, $query_value);
                                                if (mysqli_num_rows($sql_value) > 0) {
                                                    $count_cf = 0;
                                                    $count_sf = 0;
                                                    while ($row_value = mysqli_fetch_array($sql_value)) {
                                                        $selisih = $row_value['nilai'] - $row_value['target'];
                                                        $query = "SELECT * FROM pm_bobot WHERE selisih = ". $selisih;
                                                        $sql = mysqli_query($koneksi, $query);
                                                        $bobot = mysqli_fetch_assoc($sql);
                                                        if($row_value['type'] == "core") {
                                                            $count_cf++;
                                                            $nilai_cf += $bobot['bobot']; 
                                                        } else {
                                                            $count_sf++;
                                                            $nilai_nsf += $bobot['bobot'];
                                                        }

                                            ?>
                                                <td><?=$bobot['bobot'];?></td>
                                            <?php
                                                }
                                            }
                                            $ncf = $nilai_cf / $count_cf; 
                                            $nsf = $nilai_nsf / $count_sf;
                                            $total = ($row_aspek['bobot_core']/100) * $ncf + $row_aspek['bobot_secondary']/100 * $nsf;
                                            ?>

                                            <!-- CARI NCF NSF TOTAL-->
                                            <td><?=$nilai_cf;?> / <?=$count_cf;?> = <b><?=$ncf;?></b> </td>
                                            <td><?=$nilai_nsf;?> / <?=$count_sf;?> = <b><?=$nsf;?></b> </td>
                                            <td><?=$total;?></td>

                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <?php
                                                $query = "SELECT * FROM pm_faktor WHERE id_aspek = ". $row_aspek['id_aspek']." ORDER BY id_faktor ASC";
                                                $sql = mysqli_query($koneksi, $query);
                                                if (mysqli_num_rows($sql) > 0) {
                                                    while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                            <td class="text-primary"><?=$row['type'];?></td>
                                            <?php }} ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                        </div>
                    <?php 
                    }
                }
                ?>
            </div>
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>HASIL AKHIR</strong></div>
                <div class="panel-body" style="border: 1px solid #e7e7e7;">
                    <div class="panel panel-default">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Pelamar</th>
                                        <?php
                                            $query = "SELECT * FROM pm_aspek";
                                            $sql = mysqli_query($koneksi, $query);
                                            if (mysqli_num_rows($sql) > 0) {
                                                while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                            <th><?=$row['aspek'];?></th>
                                        <?php }} ?>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $pelamar_data = array();
                                        $query_pelamar = "SELECT * FROM master_alternatif";
                                        $sql_pelamar = mysqli_query($koneksi, $query_pelamar);
                                        if (mysqli_num_rows($sql_pelamar) > 0) {
                                            while ($row = mysqli_fetch_array($sql_pelamar)) {
                                                $nama_alternatif = $row['nama'];
                                                $hasil = 0;
                                    ?>
                                        <tr>
                                            <td><?=$nama_alternatif;?></td>
                                            <?php
                                                $query_pek = "SELECT * FROM pm_aspek";
                                                $sql_pek = mysqli_query($koneksi, $query_pek);
                                                if (mysqli_num_rows($sql_pek) > 0) {
                                                    while ($row_pek = mysqli_fetch_array($sql_pek)) {
                                                        $nilai_cf = 0;
                                                        $nilai_nsf = 0;
                                                        $query_value = "SELECT A.id_alternatif, A.nama as nama_alternatif, B.id_faktor_nilai, B1.nama, B1.nilai, C.id_faktor, C.faktor, C1.nilai AS target, C.type, D.* 
                                                        FROM master_alternatif A 
                                                        JOIN pm_sample B on A.id_alternatif = B.id_alternatif 
                                                        JOIN pm_faktor_nilai B1 ON B.id_faktor_nilai = B1.id_faktor_nilai 
                                                        JOIN pm_faktor C on B1.id_faktor = C.id_faktor 
                                                        JOIN pm_faktor_nilai C1 ON C.id_faktor = C1.id_faktor AND C.target = C1.id_faktor_nilai 
                                                        JOIN pm_aspek D on C.id_aspek = D.id_aspek 
                                                        WHERE C.id_aspek = ".$row_pek['id_aspek']." AND A.id_alternatif = ".$row['id_alternatif']." ORDER BY C.id_faktor ASC";
                                                        $sql_value = mysqli_query($koneksi, $query_value);
                                                        $count_cf = 0;
                                                        $count_sf = 0;
                                                        if (mysqli_num_rows($sql_value) > 0) {
                                                            while ($row_value = mysqli_fetch_array($sql_value)) {
                                                                $selisih = $row_value['nilai'] - $row_value['target'];
                                                                $query = "SELECT * FROM pm_bobot WHERE selisih = ". $selisih;
                                                                $sql = mysqli_query($koneksi, $query);
                                                                $bobot = mysqli_fetch_assoc($sql);
                                                                if($row_value['type'] == "core") {
                                                                    $count_cf++;
                                                                    $nilai_cf += $bobot['bobot']; 
                                                                } else {
                                                                    $count_sf++;
                                                                    $nilai_nsf += $bobot['bobot'];
                                                                }

                                                            }
                                                        }
                                                        $ncf = $nilai_cf / $count_cf; 
                                                        $nsf = $nilai_nsf / $count_sf;
                                                        // $total_bobot = 0.6 * $ncf + 0.4 * $nsf;
                                                        $total_bobot = ($row_pek['bobot_core']/100) * $ncf + $row_pek['bobot_secondary']/100 * $nsf;
                                                        $hasil += $row_pek['prosentase'] / 100 * $total_bobot;
                                                        
                                                    ?>
                                                    <td><?=$total_bobot;?></td>
                                                    <?php
                                                    }
                                                }
                                                 $pelamar_data[] = array(
                                                    'nama_alternatif' => $nama_alternatif,
                                                    'hasil' => $hasil
                                                );
                                                ?>
                                            <td><?=$hasil;?></td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    
                        <div class="panel-body">Ranking Hasil <strong></strong>:</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Alternatif</th>
                                            <th>Total</th>
                                            <th>Ranking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        // Mengurutkan data pelamar berdasarkan hasil total
                                        usort($pelamar_data, function($a, $b) {
                                            return $b['hasil'] > $a['hasil'];
                                        });

                                        // Menampilkan data pelamar dengan ranking
                                        foreach ($pelamar_data as $index => $pelamar) {
                                        ?>
                                            <tr>
                                                <td><?=$pelamar['nama_alternatif'];?></td>
                                                <td><?=$pelamar['hasil'];?></td>
                                                <td><?= $index + 1; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="btnPrint">Print</button>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").click(function () {
            var divContents = $("body").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
</body>
</html>
