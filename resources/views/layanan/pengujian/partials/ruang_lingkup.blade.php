<div x-data="{ 
    selectedLab: '',
    appliedLab: '',
    items: {{ $ruangLingkup->map(fn($item) => ['lab_id' => $item->laboratorium_id])->toJson() }},
    search() {
        this.appliedLab = this.selectedLab;
    },
    get hasResults() {
        if (!this.appliedLab) return true;
        return this.items.some(navItem => navItem.lab_id == this.appliedLab);
    }
}" class="max-w-5xl mx-auto space-y-6">
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
                <select x-model="selectedLab"
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
            <button type="button" @click="search"
                class="text-white px-8 py-3 rounded-xl font-bold bg-slate-800 hover:bg-black transition-all active:scale-95 flex items-center justify-center gap-2">
                <span>
                    <i class="fas fa-search text-sm"></i>
                    Cari
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
                        <tr x-show="!appliedLab || appliedLab == '{{ $item->laboratorium_id }}'" 
                            class="hover:bg-slate-50/50 transition-colors">
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

                    <tr x-show="!hasResults && appliedLab" style="display: none;">
                        <td colspan="4" class="px-6 py-10 text-center text-slate-400">
                            <i class="fas fa-search text-2xl mb-2"></i>
                            <p>Tidak ada data ditemukan</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>