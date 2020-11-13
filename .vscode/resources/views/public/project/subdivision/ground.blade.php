@extends('public.layouts.index')
@section('content')
<div class="main-visual-header" style="padding-top: 0px;height: 100px;background-color: rgba(7, 65, 76, .5);">
</div>
<img id="zoom_img" class='zoom' src='{{$ground->image}}' width="80%" height="80%" alt='Daisy!' />
<div class="overlay-button-zoom">
    <div class="zoom-box">
        <span class="zoom-out" onclick="zoomout(this)">
            <img src="assets/images/icons/zoom_out.png">
        </span>
        <span class="zoom-in"  onclick="zoomin(this)">
            <img src="assets/images/icons/zoom_in.png">
        </span>
    </div>
</div>
<script src="{!!url('assets/js/image-zoom-click.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function() {
            // Set request
        var ground = {!! json_encode($ground->toArray()) !!};
        let flag = false;
        console.log(ground['image']);
        wheelzoom(document.querySelector('img.zoom'));
    });
</script>
@endsection