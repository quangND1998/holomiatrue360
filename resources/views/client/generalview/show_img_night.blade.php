@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')
    {{-- <h3 class="page-title">Sa Bàn Đêm</h3>
    <form role="form" id="category" method="POST" action="{{ route('admin.general.storeImgNight_Day',$project->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-md-6">
            <div class="form-group  {{ $errors->has('folder_img_night') ? 'has-error' : '' }}">
                <label>Sa bàn Đêm : </label>
                <input type="file" name="folder_img_night">
                @if ($errors->has('folder_img_night'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('folder_img_night') }}</strong>
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
         <form role="form" id="category" method="POST" action="{{ route('admin.general.storeImgNight_Day',$project->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                     <h4 class="card-title">Thêm ảnh sa bàn đêm</h4>
                </div>
                <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-4 {{ $errors->has('folder_img_night') ? 'has-error' : '' }}">
                                <label for="folder_img_night">Ảnh san bàn đêm</label>
                                <input type="file" class="form-control-file" id="folder_img_night" name="folder_img_night" required oninvalid="setCustomValidity('Vui lòng nhập vào ảnh sa bàn đêm')" accept=".zip">
                                <small id="" class="form-text text-muted">Là file .zip chứa 60 ảnh sa bàn đêm.</small>
                                @if ($errors->has('folder_img_night'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('folder_img_night') }}</p>
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