<div x-data="{ 
    selectedKomoditi: '', 
    appliedKomoditi: '',
    search() {
        this.appliedKomoditi = this.selectedKomoditi;
    },
    get hasResults() {
        if (!this.appliedKomoditi) return true;
        let found = false;
        @foreach($komoditi as $kom)
            if(this.appliedKomoditi == '{{ $kom->id }}') found = {{ $kom->tarif->count() > 0 ? 'true' : 'false' }};
        @endforeach
        return found;
    }
}" class="max-w-5xl mx-auto space-y-10">

    <!-- Header Regulation Card -->
    <div class="bg-slate-900 text-white p-10 rounded-[40px] shadow-2xl relative overflow-hidden group">
        <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:scale-110 transition-transform">
            <i class="fas fa-gavel text-8xl"></i>
        </div>
        <div class="relative z-10 space-y-6">
            <div
                class="inline-flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full border border-white/10 text-xs font-bold uppercase tracking-widest text-slate-300">
                <i class="fas fa-info-circle"></i> Regulasi Tarif
            </div>
            <p class="text-lg md:text-xl text-slate-300 leading-relaxed font-medium">
                Standar biaya mengacu pada <strong>PP No. 54 Tahun 2021</strong> dan <strong>PMK No.
                    108/PMK.02/2022</strong> mengenai jenis dan tarif PNBP pada Kementerian Perindustrian.
            </p>
        </div>
    </div>

    <!-- Filter Card -->
    <div class="bg-white p-8 rounded-[32px] border border-black/10 shadow-sm space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-1">
                <h3 class="text-xl font-bold text-primary">Cari Tarif Pengujian</h3>
                <p class="text-sm text-secondary">Pilih komoditi atau produk untuk melihat detail biaya</p>
            </div>

            <div class="flex flex-col md:flex-row gap-4 flex-1 max-w-2xl">
                <div class="relative flex-1">
                    <select x-model="selectedKomoditi"
                        class="w-full appearance-none bg-slate-50 border border-black/5 rounded-2xl px-5 py-4 pr-12 focus:outline-none focus:ring-4 focus:ring-slate-100 transition-all font-bold text-primary cursor-pointer">
                        <option value="">Pilih Komoditi / Produk</option>
                        @foreach($komoditi as $kom)
                            <option value="{{ $kom->id }}">{{ $kom->nama }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-slate-400">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <button @click="search"
                    class="text-white px-10 py-4 rounded-2xl font-bold bg-primary hover:bg-black hover:shadow-xl transition-all active:scale-95 flex items-center justify-center gap-3">
                    Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Results Area -->
    <div x-show="appliedKomoditi" x-cloak class="space-y-6">
        @foreach($komoditi as $kom)
            <div x-show="appliedKomoditi == '{{ $kom->id }}'" class="animate-fade-in">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-1 w-12 bg-primary rounded-full"></div>
                    <h3 class="text-2xl font-extrabold text-primary">{{ $kom->nama }}</h3>
                </div>

                @if($kom->tarif->count() > 0)
                    <x-card>
                        <x-table :headers="['No', 'Parameter Pengujian', 'Satuan', 'Tarif Harga']">
                            @foreach($kom->tarif as $index => $tarif)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="px-6 py-5 text-sm text-secondary font-medium">{{ $index + 1 }}</td>
                                    <td class="px-6 py-5 text-sm font-bold text-primary">{{ $tarif->parameter }}</td>
                                    <td class="px-6 py-5">
                                        <span
                                            class="text-xs font-bold text-secondary uppercase tracking-wider">{{ $tarif->satuan }}</span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="text-base font-black text-slate-900">
                                            {{ $tarif->formatted_harga }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </x-table>
                    </x-card>
                @else
                    <div class="bg-white p-20 rounded-[40px] border border-black/10 text-center space-y-4">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto text-slate-200">
                            <i class="fas fa-clipboard-list text-4xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-primary">Tarif Belum Tersedia</h4>
                        <p class="text-secondary max-w-md mx-auto">Mohon maaf, data tarif untuk komoditi ini sedang dalam tahap
                            pembaharuan sistem.</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Empty State / Initial State -->
    <div x-show="!appliedKomoditi"
        class="bg-slate-50/50 p-20 rounded-[40px] border-2 border-dashed border-black/5 text-center transition-all">
        <div class="opacity-20 flex flex-col items-center gap-4">
            <i class="fas fa-layer-group text-6xl"></i>
            <p class="text-xl font-bold">Silakan pilih komoditi di atas</p>
        </div>
    </div>
</div>