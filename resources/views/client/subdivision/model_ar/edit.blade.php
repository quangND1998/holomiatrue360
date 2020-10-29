@inject('request', 'Illuminate\Http\Request')

@extends('client.project.manager')

@section('content-info')
    <h3 class="page-title"> {{ $project->title }} -Chỉnh Sửa  Model AR</h3>

    <form role="form" id="category" method="POST" action="{{ route('admin.model_ar.updatesubdivision',$model_ar->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="col-md-6">
            <div class="form-group  {{ $errors->has('model_glb') ? 'has-error' : '' }}">

                
                <label>Android : </label>
          
                <input type="file" name="model_glb">

                @if ($errors->has('model_glb'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('model_glb') }}</strong>
                    </span>
                @endif
              
        
            </div>
        </div>



  
        <div class="col-md-6">
            <div class="form-group  {{ $errors->has('model_usdz') ? 'has-error' : '' }}">

                
                <label>IOS : </label>
          
                <input type="file" name="model_usdz">

                @if ($errors->has('model_usdz'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('model_usdz
                        ') }}</strong>
                    </span>
                @endif
              
        
            </div>
        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-success">Add New</button>
    
        </div>
   


    </form>


 
@stop

@section('javascript') 
    <script>
        //window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection       