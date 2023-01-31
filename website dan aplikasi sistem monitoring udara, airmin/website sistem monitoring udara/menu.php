<?php
$page = $_GET['page'];


?>
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
                <div class="row layout-top-spacing justify-content-md-center">

                    <?php if ($page == "status") include "./status.php"; ?>
                    <?php if ($page == "grafik") include "./grafik.php"; ?>
                    <?php if ($page == "riwayat") include "./riwayat.php"; ?>


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
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
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


            function tampil_riwayat() {
                var htmldata = "";
                var i;
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'http://127.0.0.1:8000/riwayat',
                    success: function(data) {
                        for (i = 0; i < data.length; i++) {
                            htmldata +=
                                '<tr>' +
                                '<td>' + (parseInt(i) + 1) + '</td>' +
                                '<td>' + data[i].tanggal + '</td>' +
                                '<td>' + data[i].jam + '</td>' +
                                '<td>' + data[i].temp + '</td>' +
                                '<td>' + data[i].hum + '</td>' +
                                '<td>' + data[i].aqi + '</td>' +
                                '</tr>'
                        }
                        $('#show_data').html(htmldata);
                    },
                    error: function(error) {
                        console.log(error);
                    }

                });
            
            }

            tampil_riwayat();
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
</body>

</html>