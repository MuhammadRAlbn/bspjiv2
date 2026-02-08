<x-layouts.app title="Pengujian - SIPINTU">

    <!-- Hero Section -->
    <header class="relative h-[400px] w-[96%] mx-auto mt-5 mb-10 md:mt-[20px] flex items-center text-white overflow-hidden rounded-[25px]">
        <img 
            src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=2070" 
            alt="Pengujian Hero" 
            class="absolute inset-0 w-full h-full object-cover -z-10 brightness-[0.7]"
        >
        <div class="w-full max-w-[1400px] mx-auto px-10 md:px-[80px] text-left">
            <h1 class="text-[3rem] md:text-[4.5rem] font-bold tracking-[-0.03em] mb-6 animate-fade-in-up">
                Pengujian
            </h1>
        </div>
    </header>

    <!-- Main Content dengan Alpine.js untuk Tab Navigation -->
    <div 
        x-data="{ 
            activeTab: 'sertifikasi',
            setTab(tab) {
                this.activeTab = tab;
                if (window.innerWidth < 768) {
                    this.$refs.contentArea.scrollIntoView({ behavior: 'smooth' });
                }
            }
        }" 
        class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-10 lg:gap-[60px] max-w-[1400px] mx-auto px-5 md:px-10 items-start"
    >
        <!-- Navigation Sidebar -->
        <div class="flex flex-col gap-3 lg:sticky lg:top-24">
            @php
                $tabs = [
                    ['id' => 'sertifikasi', 'icon' => 'fa-certificate', 'label' => 'Sertifikasi'],
                    ['id' => 'ruang-lingkup', 'icon' => 'fa-microscope', 'label' => 'Ruang Lingkup'],
                    ['id' => 'alur', 'icon' => 'fa-route', 'label' => 'Alur'],
                    ['id' => 'tarif', 'icon' => 'fa-tags', 'label' => 'Tarif'],
                ];
            @endphp

            @foreach($tabs as $tab)
                <button 
                    @click="setTab('{{ $tab['id'] }}')"
                    :class="activeTab === '{{ $tab['id'] }}' 
                        ? 'bg-slate-800 text-white border-gray-400 shadow-lg' 
                        : 'bg-white text-primary border-black/30 hover:scale-[1.02]'"
                    class="group flex flex-row items-center gap-[15px] p-[16px_20px] rounded-[12px] cursor-pointer border transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]"
                >
                    <i 
                        class="fas {{ $tab['icon'] }} text-[20px]"
                        :class="activeTab === '{{ $tab['id'] }}' ? 'text-white' : 'text-slate-500'"
                    ></i>
                    <span class="font-semibold text-[1.1rem]">{{ $tab['label'] }}</span>
                </button>
            @endforeach
        </div>

        <!-- Content Area -->
        <article x-ref="contentArea" class="pb-[150px] min-h-[70vh]">
            
            <!-- Tab: Sertifikasi (Blade Partial) -->
            <section 
                x-show="activeTab === 'sertifikasi'" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="animate-fade-in"
            >
                @include('layanan.pengujian.partials.sertifikasi', ['sertifikasi' => $sertifikasi])
            </section>

            <!-- Tab: Ruang Lingkup (Livewire Component) -->
            <section 
                x-show="activeTab === 'ruang-lingkup'" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
            >
                <livewire:ruang-lingkup-table :laboratorium="$laboratorium" />
            </section>

            <!-- Tab: Alur (Blade Partial) -->
            <section 
                x-show="activeTab === 'alur'" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
            >
                @include('layanan.pengujian.partials.alur', ['alur' => $alur])
            </section>

            <!-- Tab: Tarif (Livewire Component) -->
            <section 
                x-show="activeTab === 'tarif'" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
            >
                <livewire:tarif-search :komoditi="$komoditi" />
            </section>

        </article>
    </div>

    <!-- Lightbox Component (Alpine.js) -->
    <x-lightbox />

</x-layouts.app>