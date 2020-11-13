@inject('request', 'Illuminate\Http\Request')

@extends('client.project.manager')

@section('content-info')


<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">Thêm tiện ích</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Thêm tiện ích</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  class="form-group"  method="POST" action="{{ route('admin.amentities.store',[$project->id]) }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="amentites-name">Tên tiện ích</label>
                <input type="text" class="form-control" name="title" id="amentites-name" placeholder="Nhập vào tên tiện ích" required oninvalid="setCustomValidity('Vui lòng nhập vào tên tiện ích')" >
                @if ($errors->has('title'))
                    <span class="text-red" role="alert">
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    </span>
                @endif
            </div>

            @if($allFolders != null)
                <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                    <label>Folder cha</label>
                    <select id="parent_id" name="parent_id" class="form-control">
                        <option value="">--Chọn folder cha--</option>
                        @foreach($allFolders as $rows)
                            <option value={{ $rows }}>{{ $rows }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('parent_id'))
                        <span class="text-red" role="alert">
                            <strong>{{ $errors->first('parent_id') }}</strong>
                        </span>
                    @endif
                </div>
            @endif

            <div class="form-group {{ $errors->has('images[]') ? 'has-error' : '' }}">
                <label for="amentites-img">Ảnh tiện ích</label>
                <input type="file" class="form-control-file" id="amentites-img" name="images[]" required oninvalid="setCustomValidity('Vui lòng nhập vào ảnh phân khu')" accept="" multiple>
                {{-- <small id="" class="form-text text-muted">Là file .zip chứa 60 ảnh của phân khu.</small> --}}
                @if ($errors->has('images[]'))
                    <span class="text-red" role="alert">
                        <p class="text-danger">{{ $errors->first('images[]') }}</p>
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
<a  href="{{ route('admin.amentities.create3Dimage',[$project->id]) }}" class="btn  btn-success mb-3">@lang('global.app_create')</a>
 

    <div class="row">
         @foreach ($amentities->amentities as  $item)
         @if($item->title !=null)
            <div class="col-md-3 col-sm-6 col-12 amentites__item">
                 <a href="{{ route('admin.amentities.createFoler',[$item->id,Str::slug($item->title)]) }}">
                    <div class="amentites__info h-100">
                        <img class="card-img-top" src="{{ $item->folder_image }}/{{ Str::slug($item->title, '-') }}/1.jpg" alt="Card image cap">
                        <div class="card-body text-center overlay">
                            {{ $item->title }}
                        </div>
                    </div>
                 </a>
            </div>
            @else
            <a  href="{{ $item->folder_image }}" target="_blank">Link <img src="admin/icon/preview.png"></a>
            @endif
        @endforeach
 
    </div>

    

    


 

   
@stop
@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection