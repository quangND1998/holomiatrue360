@extends('public.layouts.index')
<script src="{!!url('assets/js/jquery-2.2.4.js')!!}"></script>
@section('content')
<div id="general-view" class="rotate"></div>
<script type="text/javascript">
    $(document).ready(function() {
            // Set request
        var general_view = {!! json_encode($subdivision->toArray()) !!};
        let flag = false;
        console.log(general_view['folder_image']);
        $("#general-view").vc3dEye({
                    imagePath: general_view['folder_image'],
                    totalImages: 59,
                    imageExtension: "jpg",
                    imagePathNight : general_view['folder_image'],
                    imagePathDay : general_view['folder_image']
        });
    });
</script>
@endsection