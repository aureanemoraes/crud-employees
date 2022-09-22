@if(isset($paginator) && $paginator->hasMorePages())
    <div class="d-flex justify-content-end">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{  $paginator->url(1) }}" aria-label="Primeira">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                    @for($index=1; $index <= $paginator->lastPage(); $index++)
                        <li class="page-item">
                            <a
                                class="page-link {{ $paginator->currentPage() == $index ? 'text-white bg-dark' : '' }}"
                                href="{{ $paginator->url($index) }}"
                            >
                                {{ $index }}
                            </a>
                        </li>
                    @endfor
                    <a class="page-link" href="{{  $paginator->url($paginator->lastPage()) }}" aria-label="Última">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endif
