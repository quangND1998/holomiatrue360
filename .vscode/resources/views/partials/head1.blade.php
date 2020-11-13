<meta charset="utf-8">
<title>
    True360 - {{ trans('global.global_title') }}
</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
{{-- <title>True 360 platform</title> --}}
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<meta http-equiv="Content-type"
      content="text/html; charset=utf-8">
<link rel="icon" href="asset/img/favicon.ico" type="image/x-icon" />
<!-- Define default CSS path (you will run into CSS error without this) -->
<base href="{{ asset('') }}">

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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
<link rel="stylesheet" href="asset/css/bootstrap-multiselect.css">

 <!-- Amentites CSS Files -->
<link rel="stylesheet" href="asset/css/amentites/amentites.css">


<!-- CSS Just for demo purpose, don't include it in your project -->
{{-- <link rel="stylesheet" href="asset/css/demo.css"> --}}
