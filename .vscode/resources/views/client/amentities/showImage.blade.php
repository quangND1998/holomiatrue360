@inject('request', 'Illuminate\Http\Request')

@extends('client.project.manager')

@section('content-info')


<div class="row">
    @foreach ($images as $item )
        <div class="col-md-3 col-sm-6 col-12 amentites__item mb-3">
            <div class="amentites__info h-100">
                <img class="card-img-top h-100" src="{{ $amentities->folder_image }}/{{ Str::slug($amentities->title, '-') }}/{{ $name }}/{{ $item }}" alt="Card image cap">
                <div class="card-body text-center overlay">
                    {{ $item}}
                </div>
            </div>
        </div>
    @endforeach
</div>



@stop
@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection