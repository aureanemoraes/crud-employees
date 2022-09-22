<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        {{-- {{dd($items)}} --}}
        @forelse($items as $key => $item)
            @if($item['type'] == 'link')
                <li class="breadcrumb-item">
                    <a href="{{ $item['url'] }}">{{ $item['name'] }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
            @endif
        @empty
        @endforelse
    </ol>
  </nav>
