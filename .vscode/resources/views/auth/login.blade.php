@extends('layouts.auth')

@section('content')
  

  <div class ="login">
    <div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
            <div class="text-center mb-3"><img src="asset/img/true360.svg" alt=""></div>
            <h1 class="text-center">Đăng nhập</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were problems with input:
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form role="form" method="POST" action="{{ url('login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="login-form">
                    <div class="form-group form-floating-label">
                        <input id="username" type="email" name="email" value="{{ old('email') }}"class="form-control input-border-bottom" required>
                        <label for="username" class="placeholder">Tên đăng nhập</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password" class="form-control input-border-bottom" required>
                        <label for="password" class="placeholder">Mật khẩu</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="row form-sub m-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme" name="remember">
                            <label class="custom-control-label" for="rememberme">Lưu mật khẩu</label>
                        </div>

                        <a href="{{ route('auth.password.reset') }}" class="link float-right">Quên mật khẩu ?</a>
                    </div>
                    <div class="form-action mb-3">
                        <button  type="submit" class="btn btn-warning btn-rounded btn-login">Đăng nhập</button>
                    </div>
                </div>
            </form>
        </div>
	</div>
  </div>

@endsection