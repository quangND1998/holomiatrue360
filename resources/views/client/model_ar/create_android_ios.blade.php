@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')
    {{-- <h3 class="page-title">Model AR</h3>
    <form role="form" id="category" method="POST" action="{{ route('admin.model_ar.generalstore',$generalview->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @if($generalview->model_ar == null || $generalview->model_ar->model_glb == null)   
        <div class="col-md-6">
            <div class="form-group  {{ $errors->has('model_glb') ? 'has-error' : '' }}">
                <label style="width: 50px">Android </label>:
                <input type="file" name="model_glb" accept=".glb">
                @if ($errors->has('model_glb'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('model_glb') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @endif
        @if($generalview->model_ar ==null || $generalview->model_ar->model_usdz ==null)   
        <div class="col-md-6">
            <div class="form-group  {{ $errors->has('model_usdz') ? 'has-error' : '' }}">
                <label style="width: 50px">IOS </label>:
                <input type="file" name="model_usdz"  accept=".usdz">
                @if ($errors->has('model_usdz'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('model_usdz
                        ') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @endif
        <div class="form-group">
            <a href="{{ url('/admin/project/'.$project->id.'/general') }}" class="btn btn-danger text-light"  style="width: 80px">Hủy</a>
            <button type="submit" class="btn btn-success" style="width: 80px">Thêm</button>
        </div>
    </form> --}}

  <div class="row">
    <div class="col-md-12">
          <form role="form" id="category" method="POST" action="{{ route('admin.model_ar.generalstore',$generalview->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                     <h4 class="card-title">Thêm Model AR</h4>
                </div>
                <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                    <div class="row">
                         @if($generalview->model_ar == null || $generalview->model_ar->model_glb == null)   
                            <div class="col-md-12 col-12">
                                <div class="form-group col-md-4 {{ $errors->has('model_glb') ? 'has-error' : '' }}">
                                    <label for="model_glb">Android</label>
                                    <input type="file" class="form-control-file" id="model_glb" name="model_glb" required oninvalid="setCustomValidity('Vui lòng nhập vào model AR dành cho android')" accept=".glb">
                                    @if ($errors->has('model_glb'))
                                        <span class="text-red" role="alert">
                                            <p class="text-danger">{{ $errors->first('model_glb') }}</p>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                         @if($generalview->model_ar ==null || $generalview->model_ar->model_usdz ==null)
                            <div class="col-md-12 col-12">
                                <div class="form-group col-md-4 {{ $errors->has('model_usdz') ? 'has-error' : '' }}">
                                    <label for="model_usdz">IOS</label>
                                    <input type="file" class="form-control-file" id="model_usdz" name="model_usdz" required oninvalid="setCustomValidity('Vui lòng nhập vào model AR dành cho IOS')" accept=".usdz">
                                    @if ($errors->has('model_usdz'))
                                        <span class="text-red" role="alert">
                                            <p class="text-danger">{{ $errors->first('model_usdz') }}</p>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group mt-4">
                    <a href="{{ url('admin/project/'.$project->id.'/general') }}" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                    <button type="submit" class="btn btn-info">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
</div>
 
@stop

@section('javascript') 
    <script>
        //window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection       