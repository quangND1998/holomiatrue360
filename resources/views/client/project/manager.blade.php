@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')

@can('create_project' )
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
                <a href="{{ route('admin.project.index') }}">Dự án</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ $project->title }}</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-12 px-md-0">
            <div class="card mb-0 ml-md-3 ml-0 mb-4">
                <div class="card-body p-0" style="background: #ececec">
                    <ul class="nav nav-pills nav-warning" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a  href="{{ route('admin.info.getinfo',[$project->id]) }}" class="nav-link my-0 {{ Request::segment(4) === 'info' ? 'active' : null }}"  aria-selected="true">Thông tin dự án</a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ route('admin.general.showGeneral',[$project->id]) }}" class="nav-link my-0 {{ Request::segment(4) === 'general' ? 'active' : null }}"   aria-selected="false">Tổng thể</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.subdivision.showSubdivision',[$project->id]) }}" class="nav-link my-0 {{ Request::segment(4) === 'subdivision' ? 'active' : null }} " aria-selected="false">Phân khu</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.showflat.show',[$project->id]) }}" class="nav-link my-0 {{ Request::segment(4) === 'showflat' ? 'active' : null }} " aria-selected="false">Căn hộ tham khảo</a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ route('admin.amentities.show',[$project->id]) }}"  class="nav-link my-0 {{ Request::segment(4) === 'amentities' ? 'active' : null }} " aria-selected="false">Tiện ích</a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ route('admin.address.show',[$project->id]) }}" class="nav-link my-0 {{ Request::segment(4) === 'address' ? 'active' : null }} "  aria-selected="false"> Địa chỉ dự án</a>
                        </li>
                        <li class="nav-item">
                            <a   href="{{ route('admin.map.show',[$project->id]) }}" class="nav-link my-0  {{ Request::segment(4) === 'map' ? 'active' : null }} " aria-selected="false">Bản đồ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        @yield('content-info')
    </div>
@endcan()




@endsection
    