@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')
    <h3 class="page-title">{{ $project->title }} - Model AR</h3>
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
                            
                               
                         
                              {{-- anh hien trang --}}
                            <td><a href={{ $subdivision->model_ar->model_glb }}>Android</a>
                                        @if($subdivision->model_ar->model_glb !=null)
                                        <a href="{{ route('admin.subdivision.update_model_ar',[$subdivision->model_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @else
                                    <a href="{{ route('admin.subdivision.create_model_ar',[$subdivision->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                    @endif
                                </td>
                                {{--  --}}
                                {{-- Sa ban ngay --}}
                                <td><a href={{ $subdivision->model_ar->model_usdz }}>IOS</a>
                                    @if($subdivision->model_ar->model_usdz!=null)
                                    <a href="{{ route('admin.subdivision.update_model_ar',[$subdivision->model_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                @else
                                <a href="{{ route('admin.subdivision.create_model_ar',[$subdivision->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                @endif</td>
                                {{-- Sa ban dem --}}
                              {{-- Model AR --}}
{{--                                 
                                    <td>{{ $item->general->model_ar->model_glb}} 
                                        @if($item->general->model_ar->model_ar != null)
                                        <a href="{{ route('admin.general.edit_img_night',[$item->general->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                        @else
                                        <a href="{{ route('admin.general.show_img_night',[$item->general->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                        @endif
                                    </td>  --}}



    
                            
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