@inject('request', 'Illuminate\Http\Request')


@extends('client.project.manager')

@section('content-info')

@if($project_map->map ==null)
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addMap">Thêm bản đồ</button>

    <div class="modal fade" id="addMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Thêm bản đồ</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form  class="form-group"  method="POST" action="{{ route('admin.map.map_store',[$project->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="map-name">Tên bản đồ</label>
                        <input type="text" class="form-control" name="title" id="map-name" placeholder="Nhập vào tên bản đồ" required oninvalid="setCustomValidity('Vui lòng nhập vào tên bản đồ')" >
                        @if ($errors->has('title'))
                            <span class="text-red" role="alert">
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('folder_image') ? 'has-error' : '' }}">
                        <label for="map-img">Bản đồ</label>
                        <input type="file" class="form-control-file" id="map-img" name="folder_image" required oninvalid="setCustomValidity('Vui lòng nhập vào ảnh bản đồ')" accept="">
                        <small id="" class="form-text text-muted">Là ảnh định dạng .png, .jpg của bản đồ dự án.</small>
                        @if ($errors->has('folder_image'))
                            <span class="text-red" role="alert">
                                <p class="text-danger">{{ $errors->first('folder_image') }}</p>
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
@endif

        <div class="panel panel-default">
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped {{ $project_map->map  !=null ? 'datatable' : '' }} dt-select">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên bản đồ</th>
                            <th>Hình ảnh</th>
                            <th>Kinh độ | Vĩ độ </th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($project_map->map !=null)
                                    <td>{{ $count++ }}</td>
                                    <td>{{$project_map->map->title }}</td>
                                    <td><img src="{{$project_map->map->folder_image }}" alt="" width="80px" height="50px"></td>
                                    @if($project_map->address !=null)
                                    <td>{{ $project_map->address->longtitude }} | {{ $project_map->address->latitude }}</td>
                                    @else
                                        <td>Chưa có dữ liệu</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.map.edit',[Str::slug($project_map->title),$project_map->map->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    </td>
                                </tr>
                        @else
                            <tr>
                                <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>







@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection