<div x-data="{ query: '{{ request('search', '') }}' }" id="search-box">
    <div class="flex justify-between item-center">
        {{-- <h3 class="text-lg font-semibold text-gray-900 mb-3">Search</h3> --}}
        <div class="w-80 flex rounded-2xl bg-gray-100 py-1 px-3 mb-2 items-center">
            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            </span>
            <input x-on:keydown.enter="$dispatch('search', { search : query })" x-model="query"
            class="w-80 ml-1 bg-transparent focus:outline-none focus:border-none focus:ring-0 outline-none border-none text-gray-800 placeholder:text-gray-400"
            type="text">
         </div>
        <x-button class="mx-3 mb-2" x-on:click="$dispatch('search', {search : query})">Search</x-button>
    </div>
</div>