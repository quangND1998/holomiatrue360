@extends('layouts.app')

@section('content')
    {{-- <h3 class="page-title">@lang('global.permissions.title')</h3>
    
    {!! Form::model($permission, ['method' => 'PUT', 'route' => ['admin.permissions.update', $permission->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
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
                <a href="javascript:void(0)">@lang('global.permissions.title')</a>
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
                        <h4 class="page-title mb-0">Chỉnh sửa tên quyền</h4>
                       
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="name">Tên quyền</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên quyền" value={{$permission->name}}>
                        </div>
                        <div class="mx-auto mt-4 text-center">
                            <button class="btn btn-danger" style="width: 100px">Hủy</button>
                            <button type="submit" class="btn btn-success" style="width: 100px"> 
                                <span class="btn-label">
                                    <i class="fas fa-save"></i>
                                </span>
                                Lưu lại
                            </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
@stop

