<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head1')
</head>

<body class="page-header-fixed">


    <div class="container-fluid p-0">
        @yield('content')
    </div>

    <div class="scroll-to-top" style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')
</body>
</html>