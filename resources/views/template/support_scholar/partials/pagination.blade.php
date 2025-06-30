@php
    $currentPage = $students->currentPage();
    $lastPage = $students->lastPage();
    $start = floor(($currentPage - 1) / 10) * 10 + 1;
    $end = min($start + 9, $lastPage);
@endphp

<ul class="pagination">
    {{-- Previous --}}
    @if ($students->onFirstPage())
        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
    @else
        <li class="page-item"><a class="page-link" href="{{ $students->previousPageUrl() }}">&laquo;</a></li>
    @endif

    {{-- Page Links --}}
    @for ($page = $start; $page <= $end; $page++)
        @if ($page == $currentPage)
            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $students->url($page) }}">{{ $page }}</a></li>
        @endif
    @endfor

    {{-- Next --}}
    @if ($students->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $students->nextPageUrl() }}">&raquo;</a></li>
    @else
        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
    @endif
</ul>
