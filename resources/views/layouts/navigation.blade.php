<div class="fixed left-0 top-[59px] bottom-0 w-64 bg-white border-r border-slate-200 overflow-y-auto z-30">
    <nav class="p-4">
        <div x-data="postsAccordion()">
            @foreach ($categoriesList as $category)
                <div class="mb-2">
                    <button @click="loadCategory('{{ $category->id }}', '{{ $category->name }}')"
                        class="w-full flex items-center justify-between p-2 hover:bg-slate-50 rounded-lg text-left font-medium">
                        <span class="flex items-center gap-2">
                            <i class="{{ $category->icon  }} text-blue-600 text-sm"></i>
                            {{ $category->name }}
                        </span>
                    </button>
                </div>
            @endforeach
        </div>
    </nav>
</div>