<?php

include 'koneksi.php';

if(isset($_GET['tanggal'])){
    
    $tanggale=$_GET['tanggal'];
                                // AMBIL DATA Data terakhir
                                $result = mysqli_query($konek, "select *,
                                (select hum from tbl_hum where id_data=tbl_his.id_data) as hum,
                                (select aqi from tbl_quality where id_data=tbl_his.id_data) as aqi,
                                (select temp from tbl_suhu where id_data=tbl_his.id_data) as temp
                                from tbl_his where tanggal='$tanggale' limit 1");
    
                                $rows=array();
                                $jum=mysqli_num_rows($result);
                                if($jum>0){

                                //buat array utk nampung data
                                $temparray = array();
                                while ($row=mysqli_fetch_assoc($result))
                                {
                                    $temparray[] = $row;
                                }
                                    array_push($rows,array("status"=>"success","data"=>$temparray[0]));
                                }else{
                                    array_push($rows,array("status"=>"fail"));

                            }

                              
    
    //tampilkan json
    echo json_encode($rows[0]);
}else{
                            // AMBIL DATA Data terakhir
                            $result = mysqli_query($konek, "select *,
                            (select hum from tbl_hum where id_data=tbl_his.id_data) as hum,
                            (select aqi from tbl_quality where id_data=tbl_his.id_data) as aqi,
                            (select temp from tbl_suhu where id_data=tbl_his.id_data) as temp
                            from tbl_his order by tanggal desc, jam desc limit 1");

                            //buat array utk nampung data
                            $temparray = array();
                            while ($row=mysqli_fetch_assoc($result))
                            {
                                $temparray[] = $row;
                            }

//tampilkan json
echo json_encode($temparray[0]);
}
