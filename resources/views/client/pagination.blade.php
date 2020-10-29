@inject('request', 'Illuminate\Http\Request')

@if ($paginator->hasPages())
    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-end pg-warning">
            <li class="page-item">
                <a class="page-link" href="{{ $paginator ->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
                @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

            
            
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                        @else
                            <li class="page-item " ><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
    
        
            @if($paginator->nextPageUrl() !=null)
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
            @endif
        </li>
    </ul>
</nav>

@endif

