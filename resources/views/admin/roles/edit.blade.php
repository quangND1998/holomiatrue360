@extends('layouts.app')

@section('content')
    {{-- <h3 class="page-title">@lang('global.roles.title')</h3>
    
    {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update', $role->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('permission', 'Permissions', ['class' => 'control-label']) !!}
                    {!! Form::select('permission[]', $permissions, old('permission') ? old('permission') : $role->permissions()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('permission'))
                        <p class="help-block">
                            {{ $errors->first('permission') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!} --}}
    
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
                        <h4 class="page-title mb-0">Chỉnh sửa phân quyền</h4>
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Tên phân quyền</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Tên phân quyền" value="{{ $role->name }}">
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group py-0 {{ $errors->has('permission') ? 'has-error' : '' }}" >
                            <label>Phân quyền</label>
                                <select name="permission[]"  data-placeholder="Chọn quyền" class="chosen-select" multiple tabindex="4" >
                                    <option value=""></option>
                                    @foreach($permissions as $permission)
                                        <option
                                        @foreach ($role->permissions as $per)
                                            @if($per->id == $permission->id)
                                            selected
                                            @endif
                                        @endforeach
                                         value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('permission'))
                                <p class="help-block">
                                    {{ $errors->first('permission') }}
                                </p>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <div class="mx-auto mt-4 text-center">
                                <a  href="{{ url('/admin/roles') }}" class="btn btn-danger" style="width: 100px">Hủy</a>
                                <button type="submit" class="btn btn-success" style="width: 100px"> 
                                    <span class="btn-label">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    Lưu lại
                                </button>
                            </div>
                        </div>
   
                   </form>
                </div>
            </div>
        </div>
    </div>
    
@stop

