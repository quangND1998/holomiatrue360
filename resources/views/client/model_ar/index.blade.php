@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
    <h3 class="page-title">Project List</h3>
    @if($models_ar->model_ar ==null)
        <a class="btn btn-success" href="{{ route('admin.model_ar.createAndroid_IOS',[$models_ar->id]) }}"> Model AR</a>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ $models_ar !=null ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>STT </th>
                        <th>Android</th>
                        <th>IOS</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($models_ar->model_ar !=null)
                            <tr data-entry-id="{{ $models_ar->id }}">
                                <td></td>
                                <td>{{$models_ar->id  }}</td>
                            <td><a href={{ $models_ar->model_ar->model_glb }}>Android</a>
                                        @if($models_ar->model_ar->model_glb !=null)
                                        <a href="{{ route('admin.model_ar.editAndroid_IOS',[$models_ar->model_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @else
                                    <a href="{{ route('admin.model_ar.createAndroid_IOS',[$models_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                    @endif
                                </td>
                                <td><a href={{ $models_ar->model_ar->model_usdz }}>IOS</a>
                                    @if($models_ar->model_ar->model_usdz!=null)
                                    <a href="{{ route('admin.model_ar.editAndroid_IOS',[$models_ar->model_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                @else
                                <a href="{{ route('admin.model_ar.createAndroid_IOS',[$models_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                @endif</td>
                                    <td>{{ $item->general->model_ar->model_glb}} 
                                        @if($item->general->model_ar->model_ar != null)
                                        <a href="{{ route('admin.general.edit_img_night',[$item->general->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                        @else
                                        <a href="{{ route('admin.general.show_img_night',[$item->general->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
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