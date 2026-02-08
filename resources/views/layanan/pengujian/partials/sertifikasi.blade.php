<div class="max-w-4xl mx-auto space-y-6">
    @if($sertifikasi)
        @if($sertifikasi->lampiran)
            <div class="flex justify-start">
                <a 
                    href="{{ $sertifikasi->lampiran_url }}" 
                    target="_blank"
                    class="inline-flex items-center gap-2 text-slate-800 px-4 py-2 rounded-xl text-sm font-semibold transition-all active:scale-95 border border-black/25 hover:bg-slate-50"
                >
                    <i class="fas fa-download text-xs text-slate-800"></i>
                    Download Lampiran Akreditasi
                </a>
            </div>
        @endif

        <div 
            x-data
            @click="$dispatch('open-lightbox', { src: '{{ $sertifikasi->gambar_url }}' })"
            class="relative group overflow-hidden rounded-[30px] cursor-pointer"
        >
            <img 
                src="{{ $sertifikasi->gambar_url }}" 
                alt="{{ $sertifikasi->judul }}"
                class="w-[70%] h-auto object-cover transform transition-transform duration-700 group-hover:scale-105"
            >
            <div class="absolute bottom-6 left-6 z-20 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                <span class="bg-slate-800 backdrop-blur-md text-white px-4 py-2 rounded-full text-sm font-bold shadow-sm">
                    <i class="fas fa-search-plus mr-2"></i> Klik untuk memperbesar
                </span>
            </div>
        </div>
    @else
        <div class="text-center py-10 text-slate-400">
            <i class="fas fa-image text-4xl mb-4"></i>
            <p>Data sertifikasi belum tersedia</p>
        </div>
    @endif
</div>