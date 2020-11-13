@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')

    <h3 class="page-title">Thông Tin Dự Án</h3>

    <form role="form" id="category" method="POST" action="{{ route('admin.info.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <input type="hidden" name="project_id" value="{{$project->id}}">
        <div class="col-md-6">
            <div class="form-group  {{ $errors->has('logo') ? 'has-error' : '' }}">

                <label>Logo dự án : </label>

                <input type="file" name="logo">

                @if ($errors->has('logo'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('logo') }}</strong>
                    </span>
                @endif

            </div>
        </div>
          <div class="col-md-6">
            <div class="form-group  {{ $errors->has('logo') ? 'has-error' : '' }}" >
                <label>Thumbnail:</label>

                <input type="file"  name="thumbnail"  placeholder="Enter showflat">
                @if ($errors->has('thumbnail'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('thumbnail') }}</strong>
                    </span>
                @endif
            </div>
          </div>

        <div class ="col-md-6">
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">

                <label>Địa Chỉ:</label>
                <input type="text" id="title" name="address" value="" class="form-control" placeholder="Enter showflat">
                @if ($errors->has('address'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">

                <label>Điện Thoại:</label>
                <input type="text" id="title" name="phone" value="" class="form-control" placeholder="Enter showflat">
                @if ($errors->has('phone'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('link_register') ? 'has-error' : '' }}">

                <label>Link Đăng Ký:</label>

                <input type="text" id="title" name="link_register" value="" class="form-control" placeholder="Enter showflat">
                @if ($errors->has('link_register'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('link_register') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('link_film') ? 'has-error' : '' }}">
                <label>Link Film</label>
                <input type="text" id="title" name="link_film" value="" class="form-control" placeholder="Enter showflat">
                @if ($errors->has('link_film'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('link_film') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">
                <label> Published:</label>
                <select id="parent_id" name="published" class="form-control">
                    <option value=0>false</option>  
                    <option value=1>true</option>
                </select>
                @if ($errors->has('published'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('published') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-success">Add New</button>
        </div>


    </form>



@endsection