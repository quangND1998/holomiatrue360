@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')
@section('content-info')


<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">Thêm phân khu</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Thêm phân khu</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form role="form" id="formAdd" method="POST" action="{{ route('admin.subdivision.storesubdivision',$project->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="subdivision-name">Tên phân khu</label>
                <input type="text" class="form-control" name="title" id="subdivision-name" placeholder="Nhập vào tên phân khu" required oninvalid="setCustomValidity('Vui lòng nhập vào tên phân khu')" >
                @if ($errors->has('title'))
                    <span class="text-red" role="alert">
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('folder_image') ? 'has-error' : '' }}">
                <label for="subdivision-img">Ảnh phân khu</label>
                <input type="file" class="form-control-file" id="subdivision-img" name="folder_image" required oninvalid="setCustomValidity('Vui lòng nhập vào ảnh phân khu')" accept=".zip">
                <small id="" class="form-text text-muted">Là file .zip chứa 60 ảnh của phân khu.</small>
                @if ($errors->has('folder_image'))
                    <span class="text-red" role="alert">
                        <p class="text-danger">{{ $errors->first('folder_image') }}</p>
                    </span>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-info">Thêm</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



@if($subdivisions->subdivision !=null)
<div class="row">
    @foreach ($subdivisions->subdivision as $item )
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card border">
              <img class="card-img-top" src="{{ $item->folder_image }}0.jpg" alt="Card image cap">
              <div class="card-body text-center">
                <h5 class="card-title mb-2 fw-mediumbold">{{ $item->title }}</h5>
                     <a href="{{ route('admin.subdivision.creatground',[$item->id]) }}" class="btn btn-round btn-warning" data-toggle="tooltip" data-placement="bottom" title="Mặt bằng">
                         <i class="fas fa-newspaper"></i>
                    </a>

                     <a href="{{ route('admin.subdivision.model_ar',[$item->id]) }} " class="btn btn-round btn-danger" data-toggle="tooltip" data-placement="bottom" title="Model AR">
                         <i class="fab fa-codepen"></i>
                    </a>

                     <a href="{{ route('admin.subdivision.edit',[$item->id]) }}" class="btn btn-round btn-info" data-toggle="tooltip" data-placement="bottom" title="Chỉnh sửa">
                          <i class="fa fa-edit"></i>
                    </a>
              </div>
          </div>
        </div>
    @endforeach
</div>

 @endif
  @stop

  @section('javascript')
      <script>
          window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
      </script>
  @endsection

