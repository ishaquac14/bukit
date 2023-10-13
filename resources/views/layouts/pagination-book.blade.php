<nav aria-label="Page navigation example">
    <ul class="pagination pagination-dark">
        <li class="page-item"><a class="page-link" href="{{ $books->previousPageUrl() }}">Previous</a></li>
        @foreach(range(1, $books->lastPage()) as $page)
            <li class="page-item {{ $books->currentPage() === $page ? 'active' : '' }}">
                <a class="page-link" href="{{ $books->url($page) }}">{{ $page }}</a>
            </li>
        @endforeach
        <li class="page-item"><a class="page-link" href="{{ $books->nextPageUrl() }}">Next</a></li>
    </ul>
</nav>  

