<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{ asset('backend/') }}/">
    <!-- Site Title -->
    <title>ADMIN DASHBOARD</title>

    <!-- Fav Icon -->
    <link rel="icon" href="img/favicon.png">

    <!-- NFTMax Stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome-all.min.css">
    <link rel="stylesheet" href="css/charts.min.css">
    <link rel="stylesheet" href="css/slickslider.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="body-bg" style="background-image:url('img/body-bg.jpg')">

        @include('admin.body.sidebar')

        @include('admin.body.logout_modal')



        @include('admin.body.header')

        <!-- NFTmax Dashboard -->
        <section class="nftmax-adashboard nftmax-show">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-9 col-12 nftmax-main__column">
                        <div class="nftmax-body">
                            <!-- Dashboard Inner -->
                            <div class="nftmax-dsinner">

                                @yield('admin')
                            </div>
                            <!-- End Dashboard Inner -->
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- End NFTmax Dashboard -->

    </div>

    <!-- Jquery JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slickslider.min.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/countdown.min.js"></script>
    <script src="js/final-countdown.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>
