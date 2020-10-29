@inject('request', 'Illuminate\Http\Request')

@extends('client.project.manager')

@section('content-info')
    
    <div class="panel panel-default info-tab">
        <div class="row">
            <div class="form-group col-md-6 col-sm-12 col-12 order-sm-1 order-md-1 order-1">
                <label for="">Logo</label>
                <div class="text-center">
                    <img class="border" src="{{ $project->info->logo }}" width="50%" height="auto" alt="">
                </div>
            </div>
             <div class="form-group col-md-6 col-sm-12 col-12 order-sm-2 order-md-2 order-2">
                <label for="">Thumbnail</label>
                <div class="text-center">
                    <img class="border" src="{{ $project->info->thumbnail }}" width="50%" height="auto" alt="">
                </div>
            </div>
             <div class="form-group col-md-6 col-sm-12 col-12 order-sm-3 order-md-3 order-3">
                <label for="">Tên dự án</label>
                <input type="text" name="projectName" value="{{ $project->title }}" class="form-control font-weight-bold text-uppercase" id="" readonly >
            </div>
             <div class="form-group col-md-6 col-sm-12 col-12 order-sm-5 order-md-4 order-5">
                <label for="">Link đăng ký nhận thông tin</label>
                <input type="text" name="link_register" value="{{ $project->info->link_register }}" class="form-control font-weight-bold" id="" readonly>
            </div>
             <div class="form-group col-md-6 col-sm-12 col-12 order-sm-4 order-md-5 order-4">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" value="{{ $project->info->phone }}" class="form-control font-weight-bold text-uppercase" id="" readonly>
            </div>
            <div class="form-group col-md-6 col-sm-12 col-12 order-sm-6 order-md-6 order-6">
                <label for="">Link phim trên Youtube</label>
                <input type="text" name="link_youtube" value="{{ $project->info->link_film }}" class="form-control font-weight-bold" id="" readonly>
            </div>
            <div class="form-group col-md-6 col-sm-12 col-12 order-sm-8 order-md-7 order-8">
                <label for="">Trạng thái</label>
                @if($project->info->published == 0)
                     <input type="text" name="status" value="Riêng tư" class="form-control font-weight-bold" id="" readonly>
                @else
                    <input type="text" name="status" value="Công khai" class="form-control font-weight-bold" id="" readonly>
                @endif
            </div>
            <div class="form-group col-md-6 col-sm-12 col-12 order-sm-7 order-md-8 order-7">
                <label for="">Link phim website dự án</label>
                <input type="text" name="link_youtube" value="{{ $project->info->link_website }}" class="form-control font-weight-bold" id="" readonly>
            </div>
            <div class="col-12 text-center mt-4 pb-3 order-sm-9 order-md-9 order-9">
                <a href="{{ route('admin.info.editProject',[$project->id]) }}" class="btn btn-info" style="width: 125px">@lang('global.app_edit')</a>
            </div>
            {{-- <div class="col-md-6 mb-md-4">
                <p class="mb-1">Logo</p>
                <img class="border" src={{ $project->info->logo }} width=50% height=220px >
            </div>
            <div class="col-md-6">
                <p class="mb-1">Thumbnail</p>
                <img class="border" src={{ $project->info->thumbnail }} width=50% height=220px >
            </div>
            <div class="col-md-6">
                <p class="mb-1">Tên dự án</p>
                <p class="lead"> {{ $project->title }}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1">Link đăng kí nhận thông tin</p>
                <p class="lead"> <a href="{{ $project->info->link_register }}" target="_blank">{{ $project->info->link_register }}</a></p>
            </div>
            <div class="col-md-6">
                <p class="mb-1">Số điện thoại</p>
                <p class="lead"> {{ $project->info->phone }}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1">Link phim trên Youtube</p>
                <p class="lead"> <a href="{{ $project->info->link_film }}" target="_blank">{{ $project->info->link_film }}</a></p>
            </div>
            <div class="col-md-6">
                <p class="mb-1">Link website</p>
               <p> {{ $project->info->link_website }}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1">Trạng thái</p>
                @if( $project->info->published ==0 )
                    <span class="badge badge-danger">Riêng tư</span>
                @else
                    <span class="badge badge-success">Công khai</span>
                @endif
            </div>
            <div class="col-12 mt-4 d-flex justify-content-center">
                  <a href="{{ route('admin.info.editProject',[$project->id]) }}" class="btn btn-info" style="width: 125px">@lang('global.app_edit')</a>
            </div> --}}
        </div>
        {{-- <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ $project != null ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>Tên dự án</th>
                        <th>Logo</th>
                        <th>Thumbnail</th>
                        <th>Số ĐT</th>
                        <th>Link thông tin</th>
                        <th>Link file</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                    @if ($project != null)
                     
                            <tr data-entry-id="{{ $project->id }}">
                                <td>{{ $project->title }}</td>
                                @if($project->info != null)
                                    @if($project->info->logo ==null)
                                        <td><p></p></td>
                                    @else
                                        <td><img src={{ $project->info->logo }} width =80px height= 50px > </td>
                                    @endif
                                    <td><img src={{ $project->info->thumbnail }} withd ='80px' height= '50px' ></td>
                                    <td>{{ $project->info->phone }}</td>
                                    <td>{{ $project->info->link_register }}</td>
                                    <td>{{ $project->info->link_film }}</td>
                                    <td>
                                        @if( $project->info->published ==0 )
                                            <span class="badge badge-danger">Riêng tư</span>
                                        @else
                                            <span class="badge badge-success">Công khai</span>
                                        @endif
                                    </td>
                                @endif
                                @can('create_project')
                                <td>
                                    @if($project->info !=null)
                                        <a href="{{ route('admin.info.editProject',[$project->id]) }}" class="btn btn-sm btn-info">@lang('global.app_edit')</a>
                                    @else
                                        <a href="{{ route('admin.info.showProject',[$project->id]) }}" class="btn btn-sm btn-info">@lang('global.app_create')</a>
                                    @endif
                                </td>
                                @endcan
                            </tr>
            
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div> --}}
    </div>
@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection
    