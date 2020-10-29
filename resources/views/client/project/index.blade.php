@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Project List</h3>
    @can('create_project' ) 


    <div>
        <button   class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Create Project</button>
            <div  class="modal fade {{ count($errors) > 0 ? 'show' : '' }}" id="addRowModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" id="modal">
                    <form  class="form-group"  method="POST" action="{{ route('admin.project.store') }}" >
                        {{ csrf_field() }}
                        <div class="modal-content" >
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="recipient-name" class="col-form-label">Tên Dự Án:</label>
                                <input type="text" class="form-control" id="title" name ="title">
                                    @if ($errors->has('title'))
                                        <span class="text-red" >
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="recipient-name" class="col-form-label">Tên Dự Án:</label>
                                    <input type="text" class="form-control" id="title" name ="title">
                                        @if ($errors->has('title'))
                                            <span class="text-red" >
                                                <strong>{{ $errors->first('title') }}</strong>
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
    </div>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($projects) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Tên Dự Án </th>
                        <th>Logo</th>
                        <th>Trạng thái</th>
                        <th>Preview</th>
                        <th>Bộ phận</th>
                        <th>Creat at</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($projects) > 0)
                        @foreach ($projects as $project)
                            <tr data-entry-id="{{ $project->id }}">

                                <td></td>
                                @can('create_project')
                                <td><a href="{{ route('admin.info.project',[$project->id]) }}">{{ $project->title }}</a></td>
                                @endcan
                                @can('sales')

                                <td>{{ $project->title }}</td>
                                @endcan

                                @if($project->info != null)
                                <td><img src={{ $project->info->logo }} width ='80px' height= '50px' ></td>
                                <th>@if( $project->info->published ==0 )
                                        <span class="label label-danger">Private</span>
                                    @else
                                        <span class="label label-success">Public</span>
                                    @endif
                                </th>
                                <th>@if( $project->info->published ==0 )
                                    <p></p>
                                @else
                                    <a href="project/{{$project->title}}" target="_blank">Link <img src="admin/icon/preview.png"></a>
                                @endif
                            </th>

                                <th>{{$project->user->name}}</td>
                                <td>{{ $project->created_at}}</td>
                                @endif
                                @can('create_project')
                                <td>
                                    @if($project->info !=null)
                                        <a href="{{ route('admin.info.edit',[$project->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @else
                                    <a href="{{ route('admin.info.show',[$project->id]) }}" class="btn btn-xs btn-info">@lang('global.app_create')</a>
                                    @endif
                                </td>
                                @endcan
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



