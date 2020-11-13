@extends('public.layouts.index')
<script src="{!!url('assets/js/jquery-2.2.4.js')!!}"></script>
@section('content')
    <div class="sample">
        <div id="demo-container-1" class="demo">
            <model-viewer src="{{$model_glb}}" ar ar-modes="webxr scene-viewer quick-look"
                ar-scale="auto"
                auto-rotate camera-controls alt="Sa bàn BĐS ảo"
                skybox-image="/assets/images/hdr/Khonggiangsaban.hdr"
                ios-src="{{$model_usdz}}"
                data-js-focus-visible=""
                ar-status="not-presenting"
                class="model3d">
            </model-viewer>
        </div>
    </div>
@endsection