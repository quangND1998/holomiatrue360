@inject('request', 'Illuminate\Http\Request')


@extends('client.project.manager')

@section('content-info')

{{-- <h3 class="page-title">Căn hộ Tham Khảo</h3>
        <button  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Create Project</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form  class="form-group"  method="POST" action="{{ route('admin.showflat.storeShowFlat',[$projectShowflat->id]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm Căn Hộ Tham Khảo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="recipient-name" class="col-form-label">Tên Căn Hộ:</label>
                            <input type="text" class="form-control" id="title" name ="title">
                                @if ($errors->has('title'))
                                    <span class="text-red" >
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('folder_flat') ? 'has-error' : '' }}">
                            <label for="recipient-name" class="col-form-label">Ảnh Căn Hộ</label>
                            <input type="file" class="form-control" id="folder_flat" name ="folder_flat">
                                @if ($errors->has('folder_flat'))
                                    <span class="text-red" >
                                        <strong>{{ $errors->first('folder_flat') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tạo Mới</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('global.app_list')
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped {{ $projectShowflat->showflat  !=null ? 'datatable' : '' }} dt-select">
                    <thead>
                        <tr>
                            <th>STT </th>
                            <th>Tên Mặt Bằng</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($projectShowflat->showflat  !=null)
                           @foreach ($projectShowflat->showflat as $item)
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->title }}</td>

                                    <td><a href={{ $item->folder_flat}} target="_blank">Link Preview</a></td>
                                    <td>
                                        <a href="{{ route('admin.showflat.edit',[Str::slug($projectShowflat->title),$item->id,]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                            'route' => ['admin.showflat.destroy', $item->id])) !!}
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
        </div> --}}

        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">Thêm căn hộ</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Thêm căn hộ</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form role="form" id="formAdd" method="POST" action="{{ route('admin.showflat.storeShowFlat',$project->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="showFlat-name">Tên căn hộ</label>
                <input type="text" class="form-control" name="title" id="showFlat-name" placeholder="Nhập vào tên phân khu" required oninvalid="setCustomValidity('Vui lòng nhập vào tên căn hộ')" >
                @if ($errors->has('title'))
                    <span class="text-red" role="alert">
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('folder_flat') ? 'has-error' : '' }}">
                <label for="showFlat-img">Ảnh căn hộ</label>
                <input type="file" class="form-control-file" id="showFlat-img" name="folder_flat" required oninvalid="setCustomValidity('Vui lòng nhập vào ảnh căn hộ')" accept=".zip">
                <small id="" class="form-text text-muted">Là file .zip chứa pano tour của căn hộ.</small>
                @if ($errors->has('folder_flat'))
                    <span class="text-red" role="alert">
                        <p class="text-danger">{{ $errors->first('folder_flat') }}</p>
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
                <table class="table table-bordered table-striped {{ $projectShowflat->showflat  !=null ? 'datatable' : '' }} dt-select">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên căn hộ</th>
                            <th>Hình ảnh</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($projectShowflat->showflat  !=null)
                           @foreach ($projectShowflat->showflat as $item)
                                <tr data-entry-id="{{ $item->id }}">
                                    <td>{{$item->id  }}</td>
                                    <td>{{ $item->title }}</td>

                                    <td><a href={{ $item->folder_flat}} target="_blank">Link Preview</a></td>
                                    <td>
                                        <a href="{{ route('admin.showflat.edit',[Str::slug($projectShowflat->title),$item->id,]) }}" class="btn btn-xs btn-info" >@lang('global.app_edit')</a>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                            'route' => ['admin.showflat.destroy', $item->id])) !!}
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