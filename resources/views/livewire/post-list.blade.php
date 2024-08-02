<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div id="filter-selector" class="flex items-center space-x-4 font-light">
            <button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700': 'text-gray-500'}} py-4" wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700': 'text-gray-500'}} py-4" wire:click="setSort('asc')">Oldest</button>
        </div>
        @include('livewire.partials.search-box')
    </div>
    <div class="py-4">
        <div class="text-gray-700">
            @if ($search)
                Search results for "{{ $search }}"
            @endif
        </div>
        @foreach ($this->posts as $post)
            <x-posts.post-item :post=$post />
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->posts->onEachSide(0)->links() }}
    </div>
</div>