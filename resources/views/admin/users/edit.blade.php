@extends('layouts.app')

@section('content')
    {{-- <h3 class="page-title">@lang('global.users.title')</h3>
    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}

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
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
                    {!! Form::select('roles[]', $roles, old('roles') ? old('roles') : $user->roles()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('roles'))
                        <p class="help-block">
                            {{ $errors->first('roles') }}
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
                <a href="javascript:void(0)">@lang('global.users.title')</a>
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
                        <h4 class="page-title mb-0">Chỉnh sửa nhân viên</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group col-md-5 {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label>Tên nhân viên</label>
                            <input id="editName" type="text" name="name" class="form-control" placeholder="Nhập vào tên nhân viên" required oninvalid="setCustomValidity('Vui lòng nhập vào tên nhân viên')" value={{$user->name}}>
                            @if ($errors->has('title'))
                                <span class="text-red" >
                                    <P class="text-danger">{{ $errors->first('name') }}</P>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-5 {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label>Email</label>
                            <input id="editEmail" type="text" name="email" class="form-control" placeholder="Nhập vào email nhân viên" required oninvalid="setCustomValidity('Vui lòng nhập vào email nhân viên')" value={{$user->email}}>
                            @if ($errors->has('title'))
                                <span class="text-red" >
                                    <P class="text-danger">{{ $errors->first('email') }}</P>
                                </span>
                            @endif
                        </div>
                        <div class="form-group  col-md-5 {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label>Mật khẩu</label>
                            <input id="editPassword" type="password" name="password"  class="form-control" placeholder="Nhập vào mật khẩu" required oninvalid="setCustomValidity('Vui lòng nhập vào mật khẩu')">
                            @if ($errors->has('password'))
                                <span class="text-red" >
                                    <P class="text-danger">{{ $errors->first('password') }}</P>
                                </span>
                            @endif
                        </div>
                        <div class="form-group py-0 col-md-5 {{ $errors->has('roles') ? 'has-error' : '' }}"">
                            <label>Phân quyền</label>
                            <select name="roles[]" data-placeholder="Chọn quyền" class="chosen-select " multiple tabindex="4">
                                <option value=""></option>
                                @foreach($roles as $role)
                                <option
                                @foreach ($user->roles as $item)
                                    @if($item->id == $role->id)
                                    selected
                                    @endif
                                @endforeach
                                 value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                            </select>

                        </div>
                        <div class="mx-auto mt-4 text-center">
                            <a href="{{ url('/admin/users') }}" class="btn btn-danger" style="width: 100px">Hủy</a>
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

