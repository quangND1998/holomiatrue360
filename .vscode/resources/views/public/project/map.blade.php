@extends('public.layouts.index')
<script src="{!!url('assets/js/map.js')!!}"></script>
<script src="{!!url('https://maps.googleapis.com/maps/api/js?key=AIzaSyAuN2a5CRtQsP5NUh5TyaGe4fIPtQJ4FuQ&callback=initAutocomplete&libraries=places&v=weekly')!!}" defer></script>
@section('content')
    <input id="pac-input" class="controls" type="text" placeholder="Search Box" />
    <div id="map">abccc</div>
    <script type="text/javascript">
     $(document).ready(function() {
        var map = {!! json_encode($map->toArray()) !!};
        console.log(map);
        var ln = map['latitude'];
        var lg = map['longtitude'];
        // // var lg = <?php echo $map ?>;
        // //  console.log(ln);
        initAutocomplete(ln,lg);
    });
    </script> 

@endsection