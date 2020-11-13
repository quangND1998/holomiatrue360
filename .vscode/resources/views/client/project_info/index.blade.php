@inject('request', 'Illuminate\Http\Request')

@extends('client.project.manager')

@section('content-info')
    @if($project->info !=null)
    <div class="panel panel-default info-tab">
        <div class="row">
            <div class="form-group col-md-6 col-sm-12 col-12 order-sm-1 order-md-1 order-1">
                <label for="">Logo</label>
                <div class="text-center border w-50 mx-sm-auto mx-auto mx-md-0">
                    <img class="" src="{{ $project->info->logo }}" width="100%" height="auto" alt="">
                </div>
            </div>
             <div class="form-group col-md-6 col-sm-12 col-12 order-sm-2 order-md-2 order-2">
                <label for="">Thumbnail</label>
                <div class="text-center border w-50 mx-sm-auto mx-auto mx-md-0">
                    <img class="" src="{{ $project->info->thumbnail }}" width="100%" height="auto" alt="">
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
                <label for="">Website dự án</label>
                <input type="text" name="link_youtube" value="{{ $project->info->link_website }}" class="form-control font-weight-bold" id="" readonly>
            </div>
            <div class="col-12 text-center mt-4 pb-3 order-sm-9 order-md-9 order-9">
                <a href="{{ route('admin.info.editProject',[$project->id]) }}" class="btn btn-info" style="width: 125px">@lang('global.app_edit')</a>
            </div>
          
        </div>
        @else   
            <h1>Bạn chưa nhập thông tin dự án</h1>
            <a href="{{ route('admin.info.showProject',[$project->id]) }}"  type="button" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Tạo mới thông tin " >
                Tạo Mới 
            </a>
        @endif
       
    </div>
@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection
    