@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="page-header">
        <ul class="breadcrumbs pl-0 ml-md-0 border-0">
            <li class="nav-home">
                <a href="#">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a  href="{{ route('admin.dashboard') }}">Thông tin người dùng</a>
            </li>
        </ul>
    </div>

    {{-- <div class="main-panel">
            <div class="content">
                <div class="page-inner"> --}}
                    <h4 class="page-title">Thông tin người dùng</h4>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-with-nav">
                                <div class="card-header">
                                    <div class="row row-nav-line">
                                        <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Timeline</a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Họ tên</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Name" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>Ngày sinh</label>
                                                <input type="date" class="form-control" id="datepicker" name="datepicker" value="03/21/1998" placeholder="Birth Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>Giới tính</label>
                                                <select class="form-control" id="gender">
													<option value="">--Chọn giới tính--</option>
													<option value="1">Nam</option>
													<option value="2">Nữ</option>
												</select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control" value="" name="phone" placeholder="012346789">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" value="" name="address" placeholder="Nhập vào địa chỉ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-1">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Giới thiệu</label>
                                                <textarea class="form-control" name="about" placeholder="Giới thiệu về bản thân" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right mt-3 mb-3">
                                        <button class="btn btn-success">Lưu</button>
                                        <button class="btn btn-danger">Hủy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile card-secondary">
                                <div class="card-header" style="background-image: url('asset/img/blogpost.jpg')">
                                    <div class="profile-picture">
                                        <div class="avatar avatar-xl">
                                            <img src="asset/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="user-profile text-center">
                                        <div class="name">{{ $user->name }}, 19</div>
                                        {{-- <div class="job">Frontend Developer</div> --}}
                                        <div class="desc">Hôm nay là một ngày đẹp zời</div>
                                        <div class="social-media">
                                            <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                                                <span class="btn-label just-icon"><i class="fab fa-twitter"></i> </span>
                                            </a>
                                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                                <span class="btn-label just-icon"><i class="fab fa-google-plus-g"></i> </span>
                                            </a>
                                            <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                                                <span class="btn-label just-icon"><i class="fab fa-facebook-f"></i> </span>
                                            </a>
                                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                                <span class="btn-label just-icon"><i class="fab fa-dribbble"></i> </span>
                                            </a>
                                        </div>
                                        {{-- <div class="view-profile">
                                            <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row user-stats text-center">
                                        <div class="col">
                                            <div class="number">125</div>
                                            <div class="title">Bài viết</div>
                                        </div>
                                        <div class="col">
                                            <div class="number">25K</div>
                                            <div class="title">Người theo dõi</div>
                                        </div>
                                        <div class="col">
                                            <div class="number">134</div>
                                            <div class="title">Đang theo dõi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div>
            </div>
        </div> --}}


@endsection