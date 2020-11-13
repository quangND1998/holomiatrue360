@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')

<div class="row">
    <div class="col-md-12"> 

  <form role="form" id="category" method="POST" action="{{ route('admin.info.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <input type="hidden" name="project_id" value="{{$project->id}}">

        <div class="card">
            <div class="card-header d-flex justify-content-between pl-0">
                <h4 class="card-title">Thông tin dự án {{ $project->title }}</h4>
            </div>

            <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                <div class="row">
                    <div class="col-md-6">
                        <div  class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                            <label for="logo">Logo dự án</label>
                            <div class="image-upload-wrap col-md-8" id="wrap-logo">
                                <input name="logo" id="logo" class="file-upload-input form-control-file" type='file' onchange="readURL(this)" accept="image/png, image/jpg, image/jpeg" />
                                @if ($errors->has('logo'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('logo') }}</p>
                                    </span>
                                @endif
                                <div class="drag-text">
                                    <img src="asset/img/upload.svg" alt="">
                                    <h3>Drag and drop a file or select add Image</h3>
                                </div>
                            </div>
                            <div class="file-upload-content col-md-8" id="file-upload-logo">
                                <img class="file-upload-image" id="upload-logo" src="#" alt="your image" />
                                <span class="image-title-wrap" title="Xóa">
                                    <i class="fas fa-times fa-2x"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" class="form-control col-md-8" id="address" placeholder="Địa chỉ dự án">
                            @if ($errors->has('address'))
                                <span class="text-red" role="alert">
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control col-md-8" id="phone" placeholder="Nhập vào số điện thoại">
                            @if ($errors->has('phone'))
                                <span class="text-red" role="alert">
                                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('pushlished') ? 'has-error' : '' }}">
                            <label>Trạng thái</label>
                            <select id="parent_id" name="pushlished" class="form-control col-md-4">
                                <option value=0>Riêng tư</option>  
                                <option value=1>Công khai</option>
                            </select>
                            @if ($errors->has('pushlished'))
                                <span class="text-red" role="alert">
                                    <p class="text-danger">{{ $errors->first('pushlished') }}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
                            <label for="thumbnail">Thumnail dự án</label>
                            <div class="image-upload-wrap col-md-8" id="wrap-thumbnail">
                                <input name="thumbnail" id="thumbnail" class="file-upload-input form-control-file" onchange="readURL(this)" type='file' accept="image/png, image/jpg, image/jpeg" />
                                @if ($errors->has('thumbnail'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('thumbnail') }}</p>
                                    </span>
                                @endif
                                <div class="drag-text">
                                    <img src="asset/img/upload.svg" alt="">
                                    <h3>Drag and drop a file or select add Image</h3>
                                </div>
                            </div>
                            <div class="file-upload-content col-md-8" id="file-upload-thumbnail">
                                <img class="file-upload-image" id="upload-thumbnail" src="#" alt="your image" />
                                <span class="image-title-wrap" title="Xóa">
                                    <i class="fas fa-times fa-2x"></i>
                                </span>
                            </div>
                        </div>
                            <div class="form-group {{ $errors->has('link_register') ? 'has-error' : '' }}">
                            <label for="info-link">Link đăng kí nhận thông tin</label>
                            <input type="text" name="link_register" class="form-control col-md-8" id="info-link" placeholder="Nhập vào link đăng kí nhận thông tin">
                            @if ($errors->has('link_register'))
                                <span class="text-red" role="alert">
                                    <p class="text-danger">{{ $errors->first('link_register') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('link_film') ? 'has-error' : '' }}">
                            <label for="film-link" >Link film trên Youtube</label>
                            <input type="text"  name="link_film" class="form-control col-md-8" id="film-link" placeholder="Nhập vào link film">
                            @if ($errors->has('link_film'))
                                <span class="text-red" role="alert">
                                    <p class="text-danger">{{ $errors->first('link_film') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('link_website') ? 'has-error' : '' }}">
                            <label for="film-website" >Link website dự án</label>
                            <input type="text"  name="link_website" class="form-control col-md-8" id="website-link" placeholder="Nhập vào link website">
                            @if ($errors->has('link_website'))
                                <span class="text-red" role="alert">
                                    <p class="text-danger">{{ $errors->first('link_website') }}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
             <div class="mx-auto mt-4 pb-4">
                <button class="btn btn-danger" style="width: 100px">Hủy</button>
                 <button class="btn btn-success" style="width: 100px"> 
                     <span class="btn-label">
                        <i class="fas fa-save"></i>
                    </span>
                    Lưu lại
                </button>
            </div>
        </div>
    </form> 


    </div>
</div>


@endsection