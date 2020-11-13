@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')
@section('content-info')
 
<div class="row">
    <div class="col-md-12">
        <form  class="form-group"  method="POST" action="{{ route('admin.address.updateAddress',[$project->title,$address->id]) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <input type="hidden" name="project_id" value="{{$project->id}}">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                     <h4 class="card-title">Chỉnh sửa địa chỉ dự án</h4>
                </div>
                <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                    <div class="row col-md-4">
                            <div class="form-group col-md-12 {{ $errors->has('address') ? 'has-error' : '' }}">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Nhập vào địa chỉ" required oninvalid="setCustomValidity('Vui lòng nhập vào địa chỉ')" value="{{ $address->address }}">
                                @if ($errors->has('address'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('longtitude') ? 'has-error' : '' }}">
                                <label for="longtitude">Kinh độ</label>
                                <input type="text" class="form-control" name="longtitude" id="longtitude" placeholder="Nhập vào kinh độ" required oninvalid="setCustomValidity('Vui lòng nhập vào kinh độ')" value="{{ $address->longtitude }}">
                                @if ($errors->has('longtitude'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('longtitude') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('latitude') ? 'has-error' : '' }}">
                                <label for="latitude">Vĩ độ</label>
                                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Nhập vào vĩ độ" required oninvalid="setCustomValidity('Vui lòng nhập vào vĩ độ')"  value="{{ $address->latitude }}">
                                @if ($errors->has('latitude'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('latitude') }}</p>
                                    </span>
                                @endif
                            </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <a href="{{ url('admin/project/'.$project->id.'/address') }}" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                    <button type="submit" class="btn btn-info">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
</div>


{{-- <form  class="form-group"  method="POST" action="{{ route('admin.address.updateAddress',[$project->title,$address->id]) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                        <div class="row">
                            <div class="form-group col-12 {{ $errors->has('address') ? 'has-error' : '' }}">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Nhập vào địa chỉ" required oninvalid="setCustomValidity('Vui lòng nhập vào địa chỉ')" value="{{ $address->address }}">
                                @if ($errors->has('address'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-6 {{ $errors->has('longtitude') ? 'has-error' : '' }}">
                                <label for="longtitude">Kinh độ</label>
                                <input type="text" class="form-control" name="longtitude" id="longtitude" placeholder="Nhập vào kinh độ" required oninvalid="setCustomValidity('Vui lòng nhập vào kinh độ')" value="{{ $address->longtitude }}">
                                @if ($errors->has('longtitude'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('longtitude') }}</p>
                                    </span>
                                @endif
                            </div>
                        <div class="form-group col-6 {{ $errors->has('latitude') ? 'has-error' : '' }}">
                            <label for="latitude">Vĩ độ</label>
                            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Nhập vào vĩ độ" required oninvalid="setCustomValidity('Vui lòng nhập vào vĩ độ')"  value="{{ $address->latitude }}">
                            @if ($errors->has('latitude'))
                                <span class="text-red" role="alert">
                                    <p class="text-danger">{{ $errors->first('latitude') }}</p>
                                </span>
                            @endif
                        </div>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="{{ url('admin/project/'.$project->id.'/address') }}" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                            <button type="submit" class="btn btn-info">Lưu lại</button>
                        </div>
                    </form> --}}





@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection