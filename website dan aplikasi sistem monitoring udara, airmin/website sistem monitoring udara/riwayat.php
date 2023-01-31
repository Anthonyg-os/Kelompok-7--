<?php include 'koneksi.php';?>
<div class="col-lg-12 layout-spacing ">
    <div class="statbox widget box box-shadow text-center"  >
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <h3 style="color:red;"><b>Riwayat Sistem Monitoring</b></h3>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center ">
                    <div class="table-responsive ">
                        <table class="table table-bordered mb-4 ">
                            <thead>
                            <tr>

                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Temperatur</th>
                                <th>Kelembapan Udara</th>
                                <th>Indeks Kualitas Udara</th>

                            </tr>
                            </thead>
                            <tbody id="show_data">

                            <?php
                            /*
                            // AMBIL DATA Data
                            $result = mysqli_query($konek, "SELECT * FROM tbl_his 
                                        LEFT JOIN tbl_hum ON tbl_his.id_data = tbl_hum.id_data 
                                        LEFT JOIN tbl_suhu ON tbl_his.id_data = tbl_suhu.id_data 
                                        LEFT JOIN tbl_quality ON tbl_his.id_data = tbl_quality.id_data");
                            $x = 1;
                            while ($row=mysqli_fetch_assoc($result))
                            {
//                                print_r($row);
                                echo '
                                 <tr>
                                    <td>'.$x++.'</td>
                                    <td>'.$row['tanggal'].'</td>
                                    <td>'.$row['jam'].'</td>
                                    <td>'.$row['temp'].'</td>
                                    <td>'.$row['hum'].'</td>
                                    <td>'.$row['aqi'].'</td>
                                </tr>
                                ';
                                    //    echo "$row[0] $row[1] $row[2] $row[3] $row[4]";
                                    //    echo "<br />";
                            }
                            */
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

        </div>
    </div>
</div>


<script>
   
</script>
                        