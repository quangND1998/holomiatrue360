@extends('public.layouts.index')
@section('content')

<div id="general-view"></div>

<div class="overlay"></div>

<div id="render">
    <iframe src="" frameborder="0"></iframe>
</div>

<section class="contact">
    <p class="contact__title">Virtual Showroom by VNi</p>
    <a href="tel:0868577199" class="contact__phone">
        <img src="assets/images/icons/phone.png" alt="icon phone" class="contact__icon">
        <span class="contact__text">Hotline {{$project->info->phone}}</span>
    </a>
</section>

<nav class="action-box">
    <ul class="action">
        <li class="action__item home"><img class="action__icon" src="assets/images/icons/home.png" alt="icon home"></li>
        <li class="action__item info"><img class="action__icon" src="assets/images/icons/info.png" alt="icon info"></li>
        <li class="action__item video"><img class="action__icon" src="assets/images/icons/video.png" alt="icon video"></li>
        <li class="action__item rotate"><img class="action__icon" src="assets/images/icons/rotate.png" alt="icon rotate"></li>
        <li class="action__item music"><img class="action__icon" src="assets/images/icons/music_on.png" alt="icon music"></li>
        <li class="action__item setting"><img class="action__icon" src="assets/images/icons/setting.png" alt="icon setting">
            <ul class="sub-action">
                <li class="sub-action__item">
                    <a class="sub-action__link" href="http://vni.pro.vn/" target="_blank">Brochure</a>
                </li>
                <li class="sub-action__item">
                <a class="sub-action__link" href="{{$project->info->link_register}}" target="_blank">Register to receive infomation</a>
                </li>
                <li class="sub-action__item">
                    <a class="sub-action__link" href="#">Screenshoot</a>
                </li>
                <li class="sub-action__item">
                    <a class="sub-action__link" href="#">Fullscreen</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<section class="menu-bottom">
    <div class="select-box">
        <select class="select__item select__area select__showflat">
            <option selected value="0">--Chọn tầng--</option>
            @foreach ($project->showflat as $item)
        <option value="{{$item->folder_flat}}">{{$item->title}}</option>
            @endforeach
        </select>
        <select class="select__item select__area select__arena">
            <option selected value="0">--Chọn phân khu--</option>
            @foreach ($project->subdivision as $sub)
                <option value="{{$sub->id}}">{{$sub->title}}</option>
            @endforeach
        </select>
        @foreach ($project->subdivision as $sub)
        <select class="select__item select__view select__ground ground_{{$sub->id}}">
                <option selected value="0" selected>--Chọn mặt bằng--</option>
                @foreach ($sub->ground as $ground)
                    <option value="{{$ground->id}}">{{$ground->title}}</option>
                @endforeach
            </select>
        @endforeach
        <select class="select__item select__view select__showflat_2">
            <option selected value="0">--Chọn tầng--</option>
            @foreach ($project->showflat as $item)
        <option value="{{$item->folder_flat}}">{{$item->title}}</option>
            @endforeach
        </select>
    </div>
    <ul class="menu">
        <li class="menu__item general-view active-item"><img src="assets/images/icons/building.png" alt="icon building" class="menu__icon"><span class="menu__text">General view</span></li>
        <li class="menu__item area"><img src="assets/images/icons/area.png" alt="icon area" class="menu__icon"><span class="menu__text">Area</span></li>
        <li class="menu__item show-flat"><img src="assets/images/icons/interior.png" alt="icon interior" class="menu__icon"><span class="menu__text">Show flat</span></li>
        <li class="menu__item amentites"><img src="assets/images/icons/amentites.png" alt="icon amentites" class="menu__icon"><span class="menu__text">Amentites</span></li>
        <li class="menu__item map"><img src="assets/images/icons/map.png" alt="icon map" class="menu__icon"><span class="menu__text">Map</span></li>
    </ul>
    <nav class="nav nav-pills nav-fill">
        <a class="nav-item nav-link general-view active" href="#"><img src="assets/images/icons/building.png" alt="icon building" class="menu__icon"><span class="menu__text">General view</span></a>
        <a class="nav-item nav-link area" href="#"><img src="assets/images/icons/area.png" alt="icon area" class="menu__icon"><span class="menu__text">Area</span></a>
        <a class="nav-item nav-link show-flat" href="#"><img src="assets/images/icons/interior.png" alt="icon interior" class="menu__icon"><span class="menu__text">Show flat</span></a>
        <a class="nav-item nav-link amentites" href="#"><img src="assets/images/icons/amentites.png" alt="icon amentites" class="menu__icon"><span class="menu__text">Amentites</span></a>
        <a class="nav-item nav-link map" href="#"><img src="assets/images/icons/map.png" alt="icon map" class="menu__icon"><span class="menu__text">Map</span></a>
    </nav>
