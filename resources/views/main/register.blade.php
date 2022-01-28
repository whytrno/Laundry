<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart">
    <meta name="keywords" content="Multikart">
    <meta name="author" content="Multikart">
    <link rel="manifest" href="./manifest.json">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <title>Multikart PWA App</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="assets/images/favicon.png">
    <meta name="theme-color" content="#ff4c3b" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="multikart">
    <meta name="msapplication-TileImage" content="assets/images/favicon.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick.css">

    <!-- iconly css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/iconly.css">

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="assets/css/style.css">

</head>

<body onload="getLocation();">

    <!-- loader strat -->
    <div class="loader">
        <span></span>
        <span></span>
    </div>
    <!-- loader end -->


    <!-- top design start -->
    <img src="assets/images/design.svg" class="img-fluid design-top" alt="">
    <!-- top design end -->


    <!-- top bar start -->
    <div class="topbar-section">
        <a href="index.html"><img src="assets/images/logo.png" class="img-fluid" alt=""></a>
        <a class="skip-cls" href="index.html">SKIP</a>
    </div>
    <!-- top bar end -->

    <!-- login section start -->
    <section class="form-section px-15 top-space section-b-space">
        <h1>Hey, <br>Sign Up</h1>
        <form class="registerForm" >
            @csrf
            <div class="form-floating mb-4">
                <input type="text" name="full_name" class="form-control" id="one" placeholder="Nama lengkap">
                <label for="one">Nama lengkap</label>
            </div>
            <div class="form-floating mb-4">
                <input type="email" name="email" class="form-control" id="two" placeholder="Email">
                <label for="two">Email</label>
            </div>
            <div class="form-floating mb-4">
                <input type="number" name="phone" class="form-control" id="two" placeholder="No. Hp">
                <label for="two">No. Hp</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" name="address" class="form-control" id="two" placeholder="Alamat">
                <label for="two">Alamat</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" name="lat" class="form-control" id="two" placeholder="Alamat">
                <label for="two">Latitude</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" name="long" class="form-control" id="two" placeholder="Alamat">
                <label for="two">Longitude</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" name="password" id="txtPassword" class="form-control" placeholder="password">
                <label>Password</label>
                <div id="btnToggle" class="password-hs">
                    <i id="eyeIcon" class="iconly-Hide icli hide"></i>
                </div>
            </div>
            <a href="#" class="btn btn-solid w-100">Sign UP</a>
        </form>
        <div class="or-divider">
            <span>Or sign in with</span>
        </div>
        <div class="social-auth">
            <ul>
                <li>
                    <a href="#"><img src="assets/images/social/google.png" class="img-fluid" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="assets/images/social/fb.png" class="img-fluid" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="assets/images/social/apple.png" class="img-fluid" alt=""></a>
                </li>
            </ul>
        </div>
        <div class="bottom-detail text-center mt-3">
            <h4 class="content-color">Already have an Account? <a class="title-color text-decoration-underline"
                    href="login.html">Sign In</a></h4>
        </div>
    </section>
    <!-- login section end -->

    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->

    <script type="text/javascript">
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else { 
                console.log("Geolocation is not supported by this browser.");
            }
        }
        function showPosition(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            document.querySelector('.registerForm input[name = "lat"]').value = lat;
            document.querySelector('.registerForm input[name = "long"]').value = long;
        }
        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                alert("Mohon nyalakan GPS anda");
                location.reload();
                break; 
            }
        }
    </script>

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick.js"></script>

    <!-- password hide show js -->
    <script src="assets/js/password-hs.js"></script>

    <!-- Filter js -->
    <script src="assets/js/filter.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>

</body>

</html>