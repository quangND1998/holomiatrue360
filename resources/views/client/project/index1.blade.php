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
                        <a  href="{{ route('admin.dashboard') }}">Dự án</a>
                    </li>
                </ul>
            </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="page-title">Danh sách dự án</h4>
                                        <button class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                            <i class="fa fa-plus"></i>
                                            Thêm dự án
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Modal -->
                                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form  class="form-group"  method="POST" action="{{ route('admin.project.store') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-content">
                                                    <div class="modal-header no-bd">
                                                        <h2 class="modal-title">
                                                            <span class="fw-bold">Thêm</span>
                                                            <span class="fw-bold">dự án</span>
                                                        </h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
                                                            <div class="row" >
                                                                <div class="col-sm-12">
                                                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                                        <label>Tên dự án</label>
                                                                        <input id="addName" type="text" name="title" class="form-control" placeholder="Nhập vào tên dự án" required oninvalid="setCustomValidity('Vui lòng nhập vào tên dự án')">
                                                                        @if ($errors->has('title'))
                                                                            <span class="text-red" >
                                                                                <P class="text-danger">{{ $errors->first('title') }}</P>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                                        <button type="submit" id="addRowButton" class="btn btn-info">Thêm</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên dự án</th>
                                                    <th>Logo</th>
                                                    <th>Trạng thái</th>
                                                    <th>Preview</th>
                                                    <th>Bộ phận</th>
                                                    <th>Thời gian tạo</th>
                                                    <th style="width: 10%">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($projects) > 0)

                                                @foreach ($projects as $project)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td><a href="{{ route('admin.info.getinfo',[$project->id]) }}">{{ $project->title }}</td>
                                                        @if($project->info != null)
                                                            @if($project->info->logo ==null)
                                                                <td><p></p></td>
                                                            @else
                                                                <td><img src={{ $project->info->logo }} width =80px height= 50px > </td>
                                                            @endif
                                                        <td>@if( $project->info->published ==0 )
                                                                <span class="badge badge-danger" style="width:70px ">Riêng tư</span>
                                                            @else
                                                                <span class="badge badge-success" style="width: 70px">Công khai</span>
                                                            @endif
                                                        </td>
                                                        <td>@if( $project->info->published ==0 ||  $project->general->folder_present_image == null )
                                                            <p></p>
                                                        @else
                                                            <a href="project/{{ $project->title }}" target="_blank">Link <img src="admin/icon/preview.png"></a>
                                                        @endif
                                                    </td>
                                                        <td>{{$project->user->name}}</td>
                                                        <td>{{ $project->created_at}}</td>
                                                        @endif
                                                        @can('create_project')
                                                    <td>
                                                        @if($project->info !=null)
                                                        <div class="form-button-action">
                                                            <a  href="{{ route('admin.info.editProject',[$project->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg" data-original-title="Chỉnh sửa">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            @else
                                                            <a href="{{ route('admin.info.showProject',[$project->id]) }}"  type="button" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Tạo mới thông tin " >
                                                                Tạo Mới 
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    @endcan
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @endif
                                        </table>
                                        {!! $projects->links('client.pagination') !!}
 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              

@endsection