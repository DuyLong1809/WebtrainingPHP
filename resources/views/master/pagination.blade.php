<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

<div class="pagination">
    @if ($products->lastPage() > 1)
        <ul class="pagination-list">
            @if ($products->currentPage() > 1)
                <li><a href="{{ $products->previousPageUrl() }}" class="pagination-link" rel="prev"><i class="fas fa-chevron-left"></i> Previous</a></li>
            @endif

            @for ($i = 1; $i <= $products->lastPage(); $i++)
                <li>
                    <a href="{{ $products->url($i) }}" class="pagination-link{{ $i == $products->currentPage() ? ' is-current' : '' }}" aria-label="Page {{ $i }}" aria-current="page">{{ $i }}</a>
                </li>
            @endfor

            @if ($products->currentPage() < $products->lastPage())
                <li><a href="{{ $products->nextPageUrl() }}" class="pagination-link" rel="next">Next <i class="fas fa-chevron-right"></i></a></li>
            @endif
        </ul>
    @endif
</div>
