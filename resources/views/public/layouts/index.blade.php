<!doctype html>
<html class="no-js" lang="en">


<head>
<meta charset="UTF-8">
    <link rel="icon" href="assets/images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="http://vni.pro.vn/true360/gemskyworld/v2/assets/images/general-view/general-view.jpg" />
    <title>Virtual Showroom GemSkyWorld</title>
    <base href="{{ asset('') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,500&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/map.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/image-zoom-ngang.css" />
    <script src="assets/js/jquery-2.2.4.js"></script>

</head>

<body onload="delayLoading()">

    <!-- preloader-end -->

    <!-- Page Content -->
    @yield('content')
        <!-- End Page Content -->
    <!-- main-area-end -->


    <!-- JS here -->
    <script src="assets/js/jquery-2.2.4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- 3deye js -->
    <script src="assets/js/3deye_custom.js"></script>

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/2c1eea7cec.js" crossorigin="anonymous"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126581925-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "UA-126581925-5");
    </script>


    <!-- Browser js -->
    <script src="assets/js/browser.js"></script>


    <!-- <script src="assets/js/image-zoom-click.js"></script> -->
    <!-- Script JS -->
    <script src="assets/js/script.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    
    <script src="assets/js/AR/webcomponents-loader.js"></script>
    <script src="assets/js/AR/intersection-observer.js"></script>
    <script src="assets/js/AR/ResizeObserver.js"></script>
    <script src="assets/js/AR/focus-visible.js"></script>

    <!-- Documentation-specific dependencies: -->
    <script type="module" src="assets/js/AR/dependencies.js"></script>
    <script nomodule src="assets/js/AR/dependencies-legacy.js"></script>

    <!-- Loads <model-viewer> only on modern browsers: -->
    <script type="module" src="assets/js/AR/model-viewer.min.js"></script>
    <script nomodule src="assets/js/AR/model-viewer-legacy.js"></script>
    <script>
        $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
            options.async = true;
        });
    </script>
        <!-- Wheelzoom & image-zoom -->
    <script src="assets/js/wheelzoom.js"></script>
</body>

<!-- Mirrored from themebeyond.com/html/geco/Geco/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Aug 2020 08:18:37 GMT -->

</html>