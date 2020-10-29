@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')
@section('content-info')
    {{-- <h3 class="page-title">Cập nhật Ảnh Hiện Trạng</h3> --}}

    <form role="form" id="category" method="POST" action="{{ route('admin.general.updatePresentImg',$genelralview->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-md-6 px-md-0">
             <div class="form-group {{ $errors->has('folder_present_image') ? 'has-error' : '' }}">
                <div class="card-title mb-3">Cập nhật ảnh hiện trạng</div>
                <input type="file" class="form-control-file" id="folder_present_image" name="folder_present_image" required oninvalid="setCustomValidity('Nhập vào ảnh hiện trạng mới')">
                 @if ($errors->has('folder_present_image'))
                    <span class="text-red" role="alert">
                        <span class="text-danger">{{ $errors->first('folder_present_image') }}</span>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <a href="{{ url('/admin/project/'.$project->id.'/general') }}" class="btn btn-danger text-light"  style="width: 80px">Hủy</a>
            <button type="submit" class="btn btn-success" style="width: 80px">Lưu lại</button>
        </div>
   


    </form>


 
@stop

@section('javascript') 
    <script>
        //window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection       