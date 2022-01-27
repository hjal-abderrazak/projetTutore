<!-- resources/views/vendor/pagination/custom.blade.php -->
<style>
.visuallyhidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: auto;
            margin: 0;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
            white-space: nowrap;
}

nav {
    display: flex;
    justify-content: center;
    border-top: 1px solid #eee;
    margin-top: 1em;
    padding-top: .5em;
}

.pagination {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.pagination li {
    margin: 0 1px;
}

.pagination a {
    display: block;
    padding: .5em 1em;
    border: 1px solid #999;
    border-radius: .2em;
    text-decoration: none;
}

.pagination a[aria-current="page"] {
    background-color: #333;
    color: #fff;
}
</style>


@if ($paginator->hasPages())

    <nav aria-label="pagination">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="visuallyhidden">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
            @else
                <li class="page-item"><a class="page-link"
                        href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a aria-current="page" class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="visuallyhidden" href="#">Next</a>
                </li>
            @endif
        </ul>
@endif
