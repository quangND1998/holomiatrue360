@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')

 

    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ $generalview != null ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr  class="text-center">
                        <th colspan="3">TỔNG THỂ</th>
                        <th colspan="2">MODEL AR</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="text-center">
                        <td>Ảnh hiện trạng</td>
                        <td>Sa bàn ngày</td>
                        <td>Sa bàn đêm</td>
                        <td>Android</td>
                        <td>IOS</td>
                    </tr>
                    @if ($generalview != null)
                        <tr data-entry-id="{{ $generalview->id }}" class="text-center">
                            @if($generalview != null)
                                <td>
                                    <a href={{ $generalview->folder_present_image }} target="_blank">
                                        @if( $generalview->folder_present_image != null) Xem  @endif
                                    </a>
                                    @if($generalview->folder_present_image != null)
                                        <a href="{{ route('admin.general.edit',[$generalview->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @else
                                        <a href="{{ route('admin.general.createpresent',[$project->id]) }}" class="btn btn-xs btn-success">@lang('global.app_create')</a>
                                    @endif
                                </td>

                                <td>
                                    {{ $generalview->folder_img_day }}
                                    @if($generalview->folder_img_day != null)
                                        <a href="{{ route('admin.general.edit_img_day',[$generalview->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @else
                                        <a href="{{ route('admin.general.show_img_day',[$project->id]) }}" class="btn btn-xs btn-success">@lang('global.app_create')</a>
                                    @endif
                                </td>

                                <td>
                                    {{ $generalview->folder_img_night }}
                                    @if($generalview->folder_img_night !=null)
                                        <a href="{{ route('admin.general.edit_img_night',[$generalview->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @else
                                    <a href="{{ route('admin.general.show_img_night',[$project->id]) }}" class="btn btn-xs btn-success">@lang('global.app_create')</a>
                                    @endif
                                </td>
                            @endif
                                    {{-- ModelAR --}}
                            @if($generalview->model_ar !=null)
                                <td>
                                    {{ $generalview->model_ar->model_glb }}
                                    @if($generalview->model_ar->model_glb  !=null)
                                        <a href="{{ route('admin.model_ar.editAndroid_IOS',[$generalview->model_ar->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @else
                                        <a href="{{ route('admin.model_ar.createAndroid_IOS',[$generalview->id]) }}" class="btn btn-xs btn-success">@lang('global.app_create')</a>
                                    @endif
                                </td>

                                <td>
                                    {{ $generalview->model_ar->model_usdz  }}
                                    @if($generalview->model_ar->model_usdz !=null)
                                        <a href="{{ route('admin.model_ar.editAndroid_IOS',[ $generalview->model_ar->id]) }}"  class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @else
                                        <a href="{{ route('admin.model_ar.createAndroid_IOS',[$generalview->id]) }}"  class="btn btn-xs btn-success">@lang('global.app_create')</a>
                                    @endif
                                </td>
                            @endif
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
    