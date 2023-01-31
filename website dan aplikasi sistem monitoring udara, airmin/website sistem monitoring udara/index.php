<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Final Project </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <script>
	if (typeof(Storage) !== "undefined") {
	    //siiip
	} else {
	    alert("Maaf Browser tidak support! Silahkan update lebih baik");
			window.location.href="https://www.google.com/chrome/";
	}
	if(localStorage.getItem("usernama")===null){
		window.location = "login.php";
	}
	</script>
</head>

<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="index.html" class="nav-link"> AIR MIN </a>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->
    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Monitoring</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            <?php include "./sidebar.php"; ?>
        </div>
        <!--  END SIDEBAR  -->
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing justify-content">

                    <?php include "./status.php";
                    ?>
                    <?php // include "./grafik.php"; 
                    ?>



                    <script src="plugins/apex/apexcharts.min.js"></script>
                    <script type="text/javascript">
                        var grafik_kelembaman = {
                            chart: {
                                height: 350,
                                type: 'area',
                                zoom: {
                                    enabled: false
                                },
                                toolbar: {
                                    show: false,
                                }
                            },
                            // colors: ['#1b55e2'],
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth'
                            },
                            series: [{
                                name: "Desktops",
                                data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                            }],

                            xaxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                            }
                        }

                        var chart = new ApexCharts(
                            document.querySelector("#grafik-kelembaman"),
                            grafik_kelembaman
                        );

                        chart.render();

                        var grafik_kualitasUdara = {
                            chart: {
                                height: 350,
                                type: 'area',
                                toolbar: {
                                    show: false,
                                }
                            },
                            // colors: ['#1b55e2', '#888ea8'],
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth'
                            },
                            series: [{
                                name: 'series1',
                                data: [31, 40, 28, 51, 42, 109, 100]
                            }, {
                                name: 'series2',
                                data: [11, 32, 45, 32, 34, 52, 41]
                            }],

                            xaxis: {
                                type: 'datetime',
                                categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
                            },
                            tooltip: {
                                x: {
                                    format: 'dd/MM/yy HH:mm'
                                },
                            }
                        }


                        var chart = new ApexCharts(
                            document.querySelector("#grafik-kualitas-udara"),
                            grafik_kualitasUdara
                        );

                        chart.render();

                        var grafik_suhu = {
                            chart: {
                                height: 350,
                                type: 'area',
                                toolbar: {
                                    show: false,
                                }
                            },
                            // colors: ['#1b55e2', '#888ea8'],
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth'
                            },
                            series: [{
                                name: 'series1',
                                data: [31, 40, 28, 51, 42, 109, 100]
                            }, {
                                name: 'series2',
                                data: [11, 32, 45, 32, 34, 52, 41]
                            }],

                            xaxis: {
                                type: 'datetime',
                                categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
                            },
                            tooltip: {
                                x: {
                                    format: 'dd/MM/yy HH:mm'
                                },
                            }
                        }


                        var chart = new ApexCharts(
                            document.querySelector("#grafik-suhu"),
                            grafik_suhu
                        );

                        chart.render();
                    </script>
                </div>
            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2022 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">
                        Coded with
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();

            //variabel umum
            var tgljam = document.getElementById("tgljam");
            const today = new Date();
            const yyyy = today.getFullYear();
            let mm = today.getMonth() + 1; // Months start at 0!
            let dd = today.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            const formattedToday = dd + '/' + mm + '/' + yyyy;
            tgljam.innerHTML = formattedToday;
            tgljam.innerHTML = "";

            //panggil geolocation
            var koord = document.getElementById("koordinat");
            var tombol = document.getElementById("tmbrefresh").addEventListener("click", getLokasi);

            function getLokasi() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(liatPosisi);
                } else {
                    koord.innerHTML = "Geolocation gag disupport di browser ini coba ganti Chrome yang baru atau Opera..";
                }
            }

            var suhu;
            var air_quality;
            var humidty;
            var prob_kebakaran = document.getElementById("probabilitas_kebakaran");
            var ic_prob_kebakaran = document.getElementById("ic_probabilitas_kebakaran");
            var stat_prob_kebakaran = document.getElementById("stat_probabilitas_kebakaran");

            var img_kelembapan = document.getElementById("img_kelembapan");
            var stat_kelembapan = document.getElementById("stat_kelembapan");
            var val_kelembapan = document.getElementById("val_kelembapan");
            var img_airc = document.getElementById("img_airc");
            var stat_airc = document.getElementById("stat_airc");
            var val_airc = document.getElementById("val_airc");
            var img_suhu = document.getElementById("img_suhu");
            var stat_suhu = document.getElementById("stat_suhu");
            var val_suhu = document.getElementById("val_suhu");

            function liatPosisi(posisi) {
                koord.innerHTML = "Latitude : " + posisi.coords.latitude + ", Longitude : " + posisi.coords.longitude;
                //skalian panggil API dari http://api.airvisual.com dengan koordinat di atas
                $.get("http://api.airvisual.com/v2/nearest_city?lat=" + posisi.coords.latitude + "&lon=" + posisi.coords.longitude + "&key=d55a37f0-fcdf-4e77-8ac4-50595b1040df", function(data, status) {
                    koord.innerHTML = koord.innerHTML + "<br><h5>" + data.data.city + " , " + data.data.state + "</h5>";

                    suhu = data.data.current.weather.tp;
                    air_quality = data.data.current.pollution.aqius;
                    humidty = data.data.current.weather.hu;

                    //kirim data ke database utk riwayat
                    kirimdata();

                    //status kebakaran
                    if (humidty < 45 && air_quality > 300 && suhu > 29.7) {
                        prob_kebakaran.innerHTML = '<h3 style="color:red;"><b>Status Kemungkinan Kebakaran</b></h3>';
                        ic_prob_kebakaran.innerHTML = '<img src="./assets/img/icon-api-merah.png" alt="api-aman" style="max-width: 200px;" />';
                        stat_prob_kebakaran.innerHTML = '<h5 class="" style="color:red;">Status : Kemungkinan Tinggi Kebakaran</h5>';

                    } else {
                        prob_kebakaran.innerHTML = '<h3 style="color:green;"><b>Status Kemungkinan Kebakaran</b></h3>';
                        ic_prob_kebakaran.innerHTML = '<img src="./assets/img/icon-api-hijau.png" alt="kelembaman-aman" style="max-width: 200px;" />';
                        stat_prob_kebakaran.innerHTML = '<h5 class="" style="color:green;">Status : Kemungkinan Rendah Kebakaran</h5>';
                    }

                    //kelembapan
                    if (humidty >= 45 && humidty <= 65) {
                        img_kelembapan.innerHTML = '<img src="./assets/img/icon-kelembaman-hijau.png" alt="kelembaman-aman" style="max-width: 200px;" />';
                        val_kelembapan.innerHTML = humidty;
                        stat_kelembapan.innerHTML = 'Aman';
                    } else {
                        img_kelembapan.innerHTML = '<img src="./assets/img/icon-kelembaman-merah.png" alt="kelembaman-aman" style="max-width: 200px;" />';
                        val_kelembapan.innerHTML = humidty;
                        stat_kelembapan.innerHTML = 'Bahaya';
                    }

                    //air quality
                    if (air_quality <= 300) {
                        img_airc.innerHTML = '<img src="./assets/img/icon-kelembaman-hijau.png" alt="kelembaman-aman" style="max-width: 200px;" />';
                        val_airc.innerHTML = air_quality;
                        stat_airc.innerHTML = 'Aman';
                    } else {
                        img_airc.innerHTML = '<img src="./assets/img/icon-kelembaman-merah.png" alt="kelembaman-aman" style="max-width: 200px;" />';
                        val_airc.innerHTML = air_quality;
                        stat_airc.innerHTML = 'Bahaya';
                    }

                    //suhu
                    if (suhu < 21.7) {
                        img_suhu.innerHTML = '<img src="./assets/img/icon-suhu-biru.png" alt="kelembaman-aman" style="max-width: 200px;" />';
                        val_suhu.innerHTML = suhu;
                        stat_suhu.innerHTML = 'Dingin';
                    } else if (suhu >= 21.7 && suhu <= 29.7) {
                        img_suhu.innerHTML = '<img src="./assets/img/icon-suhu-hijau.png" alt="kelembaman-aman" style="max-width: 200px;" />';
                        val_suhu.innerHTML = suhu;
                        stat_suhu.innerHTML = 'Normal';
                    } else {
                        img_suhu.innerHTML = '<img src="./assets/img/icon-suhu-merah.png" alt="kelembaman-aman" style="max-width: 200px;" />';
                        val_suhu.innerHTML = suhu;
                        stat_suhu.innerHTML = 'Panas';

                    }

                });
            }

            //panggil fungsi geolocation
            getLokasi();

            //kirim data ke database
            function kirimdata() {
                $.ajax({
                    type: 'POST',
                    url: 'http://127.0.0.1:8000/riwayat',
                    data: JSON.stringify({
                        suhu: suhu,
                        air_quality: air_quality,
                        humidty: humidty
                    }),

                    contentType: "application/json",
                    dataType: "json",
                    success: function(data) {
                        console.log("data terkirim ...");
                    },
                    error: function(error) {
                        console.log(error);
                    }

                });
            }


            //fungsi ubah detik jadi clocks
            function formatTime(seconds) {
                const h = Math.floor(seconds / 3600);
                const m = Math.floor((seconds % 3600) / 60);
                const s = Math.round(seconds % 60);
                return [
                    h,
                    m > 9 ? m : (h ? '0' + m : m || '0'),
                    s > 9 ? s : '0' + s
                ].filter(Boolean).join(':');
            }

            //waktu mundur untuk ambil data
            var myTimer;

            function clock() {
                myTimer = setInterval(myClock, 1000);
                var detikawal = 300; //ganti waktu sesuai jumlah detik auto request
                var c = detikawal;


                function myClock() {
                    document.getElementById("waktuget").innerHTML = formatTime(--c);
                    if (c == 0) {
                        getLokasi();
                        c = detikawal;
                        // clearInterval(myTimer);
                    }
                }
            }

            clock();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>

    <script src="plugins/apex/custom-apexcharts.js"></script>

    <script>

    </script>
</body>

</html>