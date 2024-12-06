@if ($students->onFirstPage())
    <li class="page-item disabled" aria-disabled="true">
        <span class="page-link">&laquo;</span>
    </li>
@else
    <li class="page-item">
        <a class="page-link" href="{{ $students->previousPageUrl() }}" rel="prev">&laquo;</a>
    </li>
@endif

@foreach ($students->links()->elements[0] as $page => $url)
    @if ($page == $students->currentPage())
        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
    @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
    @endif
@endforeach

@if ($students->hasMorePages())
    <li class="page-item">
        <a class="page-link" href="{{ $students->nextPageUrl() }}" rel="next">&raquo;</a>
    </li>
@else
    <li class="page-item disabled" aria-disabled="true">
        <span class="page-link">&raquo;</span>
    </li>
@endif
