@inject('request', 'Illuminate\Http\Request')
@extends('client.project.manager')

@section('content-info')
<h2 class="page-title">{{ $subdivision->title }}</h2>
    @can('create_project' ) 

    <nav class="navbar navbar-inverse">
      
          <ul class="nav navbar-nav">
            <li class="active"><a  href="{{ route('admin.subdivision.model_ar',[$subdivision->id]) }}">Model AR</a></li>

            <li><a href="{{ route('admin.subdivision.creatground',[$subdivision->id]) }}"> Mặt Bằng</a>
          
            </li>
      
          </ul>
   
        
      </nav>
        
      <div class="container">
          @yield('content-info')
        
      </div>


    @endcan()



@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection
    