</section>

<section class="option-box">
    <div class="option__list">
        <a  id="view_ar_pc"><img class="option__icon" src="assets/images/icons/view_ar.png" alt="icon ar"></a>
        <a href="{{$data->model_ar->model_usdz}}" rel="ar" id="view_ar_ios">
            <img class="view_img" src="assets/images/icons/view_ar.png" />
        </a>
        <a id="view_ar_android" href="intent://arvr.google.com/scene-viewer/1.0?file={{$data->model_ar->model_usdz}}?v=1595214315933#Intent;scheme=https;package=com.google.android.googlequicksearchbox;action=android.intent.action.VIEW;S.browser_fallback_url=https://developers.google.com/ar;end;">
            <img class="view_img" src="assets/images/icons/view_ar.png" />
        </a>
        <ul>
            <li class="option__item option__day active-item">Day</li>
            <li class="option__item option__night">Night</li>
            <li class="option__item option__present">Present</li>
        </ul>
    </div>
    <p class="option__text">Illustrating images</p>
</section>

<section class="wrap-carousel">
    <div class="carousel__header">
    <p class="carousel__title">{{$project->title}}</p>
        <p class="carousel__website">Website:
        <a class="carousel__link" href="{{$project->info->link_website}}" target="_blank">{{$project->info->link_website}}</a>
        </p>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/carousel/1.jpg" class="d-block w-100" alt="img">
            </div>
            <div class="carousel-item">
                <img src="assets/images/carousel/2.jpg" class="d-block w-100" alt="img">
            </div>
            <div class="carousel-item">
                <img src="assets/images/carousel/3.jpg" class="d-block w-100" alt="img">
            </div>
            <div class="carousel-item">
                <img src="assets/images/carousel/4.jpg" class="d-block w-100" alt="img">
            </div>
            <div class="carousel-item">
                <img src="assets/images/carousel/5.jpg" class="d-block w-100" alt="img">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section class="wrap-gallery">
    <p class="title">Amentites of project</p>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active tab-360" href="#">Ảnh 360<sup>o</sup></a>
        </li>
        <li class="nav-item">
            <a class="nav-link tab-2D" href="#">Ảnh phối cảnh</a>
        </li>
    </ul>
    <div class="gallery" id="gallery"></div>
</section>

<section class="show-img">
    <img src="" alt="">
    <div class="close" title="Close">
        <span><i class="fas fa-times-circle"></i></i></span>
    </div>
</section>

<section class="icon-swipe">
    <img src="assets/images/icons/swipe.png" alt="icon swipe">
</section>

<section class="icon-loading">
    <img src="assets/images/icons/loading.gif" alt="">
