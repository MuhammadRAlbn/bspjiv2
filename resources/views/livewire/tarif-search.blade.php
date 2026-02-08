<div class="max-w-5xl mx-auto space-y-8">
    <!-- Deskripsi Regulasi -->
    <div class="bg-slate-50 p-8 rounded-[30px] border border-black/10">
        <p class="text-sm md:text-base text-slate-700 leading-relaxed text-justify">
            BSPJI Banda Aceh menggunakan standar biaya yang mengacu pada <strong>Peraturan Pemerintah Republik Indonesia
                Nomor 54 Tahun 2021</strong> tentang Jenis dan Tarif atas Jenis Penerimaan Negara Bukan Pajak yang
            berlaku pada Kementerian Perindustrian, <strong>Peraturan Menteri Keuangan Nomor 108/PMK.02/2022 Tahun
                2022</strong> tentang Jenis dan Tarif atas Jenis Penerimaan Negara Bukan Pajak yang bersifat volatil
            yang Berlaku pada Kementerian Perindustrian dan <strong>Peraturan Menteri Perindustrian Republik Indonesia
                Nomor 19 Tahun 2021</strong> Tentang Besaran, Persyaratan, dan Tata Cara Pengenaan Tarif Tertentu atas
            Jenis Penerimaan Negara Bukan Pajak yang Berlaku pada Kementerian Perindustrian.
        </p>
    </div>

    <!-- Filter Area -->
    <div class="bg-apple-light p-8 rounded-[30px] border border-black/20 space-y-5">
        <label class="block text-sm font-bold text-primary uppercase tracking-wider">
            Cari berdasarkan komoditi/produk
        </label>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <select wire:model="selectedKomoditi"
                    class="w-full appearance-none bg-white border border-black/20 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-slate-200 transition-all font-medium cursor-pointer">
                    <option value="" disabled selected hidden>Pilih Komoditi/Produk</option>
                    @foreach($komoditi as $kom)
                        <option value="{{ $kom->id }}">{{ $kom->nama }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-slate-400">
                    <i class="fas fa-chevron-down text-sm"></i>
                </div>
            </div>
            <button wire:click="search" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed"
                class="text-white px-10 py-4 rounded-2xl font-bold bg-slate-800 hover:bg-black transition-all active:scale-95 flex items-center justify-center gap-2 shadow-lg shadow-black/10">
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

    <!-- Hasil Pencarian -->
    @if($hasSearched)
        <div class="space-y-4 animate-fade-in">
            @if($selectedKomoditiName)
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-primary">
                        Tarif untuk: {{ $selectedKomoditiName }}
                    </h3>
                    <button wire:click="resetSearch" class="text-sm text-slate-500 hover:text-slate-700 transition-colors">
                        <i class="fas fa-times mr-1"></i>
                        Reset
                    </button>
                </div>
            @endif

            @if($tarifList->count() > 0)
                <div class="bg-white rounded-2xl border border-black/20 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-black/20">
                                    <th class="px-6 py-4 text-sm font-bold text-primary uppercase tracking-wider">No</th>
                                    <th class="px-6 py-4 text-sm font-bold text-primary uppercase tracking-wider">Parameter</th>
                                    <th class="px-6 py-4 text-sm font-bold text-primary uppercase tracking-wider">Satuan</th>
                                    <th class="px-6 py-4 text-sm font-bold text-primary uppercase tracking-wider">Tarif</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-black/20">
                                @foreach($tarifList as $index => $tarif)
                                    <tr wire:key="tarif-{{ $tarif->id }}" class="hover:bg-slate-50/50 transition-colors">
                                        <td class="px-6 py-4 text-sm text-secondary">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-primary">{{ $tarif->parameter }}</td>
                                        <td class="px-6 py-4 text-sm text-secondary">{{ $tarif->satuan }}</td>
                                        <td class="px-6 py-4 text-sm font-semibold text-green-600">{{ $tarif->formatted_harga }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="py-10 text-center border-2 border-dashed border-black/10 rounded-[30px]">
                    <i class="fas fa-search text-4xl text-slate-300 mb-4"></i>
                    <p class="text-slate-400 font-medium">Tidak ada tarif ditemukan untuk komoditi ini</p>
                </div>
            @endif
        </div>
    @else
        <!-- Placeholder sebelum pencarian -->
        <div class="py-10 text-center border-2 border-dashed border-black/5 rounded-[30px]">
            <p class="text-slate-400 font-medium">Hasil pencarian akan muncul di sini</p>
        </div>
    @endif

    <!-- Loading Overlay -->
    <div wire:loading.flex wire:target="search"
        class="fixed inset-0 bg-white/50 backdrop-blur-sm z-50 items-center justify-center">
        <div class="bg-white p-6 rounded-2xl shadow-xl flex items-center gap-3">
            <i class="fas fa-spinner fa-spin text-slate-800"></i>
            <span class="font-medium">Memuat data...</span>
        </div>
    </div>
</div>