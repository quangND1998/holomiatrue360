@inject('request', 'Illuminate\Http\Request')

@extends('client.project.manager')

@section('content-info')

<h3 class="page-title">{{ $subdivision->title }}</h3>
<form  class="form-group"  method="POST" action="{{ route('admin.ground.updateGround',[$ground->id]) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tạo mới {{ $ground->title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="recipient-name" class="col-form-label">Tên Mặt Bằng:</label>
            <input type="text" class="form-control" id="title" name ="title" value="{{ $ground->title }}">
                @if ($errors->has('title'))
                    <span class="text-red" >
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

     
            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
            <label for="recipient-name" class="col-form-label">Ảnh Mặt Bằng</label>
            <input type="file" class="form-control" id="image" name ="image">
                @if ($errors->has('image'))
                    <span class="text-red" >
                        <strong>{{ $errors->first('image') }}</strong>
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





@stop
@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection