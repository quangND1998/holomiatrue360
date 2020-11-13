var elem = document.getElementById("zoom_img");

var computedStyle = window.getComputedStyle(elem, null);
width = parseInt(computedStyle.width, 10);
height = parseInt(computedStyle.height, 10);
bgWidth = width;
bgHeight = height;
bgPosX = -(bgWidth - width) * 0.5;
bgPosY = -(bgHeight - height) * 0.5;

var scale = 1;

function zoomout(event) {
    scale += 0.1;

    $("#zoom_img").css('transform', 'scale(' + scale + ')');
}

function zoomin(event) {
    scale -= 0.1;

    $("#zoom_img").css('transform', 'scale(' + scale + ')');
}

function reset() {
    bgWidth = width;
    bgHeight = height;
    bgPosX = bgPosY = 0;
    updateBgStyle();
}

function updateBgStyle() {
    if (bgPosX > 0) {
        bgPosX = 0;
    } else if (bgPosX < width - bgWidth) {
        bgPosX = width - bgWidth;
    }

    if (bgPosY > 0) {
        bgPosY = 0;
    } else if (bgPosY < height - bgHeight) {
        bgPosY = height - bgHeight;
    }
}