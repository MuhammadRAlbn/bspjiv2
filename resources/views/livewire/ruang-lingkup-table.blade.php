<div class="max-w-5xl mx-auto space-y-6">
    <!-- Teks Pembuka -->
    <p class="text-sm md:text-base text-slate-600 leading-relaxed max-w-2xl">
        BSPJI Banda Aceh memiliki 5 Laboratorium yaitu Laboratorium Limbah, Lab Udara, Lab Kimia, Lab Mikrobiologi dan
        Lab Proses (Bahan Bangunan)
    </p>

    <!-- Filter Area -->
    <div class="bg-apple-light p-6 rounded-2xl border border-black/20 space-y-4">
        <label class="block text-sm font-bold text-primary uppercase tracking-wider">
            Cari ruang lingkup berdasarkan laboratorium
        </label>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <select wire:model="selectedLab"
                    class="w-full appearance-none bg-white border border-black/20 rounded-xl px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-slate-200 transition-all cursor-pointer">
                    <option value="">Semua Laboratorium</option>
                    @foreach($laboratorium as $lab)
                        <option value="{{ $lab->id }}">{{ $lab->nama }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-slate-400">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
            </div>
            <button wire:click="search" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed"
                class="text-white px-8 py-3 rounded-xl font-bold bg-slate-800 hover:bg-black transition-all active:scale-95 flex items-center justify-center gap-2">
                <span wire:loading.remove wire:target="search">
                    <i class="fas fa-search text-sm"></i>
                    Cari
                </span>
                <span wire:loading wire:target="search">
                    <i class="fas fa-spinner fa-spin text-sm"></i>
                    Mencari...
                </span>
            </button>
        </div>
    </div>

    <!-- Table Data -->
    <div class="bg-white rounded-2xl border border-black/20 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-black/20">
                        <th class="px-6 py-4 text-sm font-bold text-primary uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-sm font-bold text-primary uppercase tracking-wider">Komoditi / Produk
                        </th>
                        <th class="px-6 py-4 text-sm font-bold text-primary uppercase tracking-wider">Parameter Uji</th>
                        <th class="px-6 py-4 text-sm font-bold text-primary uppercase tracking-wider">Metode Uji</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/20">
                    @forelse($ruangLingkup as $index => $item)
                        <tr wire:key="rl-{{ $item->id }}" class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 text-sm text-secondary">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-primary">{{ $item->komoditi }}</td>
                            <td class="px-6 py-4 text-sm text-secondary">{{ $item->parameter_uji }}</td>
                            <td class="px-6 py-4 text-sm text-secondary">{{ $item->metode_uji }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400">
                                <i class="fas fa-search text-2xl mb-2"></i>
                                <p>Tidak ada data ditemukan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div wire:loading.flex wire:target="search"
        class="fixed inset-0 bg-white/50 backdrop-blur-sm z-50 items-center justify-center">
        <div class="bg-white p-6 rounded-2xl shadow-xl flex items-center gap-3">
            <i class="fas fa-spinner fa-spin text-slate-800"></i>
            <span class="font-medium">Memuat data...</span>
        </div>
    </div>
</div>