</section>
<script type="text/javascript">
    $(document).ready(function() {
            // Set request
        var project = {!! json_encode($project->toArray()) !!};
        var general_view ={!! json_encode($data->toArray()) !!};
        var info = {!! json_encode($info->toArray()) !!};
        let flag = false;
        console.log(project);
        $("#general-view").vc3dEye({
                    imagePath: general_view['folder_img_day'],
                    totalImages: 59,
                    imageExtension: "jpg",
                    imagePathNight : general_view['folder_img_night'],
                    imagePathDay : general_view['folder_img_day']
        });
        $(".option__present").click(function() {
                    $("#render iframe").attr("src", general_view['folder_present_image']);
                    $("#render").fadeIn();
                });
        $(".map").click(function() {
            $(".ground").hide();
            $(".overlay").fadeOut();
            $(".option-box").fadeOut();
            $(".select-box").fadeOut();
            $(".wrap-gallery").fadeOut();
            $(".wrap-carousel").fadeOut();
            $(".show-img").fadeOut();
            $("#render").fadeIn();
            console.log("project/" + project['title'] + "/map");
            $("#render iframe").attr("src", "project/" + project['title'] + "/map");
        });
            // ----- Option events ------
            $(".option__icon").click(function() {
                flag = !flag;
                if (flag) {
                    // $(this).parent().siblings().fadeOut();
                    $("#render iframe").attr("src","project/" + project['title'] + "/generalview/" + general_view['id'] + "/modelar");
                    $("#render").fadeIn();
                    $(".menu__item").removeClass("active-item");
                    $(".option__item").removeClass("active-item");
                } else {
                    $(this).parent().siblings().not("a").fadeIn()
                    $("#render iframe").attr("src","project/" + project['title'] + "/generalview/" + general_view['id'] + "/modelar");
                    $("#render").fadeIn();
                    $(".general-view").addClass("active-item");
                    $(".option__day").addClass("active-item");
                }
            });
            function loadShowFlat(link) {
                $("#render").show();
                $("#render iframe").attr("src", link);
            }
            $(".select__area.select__showflat").change(function() {
                $(".option-box").fadeOut();
                selected = $(this).children("option:selected").val();
                if (selected != null) {
                    loadShowFlat(selected);
                }else{
                    $(".select__item").hide();
                    $(".select__area.select__showflat").show();
                }
            });
            $(".select__area.select__arena").change(function() {
                $(".option-box").fadeOut();
                $('.select__ground').val('0');
                selected = $(this).children("option:selected").val();
                if (selected > 0) {
                    $("#render").show();
                    $("#render iframe").attr("src", "project/" + project['title'] + "/subdivisionview/" + selected );
                    console.log(selected);
                    // $(".ground_" + selected ).fadeIn();
                    $(".select__view").fadeOut();
                    $(`.ground_${selected}`).fadeIn();
                }else{
                    $(".select__item").hide();
                    $(".select__area.select__arena").show();
                }
            });
             $(".select__ground").change(function() {
                selected = $(this).children("option:selected").val();
                console.log(selected);
                $('.select__showflat_2').val('0');
                $(".overlay").fadeIn();
                $('.select__showflat_2').hide();
                if (selected > 0) {
                    $("#render").show();
                    $("#render iframe").attr("src", "project/" + project['title'] + "/ground/" + selected );

                    $('.select__showflat_2').fadeIn();
                }else{
                    // $(".select__item").hide();
                    // $(".select__area.select__arena").show();
                    // $(".select__area.select__ground").show();
                }
            });
            $(".select__showflat_2").change(function() {
                $(".option-box").fadeOut();
                selected = $(this).children("option:selected").val();
                console.log(selected);
                if (selected != null) {
                    loadShowFlat(selected);
                }else{
                    // $(".select__item").hide();
                    // $(".select__area.select__floor1").show();
                }
            });
            $(".video").click(function() {
                $(".overlay").fadeOut();
                $(".ground").hide();
                $(".menu-bottom").fadeOut();
                $(".option-box").fadeOut();
                $(".wrap-carousel").fadeOut();
                $(".wrap-gallery").fadeOut();
                $(".show-img").fadeOut();
                $("#render").fadeIn();
                $("#render iframe").attr("src", info['link_film']);
                reset_selectbox();
            });

      });

</script>

@endsection
