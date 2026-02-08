@props([
    'title' => null,
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-[32px] border border-black/10 shadow-sm overflow-hidden']) }}>
    @if($title || $description)
        <div class="px-8 py-6 border-b border-black/5 bg-slate-50/50">
            @if($title)
                <h3 class="text-xl font-bold text-primary">{{ $title }}</h3>
            @endif
            @if($description)
                <p class="text-sm text-secondary mt-1">{{ $description }}</p>
            @endif
        </div>
    @endif
    
    <div class="p-1">
        {{ $slot }}
    </div>
</div>
