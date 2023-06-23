@if ($paginator->hasPages())
    <div class="col-lg-12">
        <div class="bs-component">
            <ul class="pagination" style="justify-content: center; display: flex;">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
                    </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @else
                                @if($page < $paginator->currentPage()+3 && $page > $paginator->currentPage()-3)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endif

                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endif
