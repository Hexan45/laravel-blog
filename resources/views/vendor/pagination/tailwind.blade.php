@if($paginator->hasPages())
    <nav class="pagination">
        <ul>
            @if($paginator->onFirstPage())
                <li class="item disabled">
                    <a href="#" class="link">
                        << Wstecz
                    </a>
                </li>
            @else
                <li class="item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="link">
                        << Wstecz
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif
      
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if($paginator->hasMorePages())
                <li class="item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="link">
                        Dalej >>
                    </a>
                </li>
            @else
                <li class="item disabled">
                    <a href="#" class="link">
                        Dalej >>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif