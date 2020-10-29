@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')
{{-- can co thang project id --}}

@section('content-info')
    {{-- <h3 class="page-title">Hien Trang</h3>
    <form role="form" id="category" method="POST" action="{{ route('admin.general.storePresentImg',$project->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-md-6">
            <div class="form-group  {{ $errors->has('folder_present_image') ? 'has-error' : '' }}">
                <label>Anh hiena trang : </label>
                <input type="file" name="folder_present_image">
                @if ($errors->has('folder_present_image'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('folder_present_image') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Add New</button>
        </div>
    </form> --}}

<div class="row">
    <div class="col-md-12">
       <form role="form" id="category" method="POST" action="{{ route('admin.general.storePresentImg',$project->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                     <h4 class="card-title">Thêm ảnh hiện trạng</h4>
                </div>
                <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-4 {{ $errors->has('folder_present_image') ? 'has-error' : '' }}">
                                <label for="folder_present_image">Ảnh hiện trạng</label>
                                <input type="file" class="form-control-file" id="folder_present_image" name="folder_present_image" required oninvalid="setCustomValidity('Vui lòng nhập vào ảnh hiện trạng')" accept=".zip">
                                <small id="" class="form-text text-muted">Là file .zip chứa pano tour của hiện trạng.</small>
                                @if ($errors->has('folder_present_image'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('folder_present_image') }}</p>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <a href="{{ url('admin/project/'.$project->id.'/general') }}" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                    <button type="submit" class="btn btn-info">Lưu lại</button>
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