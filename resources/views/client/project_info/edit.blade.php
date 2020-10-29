@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')
    <div class="row">
        <div class="col-md-12"> 
    
    <form role="form" id="category" method="POST" action="{{ route('admin.info.update', $inforproject->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
        <input type="hidden" name="project_id" value="{{$project->id}}">
    
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Chỉnh sửa thông tin dự án</h4>
                </div>
                <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                    <div class="row">
                        <div class ="col-md-6">
                             <div  class="form-group  {{ $errors->has('logo') ? 'has-error' : '' }}">
                                <label for="exampleFormControlFile1">Logo</label>
                                <input type="file" name='logo'  value="{{$inforproject->logo}}" class="form-control-file" id="exampleFormControlFile1">
                                @if ($errors->has('logo'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-8 {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label>Tên dự án</label>
                                <input type="text" id="title" name="title" value="{{$project->title}}" class="form-control" placeholder="Nhap ten du an">
                                @if ($errors->has('title'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-8 {{ $errors->has('address') ? 'has-error' : '' }}">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" value="{{$inforproject->address}}" class="form-control" id="address" placeholder="Địa chỉ dự án">
                                @if ($errors->has('address'))
                                <span class="text-red" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group col-md-8 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone" value="{{$inforproject->phone}}" class="form-control" id="phone" placeholder="Nhập vào số điện thoại">
                                @if ($errors->has('phone'))
                                <span class="text-red" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                            </div>
                             <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">
                                <label> Trạng thái</label>
                                <select id="parent_id" name="published"  class="form-control col-md-4">
                                @if( $inforproject->published ==0)
                                    <option value=0 selected='selected' >Riêng tư</option>  
                                @else
                                    <option value=0 >Riêng tư</option>    
                                @endif    
                                @if( $inforproject->published ==1)
                                    <option value=1 selected='selected' >Công khai</option>
                                @else
                                    <option value=1 >Công khai</option>
                                @endif    
                                </select>
                                @if ($errors->has('published'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('published') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                                    <label for="exampleFormControlFile1">Thumbnail</label>
                                    <input type="file"  name="thumbnail" value="{{$inforproject->thumbnail}}" class="form-control-file" id="exampleFormControlFile1">
                                    @if ($errors->has('thumbnail'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('thumbnail') }}</strong>
                                    </span>
                                @endif
                                </div>
                         
                        <div class="form-group col-md-8 {{ $errors->has('link_register') ? 'has-error' : '' }}">
                                <label for="info-link">Link đăng kí nhận thông tin</label>
                                <input type="text" name="link_register"  value="{{$inforproject->link_register}}" class="form-control" id="info-link" placeholder="Nhập vào link đăng kí nhận thông tin">
                                @if ($errors->has('link_register'))
                                <span class="text-red" role="alert">
                                    <strong>{{ $errors->first('link_register') }}</strong>
                                </span>
                            @endif
                            </div>
                             <div class="form-group col-md-8 {{ $errors->has('link_film') ? 'has-error' : '' }}">
                                <label for="film-link" >Link film trên Youtube</label>
                                <input type="text"  name="link_film"  value="{{$inforproject->link_film}}" class="form-control" id="film-link" placeholder="Nhập vào link film">
                                @if ($errors->has('link_film'))
                                <span class="text-red" role="alert">
                                    <strong>{{ $errors->first('link_film') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('link_website') ? 'has-error' : '' }}">
                                <label for="film-website" >Link website dự án</label>
                                <input type="text"  name="link_website" value="{{$inforproject->link_website}}" class="form-control col-md-8" id="website-link" placeholder="Nhập vào link website">
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
                    <button type="submit" class="btn btn-success" style="width: 100px"> 
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

@stop

@section('javascript') 
    <script>
        //window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection