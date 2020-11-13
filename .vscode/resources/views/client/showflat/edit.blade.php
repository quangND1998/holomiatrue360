@inject('request', 'Illuminate\Http\Request')


@extends('client.project.manager')

@section('content-info')

<div class="row">
    <div class="col-md-12">
        <form role="form" id="formEdit" method="POST" action="{{ route('admin.showflat.update',[$name,$showflat->id]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                     <h4 class="card-title">Chỉnh sửa căn hộ</h4>
                </div>
                <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-4 {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="showFlat-name">Tên căn hộ</label>
                                <input type="text" class="form-control" name="title" id="showFlat-name" placeholder="Nhập vào tên phân khu" required oninvalid="setCustomValidity('Vui lòng nhập vào tên căn hộ')" value="{{ $showflat->title }}" >
                                @if ($errors->has('title'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 {{ $errors->has('folder_flat') ? 'has-error' : '' }}">
                                <label for="showFlat-img">Ảnh căn hộ</label>
                                <input type="file" class="form-control-file" id="showFlat-img" name="folder_flat" required oninvalid="setCustomValidity('Vui lòng nhập vào ảnh căn hộ')" accept=".zip">
                                <small id="" class="form-text text-muted">Là file .zip chứa pano tour của căn hộ.</small>
                                @if ($errors->has('folder_flat'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('folder_flat') }}</p>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <a href="{{ url('admin/project/'.$project->id.'/showflat') }}" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                    <button type="submit" class="btn btn-info">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
</div>


@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection