@inject('request', 'Illuminate\Http\Request')


@extends('client.project.manager')

@section('content-info')
@can('create_project' ) 
<h3 class="page-title"> ThêmTiện ích dự án {{ $project->title }}</h3>


<div>
    <button   class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Create Project</button>
        <div  class="modal fade {{ count($errors) > 0 ? 'show' : '' }}" id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" id="modal">
                <form  class="form-group"  method="POST" action="{{ route('admin.amentities.store',[$project->id]) }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-content" >
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="recipient-name" class="col-form-label">Tên folder con</label>
                            <input type="text" class="form-control" id="title" name ="title">
                                @if ($errors->has('title'))
                                    <span class="text-red" >
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if($allFolders != null)
                            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">

                                <label>Folder Cha:</label>
                                <select id="parent_id" name="parent_id" class="form-control">
                                    <option value="0">Select</option>
                                    @foreach($allFolders as $rows)
                                            <option value={{ $rows }} >{{ $rows }}</option>
                                    @endforeach
                                </select>
        
                                @if ($errors->has('parent_id'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                @endif
        
                            {{-- </div>
                            <div class="form-group {{ $errors->has('images') ? 'has-error' : '' }}">
                                <label for="recipient-name" class="col-form-label">Ảnh</label>
                                <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
                                    @if ($errors->has('images'))
                                        <span class="text-red" >
                                            <strong>{{ $errors->first('images') }}</strong>
                                        </span>
                                    @endif
                                </div> --}}
                            @endif

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
</div>
@endcan



@stop
@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection