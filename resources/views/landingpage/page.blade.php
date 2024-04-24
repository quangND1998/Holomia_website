@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="pull-right pagination mt-[30px]">
        <ul class="pagination w-full flex justify-center items-center my-4">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled mx-3">
                    <span><i class="fa fa-angle-double-left"></i></span>
                </li>
            @else
                <li class="mx-3">
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <span><i class="fa fa-angle-double-left"></i></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active bg-[#ad010115] text-[#A60303] px-3 "><span>{{ $page }}</span></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li class="mx-3"><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="disabled mx-3"><span><i class="fa fa-ellipsis-h"></i></span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="mx-3">
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span><i class="fa fa-angle-double-right"></i></span>
                    </a>
                </li>
            @else
                <li class="disabled mx-3">
                    <span><i class="fa fa-angle-double-right"></i></span>
                </li>
            @endif
        </ul>
    </div>
    <!-- Pagination -->
@endif
