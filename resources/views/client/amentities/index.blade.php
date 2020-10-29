@inject('request', 'Illuminate\Http\Request')


@extends('client.project.manager')

@section('content-info')
<h3 class="page-title">Tiện ích dự án {{ $project->title }}</h3>
    <p>
        <a href="{{ route('admin.amentities.create',[$project->id]) }}" class="btn btn-success">Them Moi</a>
    </p>



@stop
@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection