@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')
@section('content-info')

    @if($address->address ==null)
       
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addMap">Thêm địa chỉ</button>
        <div class="modal fade" id="addMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm địa chỉ</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form  class="form-group"  method="POST" action="{{ route('admin.address.address_store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                        <div class="row">
                            <div class="form-group col-12 {{ $errors->has('address') ? 'has-error' : '' }}">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Nhập vào địa chỉ" required oninvalid="setCustomValidity('Vui lòng nhập vào địa chỉ')" >
                                @if ($errors->has('address'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-6 {{ $errors->has('longtitude') ? 'has-error' : '' }}">
                                <label for="longtitude">Kinh độ</label>
                                <input type="text" class="form-control" name="longtitude" id="longtitude" placeholder="Nhập vào kinh độ" required oninvalid="setCustomValidity('Vui lòng nhập vào kinh độ')" >
                                @if ($errors->has('longtitude'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('longtitude') }}</p>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group col-6 {{ $errors->has('latitude') ? 'has-error' : '' }}">
                                <label for="latitude">Vĩ độ</label>
                                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Nhập vào vĩ độ" required oninvalid="setCustomValidity('Vui lòng nhập vào vĩ độ')" >
                                @if ($errors->has('latitude'))
                                    <span class="text-red" role="alert">
                                        <p class="text-danger">{{ $errors->first('latitude') }}</p>
                                    </span>
                                @endif
                            </div>
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
    @endif

    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ $address->address  !=null ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Địa chỉ</th>
                        <th>Kinh độ </th>
                        <th>Vĩ độ </th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($address->address  !=null)
                        <tr>
                            <td>{{$count++  }}</td>
                            <td>{{$address->address->address }}</td>
                            <td>{{$address->address->longtitude }}</td>
                            <td>{{$address->address->latitude }}</td>
                            <td>
                                <a href="{{ route('admin.address.edit',[Str::slug($address->title),$address->address->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection