<?php
// include 'ambil_data.php';
?>

<!--                        <div class="col-lg-6 layout-spacing ">-->
<!--                            <div class="statbox widget box box-shadow text-center"  >-->
<!--                                <div class="widget-header">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">-->
<!--                                            <h3><b>Status Kemungkinan Kebakaran</b></h3>-->
<!--                                        </div>-->
<!--                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">-->
<!--                                            <img src="./assets/img/icon-api-hijau.png" alt="api-aman" style="max-width: 200px;" />-->
<!--                                            <hr><br>-->
<!--                                        </div>-->
<!--                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">-->
<!--                                            <h5 class="" style="">Status : Tidak Aman</h5>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="widget-content widget-content-area">-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<div class="col-lg-12 layout-spacing ">
    <div class="statbox widget box box-shadow text-center">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <h3 style="color:green;"><b>Tanggal Data Di Ambil : <span id="tgljam"></span> </b></h3>
                </div>
                <div class="col-sm-12">
                    <div id="koordinat" class="small" style="margin:20px; text-align:center; ">Koordinat belum ditemukan ...</div>
                    <div class="btn btn-sm btn-success" id="tmbrefresh">Ambil data ulang : <span id="waktuget" class=" text-info mt-3"></span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 layout-spacing ">
    <div class="statbox widget box box-shadow text-center">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <span id="probabilitas_kebakaran"></span>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <span id="ic_probabilitas_kebakaran"></span>
                    <hr><br>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <span id="stat_probabilitas_kebakaran"></span>
                    <div class="well well-sm bg-info small m-4 text-white p-3">Status kemungkinan kebakaran:<br>
                        Kemungkinan rendah kebakaran(kelembapan > 45, status kualitas udara <=300, status suhu < 29,7 derajat celcius)<br>
                            Kemungkinan tinggi kebakaran(kelembapan < 45, status kualitas udara>300, status suhu >29,7 derajat celcius)<br>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

        </div>
    </div>
</div>


<div class="col-lg-4 layout-spacing">
    <div class="statbox widget box box-shadow text-center">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <h3><b>Status Kelembaman</b></h3>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <span id="img_kelembapan"></span>
                    <!-- <span style="font-size: 80px; margin-top: 20px;" class="m-5"> 90%</span> -->
                    <hr><br>
                </div>

                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <!-- <h5> 90%</h5> <br> -->
                    <h5>Value : <span id="val_kelembapan"></span></h5>
                    <h5>Status : <span id="stat_kelembapan"></span></h5>

                    <div class="well well-sm bg-info small m-4 text-white p-3">
                        Aman (45-65)<br>
                        Bahaya (<45 dan>65)
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

        </div>
    </div>
</div>
<div class="col-lg-4 layout-spacing">
    <div class="statbox widget box box-shadow text-center">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <h3><b>Status Kualitas Udara</b></h3>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <span id="img_airc"></span>

                    <!-- <span style="font-size: 80px; margin-top: 20px;" class="m-5"> 90%</span> -->
                    <hr><br>
                </div>

                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <!-- <h5> 90%</h5> <br> -->
                    <h5>Value : <span id="val_airc"></span></h5>
                    <h5>Status : <span id="stat_airc"></span></h5>

                    <div class="well well-sm bg-info small m-4 text-white p-3">
                        Aman (<=300)<br>
                            Bahaya (>300)

                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

        </div>
    </div>
</div>
<div class="col-lg-4 layout-spacing">
    <div class="statbox widget box box-shadow text-center">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <h3><b>Status Suhu</b></h3>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <span id="img_suhu"></span>
                    <!-- <span style="font-size: 80px; margin-top: 20px;" class="m-5"> 90%</span> -->
                    <hr><br>
                </div>

                <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                    <!-- <h5> 90%</h5> <br> -->
                    <h5>Value : <span id="val_suhu"></span></h5>
                    <h5>Status : <span id="stat_suhu"></span></h5>

                    <div class="well well-sm bg-info small m-4 text-white p-3">
                        Normal (21,7 &#8451; - 29,7  &#8451;) <br>
                        Dingin (<21,7 &#8451;) <br>
                            Panas (>29,7 &#8451;)

                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

        </div>
    </div>
</div>