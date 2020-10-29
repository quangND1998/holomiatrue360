<script src="asset/js/core/jquery.3.2.1.min.js"></script>
<script src="asset/js/core/popper.min.js"></script>
<script src="asset/js/core/bootstrap.min.js"></script>
<script src="asset/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<!-- jQuery UI -->
<script src="asset/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="asset/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
{{-- <script src="asset/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script> --}}

<!-- Moment JS -->
{{-- <script src="asset/js/plugin/moment/moment.min.js"></script> --}}

<!-- Chart JS -->
<script src="asset/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
{{-- <script src="asset/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script> --}}

<!-- Chart Circle -->
<script src="asset/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
{{-- <script src="asset/js/plugin/datatables/datatables.min.js"></script> --}}

<!-- Bootstrap Notify -->
<script src="asset/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

{{-- <!-- Bootstrap Toggle -->
<script src="asset/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script> --}}

<!-- jQuery Vector Maps -->
{{-- <script src="asset/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="asset/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script> --}}

<!-- Google Maps Plugin -->
<script src="asset/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="asset/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="asset/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="asset/js/setting-demo.js"></script>
<script src="asset/js/demo.js"></script>


<!-- Multiselect JS -->

<script src="asset/js/bootstrap-multiselect.js"></script>

<script src="asset/js/ready.js"></script>
{{-- <script src="asset/js/bootstrap-multiselect.js"></script> --}}
<script>
    window._token = '{{ csrf_token() }}';
</script>


@yield('javascript')