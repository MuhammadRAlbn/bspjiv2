@props([
    'headers' => [],
])

<div {{ $attributes->merge(['class' => 'overflow-x-auto']) }}>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 border-b border-black/10">
                @foreach($headers as $header)
                    <th class="px-6 py-4 text-[11px] font-extrabold text-primary/60 uppercase tracking-[0.1em]">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-black/5">
            {{ $slot }}
        </tbody>
    </table>
</div>
