@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')
    {{-- <h3 class="page-title">{{ $project->title }} - Model AR</h3>
    @if($subdivision->model_ar ==null)
        <a class="btn btn-success" href="{{ route('admin.subdivision.create_model_ar',[$subdivision->id]) }}"> Model AR</a>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ $subdivision->model_ar  !=null ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>Android</th>
                        <th>IOS</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($subdivision->model_ar  !=null)
                        <tr data-entry-id="{{ $subdivision->model_ar->id }}">
                            <td><a href={{ $subdivision->model_ar->model_glb }}>Android</a>
                                        @if($subdivision->model_ar->model_glb !=null)
                                        <a href="{{ route('admin.subdivision.update_model_ar',[$subdivision->model_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @else
                                    <a href="{{ route('admin.subdivision.create_model_ar',[$subdivision->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                    @endif
                                </td>

                                <td><a href={{ $subdivision->model_ar->model_usdz }}>IOS</a>
                                    @if($subdivision->model_ar->model_usdz!=null)
                                    <a href="{{ route('admin.subdivision.update_model_ar',[$subdivision->model_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                @else
                                <a href="{{ route('admin.subdivision.create_model_ar',[$subdivision->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                @endif</td>
                            </tr>
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div> --}}

     @if($subdivision->model_ar ==null)
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addGround">Thêm Model AR</button>
    @endif

    <div class="modal fade" id="addGround" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Thêm Model AR</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
          <form role="form" id="category" method="POST" action="{{ route('admin.model_ar.subdivisionstore',$subdivision->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                     @if($subdivision->model_ar ==null || $subdivision->model_ar->model_glb ==null)
                            <div class="col-md-12 col-12">
                                <div class="form-group col-md-4 {{ $errors->has('model_glb') ? 'has-error' : '' }}">
                                    <label for="model_glb">Android</label>
                                    <input type="file" class="form-control-file" id="model_glb" name="model_glb" required oninvalid="setCustomValidity('Vui lòng nhập vào model AR dành cho android')" accept=".glb">
                                    @if ($errors->has('model_glb'))
                                        <span class="text-red" role="alert">
                                            <p class="text-danger">{{ $errors->first('model_glb') }}</p>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                         @if($subdivision->model_ar ==null || $subdivision->model_ar->model_usdz ==null)
                            <div class="col-md-12 col-12">
                                <div class="form-group col-md-4 {{ $errors->has('model_usdz') ? 'has-error' : '' }}">
                                    <label for="model_usdz">IOS</label>
                                    <input type="file" class="form-control-file" id="model_usdz" name="model_usdz" required oninvalid="setCustomValidity('Vui lòng nhập vào model AR dành cho IOS')" accept=".usdz">
                                    @if ($errors->has('model_usdz'))
                                        <span class="text-red" role="alert">
                                            <p class="text-danger">{{ $errors->first('model_usdz') }}</p>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
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
                        <th>Android</th>
                        <th>IOS</th>
                    </tr>
                </thead>
                <tbody>
                     @if ($subdivision->model_ar  !=null)
                        <tr data-entry-id="{{ $subdivision->model_ar->id }}">
                            <td>
                                <a href={{ $subdivision->model_ar->model_glb }}>Android</a>
                                @if($subdivision->model_ar->model_glb !=null)
                                    <a href="{{ route('admin.subdivision.update_model_ar',[$subdivision->model_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                @else
                                    <a href="{{ route('admin.subdivision.create_model_ar',[$subdivision->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                @endif
                            </td>

                            <td>
                                <a href={{ $subdivision->model_ar->model_usdz }}>IOS</a>
                                @if($subdivision->model_ar->model_usdz!=null)
                                    <a href="{{ route('admin.subdivision.update_model_ar',[$subdivision->model_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                @else
                                    <a href="{{ route('admin.subdivision.create_model_ar',[$subdivision->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                @endif
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

@stop
@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection