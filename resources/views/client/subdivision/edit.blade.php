@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')
<div class="row">
    <div class="col-md-12">
        <form role="form" id="category" method="POST" action="{{ route('admin.subdivision.update',$subdivision->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                     <h4 class="card-title">Chỉnh sửa phân khu</h4>
                </div>
                 <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                    <div class="row">
                        <div class ="col-md-12">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label>Tên Phân Khu</label>
                                <input type="text" id="title" name="title" value="{{ $subdivision->title }}" class="form-control col-md-4" placeholder="Enter showflat">
                                @if ($errors->has('title'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group  {{ $errors->has('folder_image') ? 'has-error' : '' }}">
                                <label for="subdivision-img">Ảnh phân khu</label>
                                <input type="file" name="folder_image" class="form-control-file col-md-4" id="subdivision-img">
                                    @if ($errors->has('folder_image'))
                                <span class="text-red" role="alert">
                                    <strong>{{ $errors->first('folder_image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4 pb-4">
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


    {{-- <form role="form" id="category" method="POST" action="{{ route('admin.subdivision.update',$subdivision->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class ="col-md-4">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label>Tên Phân Khu</label>
                <input type="text" id="title" name="title" value="{{ $subdivision->title }}" class="form-control" placeholder="Enter showflat">
                @if ($errors->has('title'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

        <div class="col-md-4">
            <div class="form-group  {{ $errors->has('folder_image') ? 'has-error' : '' }}">
                <label>Ảnh Phân Khu : </label>
                <input type="file" name="folder_image"  value={{ $subdivision->folder_image }}>
                @if ($errors->has('folder_image'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('folder_image') }}</strong>
                    </span>
                @endif
            </div>

        <div class="form-group" class="col-md-4">
            <button type="submit" class="btn btn-success">Add New</button>
        </div>
   


    </form> --}}


 
@stop

@section('javascript') 
    <script>
        //window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection       