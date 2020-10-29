@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')
    <h3 class="page-title">Cập nhật Ảnh Sa Bàn Ngày</h3>

    <form role="form" id="category" method="POST" action="{{ route('admin.general.updateImgNight_Day',$genelralview->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-md-6">
            <div class="form-group  {{ $errors->has('folder_img_day') ? 'has-error' : '' }}">

                
                <label>Sa bàn Ngày : </label>
          
                <input type="file" name="folder_img_day">

                @if ($errors->has('folder_img_day'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('folder_img_day') }}</strong>
                    </span>
                @endif
              
        
            </div>
        </div>
        <div class="form-group">
            <a href="{{ url('/admin/project/'.$project->id.'/general') }}" class="btn btn-danger text-light"  style="width: 80px">Hủy</a>
            <button type="submit" class="btn btn-success">Add New</button>
    
        </div>
   


    </form>


 
@stop

@section('javascript') 
    <script>
        //window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection       