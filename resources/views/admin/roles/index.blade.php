@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
     <div class="page-header">
        <ul class="breadcrumbs pl-0 ml-md-0 border-0">
            <li class="nav-home">
                <a href="#">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a  href="javascript:void(0)">@lang('global.roles.title')</a>
            </li>
        </ul>
        <div class="btn-group btn-group-page-header ml-auto">
            <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu">
                <div class="arrow"></div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     <div class="d-flex align-items-center">
                        <h4 class="page-title mb-0">@lang('global.roles.title')</h4>
                        <button class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#addrole">
                            <i class="fa fa-plus"></i>
                            Thêm
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Modal add --}}
                    <div class="modal fade" id="addrole" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form  class="form-group" method="POST" action="{{ route('admin.roles.store') }}">
                                {{ csrf_field() }}
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h2 class="modal-title">
                                            <span class="fw-bold">Thêm</span>
                                            <span class="fw-bold">phân quyền</span>
                                        </h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="row" >
                                                <div class="col-sm-12">
                                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                        <label>Tên phân quyền</label>
                                                        <input id="addName" type="text" name="name" class="form-control" placeholder="Nhập vào tên phân quyền" required oninvalid="setCustomValidity('Vui lòng nhập vào tên phân quyền')">
                                                        @if ($errors->has('title'))
                                                            <span class="text-red" >
                                                                <P class="text-danger">{{ $errors->first('title') }}</P>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group py-0">
                                                        <label>Chọn quyền</label>
                                                        <select name="permission[]" data-placeholder="Chọn quyền" class="chosen-select" multiple tabindex="4">
                                                            <option value=""></option>
                                                             @foreach($permissions as $permission)
                                                                <option value={{ $permission }}>{{ $permission }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <a href="{{ url('/admin/roles') }}" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                                        <button type="submit" id="addRowButton" class="btn btn-info">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- end modal add --}}
                    <div class="table-responsive">
                         <table id="add-row" class="display table table-striped table-hover {{ count($roles) > 0 ? 'datatable' : '' }} dt-select">
                            <thead>
                                <tr>
                                    <th>@lang('global.roles.fields.name')</th>
                                    <th>QUYỀN</th>
                                    <th>HÀNH ĐỘNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($roles) > 0)
                                    @foreach ($roles as $role)
                                        <tr data-entry-id="{{ $role->id }}">
                                            <td>{{ $role->name }}</td>
                                             <td>
                                                @foreach ($role->permissions()->pluck('name') as $permission)
                                                    <span class="badge badge-muted" >{{ $permission }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                                {!! Form::open(array(
                                                    'style' => 'display: inline-block;',
                                                    'method' => 'DELETE',
                                                    'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                    'route' => ['admin.roles.destroy', $role->id])) !!}
                                                {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                 {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">@lang('global.app_no_entries_in_table')</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
    </script>
 
@endsection