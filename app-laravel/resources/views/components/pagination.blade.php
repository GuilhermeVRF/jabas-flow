@if($paginator->hasPages())
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/pagination.css') }}">
    @endpush


    <div class="paginationContainer">
        @if($paginator->onFirstPage())
            <span class="paginationLink disabled">&laquo;</span>
        @else
            <a class="paginationLink" href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
        @endif
        
        <div class="paginationNumbersContainer">
            @foreach($elements as $element)
                @if (is_string($element))
                    <span class="dots">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="paginationNumber current">{{ $page }}</span>
                        @else
                            <a class="paginationNumber" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        @if ($paginator->hasMorePages())
            <a class="paginationLink" href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
        @else
            <span class="paginationLink disabled">&raquo;</span>
        @endif
    </div>
@endif