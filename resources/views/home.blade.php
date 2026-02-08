<x-layouts.app title="Beranda - SIPINTU">
    
    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="text-center space-y-4">
            <div class="inline-flex items-center gap-2 bg-amber-100 text-amber-800 px-4 py-2 rounded-full text-sm font-semibold">
                <i class="fas fa-tools"></i>
                Dalam Pengembangan
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-primary">
                SIPINTU
            </h1>
            <p class="text-lg text-secondary max-w-md mx-auto">
                Sistem Informasi Pelayanan Industri Terpadu
            </p>
            <div class="pt-6">
                <a 
                    href="{{ route('layanan.pengujian') }}" 
                    class="inline-flex items-center gap-2 bg-slate-800 text-white px-6 py-3 rounded-xl font-semibold hover:bg-black transition-all"
                >
                    <i class="fas fa-flask"></i>
                    Lihat Layanan Pengujian
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>