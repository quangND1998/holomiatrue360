! function(e) {
    e.fn.extend({
        vc3dEye: function(e) {
            t(this.selector, e)
        }
    });
    var t = function(t, n) {
        let settings = $.extend({
            speed_rotate: 500,
            id_play: false
        });

        function o() {
            selector.mousedown(function(e) {
                isMoving = !0, currentX = e.pageX - this.offsetLeft
            }), e(document).mouseup(function() {
                isMoving = !1
            }), selector.mousemove(function(e) {
                1 == isMoving && i(e.pageX - this.offsetLeft)
            }), selector.bind("touchstart", function(e) {
                e.preventDefault();
                if (e.originalEvent.touches.length == 1 && e.originalEvent.changedTouches.length == 1) {
                    console.log("touchstart : isMoving=" + isMoving), isMoving = !0;
                    console.log("event", e.originalEvent.touches.length);
                    var t = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
                    currentX = t.clientX
                }
            }), e(document).bind("touchend", function(e) {
                if (e.originalEvent.touches.length == 1 && e.originalEvent.changedTouches.length == 1) {
                    console.log("touchend : isMoving=" + isMoving), isMoving = !1
                }
            }), selector.bind("touchmove", function(e) {
                if (e.originalEvent.touches.length == 1 && e.originalEvent.changedTouches.length == 1) {
                    console.log("touchmove : isMoving=" + isMoving), e.preventDefault();
                    var t = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
                    1 == isMoving ? i(t.pageX - this.offsetLeft) : currentX = t.pageX - this.offsetLeft
                }
            })
        }

        function i(e) {
            currentX - e > 25 ? (console.log("currentX =" + currentX + " newX =" + e), console.log("currentX-newX=" + (currentX - e)), currentX = e, currentImage = ++currentImage > totalImages ? 1 : currentImage, console.log("currentImage=" + currentImage), selector.css("background-image", "url(" + imagePath + currentImage + "." + imageExtension + ")")) :
                currentX - e < -25 && (console.log("currentX =" + currentX + " newX =" + e), console.log("currentX-newX=" + (currentX - e)), currentX = e, currentImage = --currentImage < 1 ? totalImages : currentImage, console.log("currentImage=" + currentImage), selector.css("background-image", "url(" + imagePath + currentImage + "." + imageExtension + ")"))

        }

        function c() {
            var t = 2,
                n = imagePath + "0." + imageExtension;
            selector.css("background-image", "url(" + n + ")"), e("<img/>").attr("src", n).load(function() {
                selector.height("100%").width("100%")
            });
            for (var o = 0; o <= totalImages; o++) n = imagePath + o + "." + imageExtension, selector.append("<img src='" + n + "' style='display:none; object-position: 50% 50%; object-fit:none; '>"), e("<img/>").attr("src", n).css("display", "none").load(function() {
                t++, t >= totalImages && (e("#VCc").removeClass("onLoadingDiv"), e("#VCc").text(""))
            })
        }

        function r() {
            e("html").append("<style type='text/css'>.onLoadingDiv{opacity:0.5;text-align:center;font-size:2em;font:color:#000000;}</style>"), e(selector).html("<div id='VCc' style='height:100%;width:100%;' class='onLoadingDiv'></div>")
        }

        function load_image_change() {
            for (var o = 2; o <= totalImages; o++) n = imagePath + o + "." + imageExtension,
                selector.append("<img src='" + n + "' style='display:none;'>"), e("<img/>").attr("src", n).css("display", "none").load(function() {
                    t++, t >= totalImages
                })
        }

        function play() {
            if (settings.id_play == true) {
                setInterval(function() {
                    currentImage++;
                    selector.css("background-image", "url(" + imagePath + currentImage + "." + imageExtension + ")");
                    if (currentImage == totalImages) {
                        currentImage = 0;
                    }
                    //                    console.log(currentImage);

                }, settings.speed_rotate);
            }
        }

        function setTimmer() {
            currentImage++;
            selector.css("background-image", "url(" + imagePath + currentImage + "." + imageExtension + ")");
            if (currentImage == totalImages) {
                currentImage = 0;
            }
        }
        this.selector = e(t), this.imagePath = n.imagePath, this.totalImages = n.totalImages, this.imageExtension = n.imageExtension || "png", this.isMoving = !1, this.currentX = 0, this.currentImage = 0, r(), c(), o()
    }
}(jQuery);