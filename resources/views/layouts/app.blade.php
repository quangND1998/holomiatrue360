<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>True 360 platform</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="asset/img/favicon.ico" type="image/x-icon" />
    <base href="{{ asset('') }}">
    <!-- Fonts and icons -->
    <script src="asset/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['asset/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/azzara.min.css">
   

    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link rel="stylesheet" href="asset/css/demo.css"> --}}
     <!-- Style CSS Files -->
      <link rel="stylesheet" href="asset/css/style.css">
      <link rel="stylesheet" href="asset/css/chosen.css">
      <link rel="stylesheet" href="asset/css/dropzone.css">
</head>

<body>
    <div class="wrapper">
       
        @include('partials.topbar1')
        @include('partials.sidebar1')

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    @yield('content')
                 </div>
             </div>
        </div>
        <!-- Custom template | don't include it in your project! -->
        {{-- <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Topbar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeMainHeaderColor" data-color="blue"></button>
                            <button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="green"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="red"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="flaticon-settings"></i>
            </div>
        </div> --}}
        <!-- End Custom template -->
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="asset/js/core/jquery.3.2.1.min.js"></script>
    <script src="asset/js/core/popper.min.js"></script>
    <script src="asset/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="asset/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="asset/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="asset/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="asset/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    {{-- <script src="asset/js/plugin/chart.js/chart.min.js"></script> --}}

    <!-- jQuery Sparkline -->
  <script src="asset/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="asset/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="asset/js/plugin/datatables/datatables.min.js"></script> 

    <!-- Bootstrap Notify -->
    <script src="asset/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="asset/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="asset/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="asset/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script> 
    <!-- Google Maps Plugin -->
    {{-- <script src="asset/js/plugin/gmaps/gmaps.js"></script> --}}

    <!-- Sweet Alert -->
    <script src="asset/js/plugin/sweetalert/sweetalert.min.js"></script>

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/2c1eea7cec.js" crossorigin="anonymous"></script>

    <!-- Azzara JS -->
    <script src="asset/js/ready.min.js"></script>
    <script src="asset/js/chosen.jquery.js"></script>

    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="asset/js/setting-demo.js"></script>
    <script src="asset/js/demo.js"></script>
   <script type="text/javascript">
    $(document).ready(function() {
       $(".chosen-select").chosen(
       );
	});
</script>
</body>

</html>