@inject('request', 'Illuminate\Http\Request')

@extends('client.project.manager')

@section('content-info')
    {{-- <h4 class="card-title">{{ $subdivision->title }}</h4> --}}

    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addGround">Thêm mặt bằng</button>

    <div class="modal fade" id="addGround" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Thêm mặt bằng</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
           <form  class="form-group"  method="POST" action="{{ route('admin.ground.storeGround',[$subdivision->id]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="map-name">Tên mặt bằng</label>
                        <input type="text" class="form-control" name="title" id="ground-name" placeholder="Nhập vào tên mặt bằng" required oninvalid="setCustomValidity('Vui lòng nhập vào tên mặt bằng')" >
                        @if ($errors->has('title'))
                            <span class="text-red" role="alert">
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                        <label for="map-img">Ảnh mặt bằng</label>
                        <input type="file" class="form-control-file" id="map-img" name="image" required oninvalid="setCustomValidity('Vui lòng nhập vào ảnh mặt bằng')" accept="">
                        <small id="" class="form-text text-muted">Là ảnh định dạng .png, .jpg của mặt bằng phân khu.</small>
                        @if ($errors->has('image'))
                            <span class="text-red" role="alert">
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-info">Thêm</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ $subdivision->model_ar  !=null ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th># </th>
                        <th>Tên mặt bằng</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($subdivision->ground  !=null)
                       @foreach ($subdivision->ground as $item)
                            <tr data-entry-id="{{ $item->id }}">
                                <td>{{ $count++ }}</td>
                                <td>{{ $item->title }}</td>
                                <td><img src="{{ $item->image }}" width="80px" height="50px">
                                <td>
                                    <a href="{{ route('admin.ground.edit',[$item->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ground.destroy', $item->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop


@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection