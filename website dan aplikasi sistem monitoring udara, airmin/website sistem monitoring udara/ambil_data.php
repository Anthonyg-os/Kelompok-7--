<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$json = file_get_contents('http://api.airvisual.com/v2/city?city=Jakarta&state=Jakarta&country=Indonesia&key=75651a84-d24c-43af-bc40-cfb84c905ea8');
$data = json_decode($json,true);
    //echo "<pre>";
    //print_r($data);

// Temp - Air Quality - Humidity
$tanggal = date('d-m-Y');
$jam = date("H:00:00");
//$jam = "20:00:00";
$suhu = $data['data']['current']['weather']['tp'];
$air_quality = $data['data']['current']['pollution']['aqius'];
$humidty=  $data['data']['current']['weather']['hu'];
//$suhu = 100;
//$air_quality = 200;
//$humidty=  20;


//// AMBIL DATA Data di Jam
$result = mysqli_query($konek, "SELECT * FROM tbl_his
                                        LEFT JOIN tbl_hum ON tbl_his.id_data = tbl_hum.id_data
                                        LEFT JOIN tbl_suhu ON tbl_his.id_data = tbl_suhu.id_data
                                        LEFT JOIN tbl_quality ON tbl_his.id_data = tbl_quality.id_data
                                        WHERE tbl_his.jam = '$jam' AND tbl_his.tanggal = '$tanggal' ");

if ($row=mysqli_fetch_assoc($result))
{
//    echo  " ADA DATA - TIDAK BISA  TAMBAH";
    // pass
}
else {
//    echo  "TIDAK ADA DATA -BISA  TAMBAH";
    // TAMBAH DATA
    $tmbh_his = mysqli_query($konek, "INSERT INTO `tbl_his`(`id_data`, `tanggal`, `jam`) VALUES ('NULL','$tanggal','$jam') ");
    $cek_idData = mysqli_query($konek, "SELECT MAX(`id_data`) AS id_data FROM tbl_his ");
    $id_data_sekarang = 0;
    if ($row=mysqli_fetch_assoc($cek_idData)) $id_data_sekarang = $row['id_data'];
//    echo $id_data_sekarang;


    $tmbh_temp = mysqli_query($konek, "INSERT INTO `tbl_suhu`(`id_data`, `temp`) VALUES ('$id_data_sekarang','$suhu') ");
    $tmbh_hum = mysqli_query($konek, "INSERT INTO `tbl_hum`(`id_data`, `hum`) VALUES ('$id_data_sekarang','$humidty') ");
    $tmbh_aqi = mysqli_query($konek, "INSERT INTO `tbl_quality`(`id_data`, `aqi`) VALUES ('$id_data_sekarang','$air_quality') ");

//    echo "AMAN";
}

?>