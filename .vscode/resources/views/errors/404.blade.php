@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<div class="page-not-found">
	<div class="wrapper not-found">
		<h1 class="animated fadeIn">404</h1>
		<div class="desc animated fadeIn"><span>OOPS!</span><br/>Looks like you get lost</div>
		<a href="{{ route('admin.project.index') }}" class="btn btn-primary btn-back-home mt-4 animated fadeInUp">
			<span class="btn-label mr-2">
				<i class="flaticon-home"></i>
			</span>
			Back To Home
		</a>
	</div>
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
</div>
@endsection