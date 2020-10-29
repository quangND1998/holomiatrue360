@inject('request', 'Illuminate\Http\Request')

@extends('client.project.manager')

@section('content-info')
    <h3 class="page-title">{{ $subdivision->title }}</h3>

        <button  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Create Project</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form  class="form-group"  method="POST" action="{{ route('admin.ground.storeGround',[$subdivision->id]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tạo mới Mặt Bằng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
             
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="recipient-name" class="col-form-label">Tên Mặt Bằng:</label>
                            <input type="text" class="form-control" id="title" name ="title">
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
            </div>
        </div>

    <div class="panel panel-default">
   
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ $subdivision->model_ar  !=null ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        
                        <th>STT </th>
                        <th>Tên Mặt Bằng</th>
                        <th>Image</th>
                        <th>Action</th>

               

               
                    </tr>
                </thead>
                <tbody>
                    @if ($subdivision->ground  !=null)
             
                       @foreach ($subdivision->ground as $item)
                           
                     
                            <tr data-entry-id="{{ $item->id }}">
                                
                                <td>{{ $count++ }}</td>

                         
                            
                                <td>{{ $item->title }}</td>
                             
                                <td><img src="{{ $item->image }}" width="50px" height="50px">
                                  
                               
                              


                                <td>
                                  
                                    <a href="{{ route('admin.ground.edit',[$item->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ground.destroy', $item->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                          
                                </td>
    
                            
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection