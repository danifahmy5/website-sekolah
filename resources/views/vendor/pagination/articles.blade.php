@if ($paginator->hasPages())
    <div class="row no-gutters my-5">
        <div class="col text-center">
            <div class="block-27">
                <ul>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        {{-- <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li> --}}
                    @else
                        <li><a href="{{ $paginator->previousPageUrl() }}"><i class="ion-ios-arrow-back"></i></a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span
                                    class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}"><i class="ion-ios-arrow-forward"></i></a></li>
                    @else
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
