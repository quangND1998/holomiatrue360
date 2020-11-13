$(function() {

    let selected, flag = false;
    let width = $(window).width();
    let active_general_view = false,
        active_arena = false,
        active_show_flat = false,
        active_amentites = false,
        active_map = false;

    $("#general-view").mousedown(function() {
        $(".icon-swipe").fadeOut();
    });


    // ----- Action events ------
    $(".action__item:not(:first, :last)").click(function() {
        $(this).toggleClass("active-item");
        $(this).siblings().removeClass("active-item");
    });

    $(".home").click(function() {
        $(".menu-bottom").fadeIn();
        $(".option-box").fadeIn();
        $(".overlay").fadeOut();
        $("#render").fadeOut();
        $(".wrap-carousel").fadeOut();
        $(".wrap-gallery").fadeOut();
        $(".select__item").fadeOut();
        $(".show-img").fadeOut();
        $(this).siblings().removeClass("active-item");
        $(".menu__item").removeClass("active-item");
        $(".option__item").removeClass("active-item");
        $(".general-view").addClass("active-item");
        $(".option__day").addClass("active-item");
        reset_selectbox();
    });


    $(".info").click(function() {
        $(".select__item").fadeOut();
        $(".wrap-gallery").fadeOut();
        $(".show-img").fadeOut();
        $(".overlay").fadeIn();
        $(".menu-bottom").fadeIn();
        $(".option-box").fadeIn();
        // $(".overlay").fadeToggle("slow");
        // $(".wrap-carousel").fadeToggle("slow");
        $(".wrap-carousel").fadeIn();
        $("#render").fadeOut();
        $(".menu__item").removeClass("active-item");
        reset_selectbox();
    });


    // ----- Menu events ------

    $(".menu__item").click(function() {
        $(this).addClass("active-item");
        $(this).siblings().removeClass("active-item");
    });

    $(".nav-pills .nav-link").click(function() {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
    });

    $(".general-view").click(function() {
        active_general_view = false;
        active_arena = false;
        active_show_flat = false;
        active_amentites = false;
        active_map = false;
        $("#render").fadeOut();
        $(".overlay").fadeOut();
        $(".select-box").fadeOut();
        $(".wrap-gallery").fadeOut();
        $(".show-img").fadeOut();
        $(".option-box").fadeIn();
        // reset_selectbox();
    });

    $(".area").click(function() {
        active_general_view = false;
        active_arena = !active_arena;
        active_show_flat = false;
        active_amentites = false;
        active_map = false;
        console.log(active_arena);
        if (active_arena == true) {
            $(".overlay").fadeOut();
            $(".option-box").fadeOut();
            $(".wrap-gallery").fadeOut();
            $(".show-img").fadeOut();
            // $(".select__item").fadeOut();
            $(".select-box").fadeIn();
            // $(".select__area").empty();
            $(".select__arena").fadeIn();
            $(".select__showflat").hide();

        } else {
            $(".select-box").fadeOut();
        }
        // reset_selectbox();
    });

    $(".show-flat").click(function() {
        active_general_view = false;
        active_arena = false;
        active_show_flat = !active_show_flat;
        active_amentites = false;
        active_map = false;
        console.log(active_arena);
        if (active_show_flat == true) {
            $(".overlay").fadeOut();
            $(".option-box").fadeOut();
            $(".select__floor2").fadeOut();
            $(".wrap-gallery").fadeOut();
            $(".show-img").fadeOut();
            $(".ground").fadeOut();
            $(".select__view").hide();
            $(".select__ground").hide();
            $(".select-box").fadeIn();
            $(".select__showflat").fadeIn();
            $(".select__arena").hide();
        } else {
            $(".select-box").fadeOut();
        }
    });

    $(".amentites").click(function() {
        active_general_view = false;
        active_arena = false;
        active_show_flat = false;
        active_amentites = !active_amentites;
        active_map = false;
        console.log(active_amentites);
        if (active_amentites == true) {
            $(".option-box").fadeOut();
            $("#render").fadeOut();
            $(".option-box").fadeOut();
            $(".select-box").fadeOut();
            $(".wrap-carousel").fadeOut();
            $(".overlay").fadeIn();
            $(".wrap-gallery").fadeIn();
            $(".action__item").removeClass("active-item");
        } else {
            $(".select-box").fadeOut();
        }
    });

    $(".map").click(function() {
        active_general_view = false;
        active_arena = false;
        active_show_flat = false;
        active_amentites = false;
        active_map = false;
    });

    // ----- Select box change ------
    // $(".select__area.select__floor1").change(function() {
    //     $(".option-box").fadeOut();
    //     selected = $(this).children("option:selected").val();
    //     switch (selected) {
    //         case "1":
    //             $("#render").show();
    //             $("#render iframe").attr("src", "assets/pano-tour/showflat/1stFloor/walking-tour/index.html");
    //             break;
    //         case "2":
    //             $("#render iframe").attr("src", "assets/pano-tour/showflat/2ndFloor/walking-tour/index.html");
    //             break;
    //         case "north":
    //             $("#render").show();
    //             $("#render iframe").attr("src", "north-area.html");
    //             $(".select__view").empty();
    //             $(".select__view").fadeIn();
    //             $(".select__view").append(`
    //                 <option value="">--Chọn mục--</option>
    //                 <option value="north-2D">Mặt bằng 2D</option>
    //                 <option value="north-AR">Sa bàn ảo</option>
    //             `);
    //             break;
    //         case "south":
    //             $("#render").show();
    //             $("#render iframe").attr("src", "south-area.html");
    //             $(".select__view").empty();
    //             $(".select__view").fadeIn();
    //             $(".select__view").append(`
    //                 <option value="">--Chọn mục--</option>
    //                 <option value="south-2D">Mặt bằng 2D</option>
    //                 <option value="south-AR">Sa bàn ảo</option>
    //             `);
    //             break;
    //         default:
    //             $(".select__item").hide();
    //             $(".select__area.select__floor1").show();
    //             break;
    //     }
    // });



    // $(".select__view").change(function() {
    //     selected = $(this).children("option:selected").val();
    //     switch (selected) {
    //         case "north-AR":
    //             $("#render").show();
    //             $("#render iframe").attr("src", "ar_web_NA.html");
    //             break;
    //         case "north-2D":
    //             $(".select__ground").empty();
    //             $(".select__ground").append(`
    //                 <option value="n">--Chọn mặt bằng--</option>
    //                 <option value="n1">Mặt bằng đơn lập</option>
    //                 <option value="n2">Mặt bằng liền kề</option>
    //                 <option value="n3">Mặt bằng ShopHouse 1</option>
    //                 <option value="n4">Mặt bằng ShopHouse 2</option>
    //                 <option value="n5">Mặt bằng song lập</option>
    //             `);
    //             $(".select__ground").show();
    //             break;
    //         case "south-AR":
    //             $("#render").show();
    //             $("#render iframe").attr("src", "ar_web_SA.html");
    //         case "south-2D":
    //             $(".select__ground").empty();
    //             $(".select__ground").append(`
    //                 <option value="n">--Chọn mặt bằng--</option>
    //                 <option value="s1">Mặt bằng đơn lập</option>
    //                 <option value="s2">Mặt bằng liền kề</option>
    //                 <option value="s3">Mặt bằng ShopHouse 1</option>
    //                 <option value="s4">Mặt bằng ShopHouse 2</option>
    //                 <option value="s5">Mặt bằng song lập</option>
    //             `);
    //             $(".select__ground").show();
    //             break;
    //         default:
    //             $(".select__ground").hide();
    //             $(".select__floor2").hide();
    //             $(".ground").hide();
    //             break;
    //     }
    // });

    // $(".select__ground").change(function() {
    //     selected = $(this).children("option:selected").val();
    //     $(".overlay").fadeIn();
    //     switch (selected) {
    //         case "n":
    //             $(".select__floor2").hide();
    //             $(".ground").hide();
    //             break;
    //         case "n1":
    //             $("#render").show();
    //             $("#render").append(`
    //                 <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_DonLap.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png ">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();

    //             break;
    //         case "n2":
    //             $("#render").append(`
    //                 <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_LIENKE.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png ">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();
    //             break;
    //         case "n3":
    //             $("#render").append(`
    //                  <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_SHOPHOUSE1.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png ">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();
    //             break;
    //         case "n4":
    //             $("#render").append(`
    //                 <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_SHOPHOUSE2.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png ">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();
    //             break;
    //         case "n5":
    //             $("#render").append(`
    //                  <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_SONGLAP.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png ">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();
    //             break;
    //         case "s1":
    //             $("#render").append(`
    //                 <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_DonLap.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png ">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();
    //             break;
    //         case "s2":
    //             $("#render").append(`
    //                 <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_LIENKE.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png ">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();
    //             break;
    //         case "s3":
    //             $("#render").append(`
    //                  <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_SHOPHOUSE1.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png ">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();
    //             break;
    //         case "s4":
    //             $("#render").append(`
    //                  <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_SHOPHOUSE2.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();
    //             break;
    //         case "s5":
    //             $("#render").append(`
    //                  <div class="ground">
    //                     <img class="zoom  ground__img" src="assets/images/north-area/ground2D/LT_MB_SONGLAP.jpg" />
    //                     <div class="ground__zoom-box">
    //                         <span class="ground__zoom ground__zoom-out" onclick="zoomout(this)">
    //                             <img src="assets/images/icons/zoom_out.png">
    //                         </span>
    //                         <span class="ground__zoom ground__zoom-in" onclick="zoomin(this)">
    //                             <img src="assets/images/icons/zoom_in.png ">
    //                         </span>
    //                     </div>
    //                 </div>
    //             `);
    //             $(".select__floor2").fadeIn();
    //             break;
    //         default:
    //             break;
    //     };
    //     wheelzoom(document.querySelectorAll('img.zoom'));
    //     $(".select__floor2").empty();
    //     $(".select__floor2").append(`
    //         <option value="">--Chọn tầng--</option>
    //         <option value="1">Tầng 1</option>
    //         <option value="2">Tầng 2</option>
    //     `);
    // });

    // $(".select__floor2").change(function() {
    //     $(".overlay").fadeOut();
    //     selected = $(this).children("option:selected").val();
    //     if (selected === "1") {
    //         $(".ground").fadeOut();
    //         $("#render iframe").attr("src", "assets/pano-tour/showflat/1stFloor/walking-tour/index.html");
    //     } else if (selected === "2") {
    //         $(".ground").fadeOut();
    //         $("#render iframe").attr("src", "assets/pano-tour/showflat/2ndFloor/walking-tour/index.html");
    //     } else {
    //         return false;
    //     }
    // });

    // ----- Option events ------
    // $(".option__icon").click(function() {
    //     flag = !flag;
    //     if (flag) {
    //         $(this).parent().siblings().fadeOut();
    //         // $("#render iframe").attr("src", "ar_web.html");
    //         $("#render").fadeIn();
    //         $(".menu__item").removeClass("active-item");
    //         $(".option__item").removeClass("active-item");
    //     } else {
    //         $(this).parent().siblings().not("a").fadeIn()
    //         $("#render iframe").attr("src", "index.html");
    //         $("#render").fadeIn();
    //         $(".general-view").addClass("active-item");
    //         $(".option__day").addClass("active-item");
    //     }
    // });

    $(".option__item").click(function() {
        $(this).addClass("active-item");
        $(this).siblings().removeClass("active-item");
    });

    // $(".option__present").click(function() {
    //     $("#render iframe").attr("src", "assets/images/general-view/present/1/tour.html");
    //     $("#render").fadeIn();
    // });

    // ----- overlay event -----
    $(".overlay").click(function() {
        $(this).hide();
        $(".wrap-carousel").fadeOut();
        $(".wrap-gallery").fadeOut();
        $(".show-img").fadeOut();
        $(".menu__item").removeClass("active-item");
        $(".general-view").addClass("active-item");
    });

    // ---- Close event ----
    $(".close").click(function() {
        $(".show-img").fadeOut();
        $(".wrap-gallery").fadeIn();
    });



    // ----- Render image in gallery ------
    let panos = [
        { id: 1, title: "Tổng thể ngày" },
        {
            id: 2,
            title: "Tổng thể đêm",
            bsClass: ""
        },
        { id: 3, title: "Cổng Nam" },
        { id: 4, title: "Cổng Bắc" },
        { id: 5, title: "Đại lộ vàng" },
        {
            id: 6,
            title: "Đại lộ vàng (đêm)"
        },
        { id: 7, title: "Bình minh" },
        { id: 8, title: "Hoàng hôn" },
        { id: 9, title: "Công viên SkyPark" },
        { id: 10, title: "Quảng trường SkyPark" },
        { id: 11, title: "Đu quay SkyPark" },
        { id: 12, title: "Adventure Forest" },
        { id: 13, title: "Trường học" },
        { id: 14, title: "Công viên khu dân cư" },
        { id: 15, title: "Nhà liền kề" },
        { id: 16, title: "Biệt thự song lập" },
        { id: 17, title: "Biệt thự đơn lập" }
    ];

    let images = [
        { id: 1, title: "Club House" },
        {
            id: 2,
            title: "Cổng chào GEMSKYWORLD"
        },
        { id: 3, title: "Cổng chào phía Bắc" },
        { id: 4, title: "Công viên SkyPark" },
        { id: 5, title: "Dãy ShopHouse" },
        {
            id: 6,
            title: "Định vị"
        },
        { id: 7, title: "Liền kề 05A" },
        { id: 8, title: "Nhà liền kề" },
        { id: 9, title: "Liền kề 05B" },
        { id: 10, title: "Sân chơi Adventure" },
        { id: 11, title: "Sân chơi leo núi" },
        { id: 12, title: "Sân chơi trẻ em" },
        { id: 13, title: "Sân khấu công viên" },
        { id: 14, title: "Shophouse 1" },
        { id: 15, title: "Tổng thể đêm" },
        { id: 16, title: "Tổng thể ngày" },
        { id: 17, title: "Trục đại lộ vàng" }
    ];


    $(".nav-link").click(function() {
        $(this).addClass("active");
        $(this).parent().siblings().children().removeClass("active");
    });

    panos.forEach(pano => {
        $("#gallery").append(`
                <div id="scene_${pano.id}" class="gallery__item pos-${pano.id}" onclick="loadScene(this.id)">
                    <img src="assets/images/amentites/pano-img/vtour/panos/${pano.id}.tiles/thumb.jpg" alt="${pano.title}" class="gallery__img">
                    <div class="gallery__overlay"> ${pano.id}. ${pano.title}</div>
                </div >
            `)
    });

    $(".tab-2D").click(function() {
        $(".gallery__item").hide();
        images.forEach(img => {
            $("#gallery").append(`
                <div id="${img.id}" class="gallery__item1 pos-${img.id}" onclick="showImage(this.id)">
                    <img src="assets/images/amentites/normal-img/${img.id}.jpg" alt="${img.title}" class="gallery__img">
                    <div class="gallery__overlay">${img.id}. ${img.title}</div>
                </div>
            `)
        });
    });


    $(".tab-360").click(function() {
        $(".gallery__item1").fadeOut();
        $(".gallery__item").fadeIn();
    });

    $(".next").click(function() {

    })

}); // jQuery



function loadScene(id) {
    $(".overlay").fadeOut();
    $(".option-box").fadeOut();
    $(".wrap-gallery").fadeOut();
    $("#render").fadeIn();
    $("#render iframe").attr("src", `assets/images/amentites/pano-img/vtour/tour.html?startscene=${id}`);
}


function showImage(name) {
    $(".wrap-gallery").fadeOut();
    $(".show-img").fadeIn();
    $(".show-img img").attr("src", `assets/images/amentites/normal-img/${name}.jpg`);
}

function delayLoading() {
    setTimeout(showLoading, 0);
}

function showLoading() {
    $(".icon-loading").fadeOut();
}

function reset_selectbox() {
    console.log('nga debug reset');
    $('.select__showflat').val('0');
    $('.select__arena').val('0');
    $('.select__ground').val('0');
    $('.select__showflat_2').val('0');
    // active_showflat = false,
    // active_arena = false,
    // active_ground = false,
    // active_showflat_2 = false;
}