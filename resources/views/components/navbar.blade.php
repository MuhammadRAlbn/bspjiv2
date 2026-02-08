<nav 
    x-data="{ 
        mobileMenuOpen: false, 
        layananDropdownOpen: false 
    }" 
    class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-black/5"
>
    <div class="max-w-[1400px] mx-auto px-5 md:px-10">
        <div class="flex items-center justify-between h-16 md:h-20">
            
            <!-- Logo (Kiri) -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img 
                    src="{{ asset('images/logo.png') }}" 
                    alt="Logo" 
                    class="h-8 md:h-10 w-auto"
                >
            </a>

            <!-- Desktop Menu (Tengah) -->
            <div class="hidden md:flex items-center gap-8">
                <a 
                    href="{{ route('home') }}" 
                    class="text-sm font-semibold text-primary hover:text-slate-600 transition-colors {{ request()->routeIs('home') ? 'text-slate-900' : '' }}"
                >
                    Beranda
                </a>
                
                <!-- Layanan Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button 
                        @click="open = !open"
                        @click.outside="open = false"
                        class="flex items-center gap-1 text-sm font-semibold text-primary hover:text-slate-600 transition-colors"
                    >
                        Layanan
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div 
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute top-full left-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-black/10 py-2 z-50"
                    >
                        <a 
                            href="{{ route('layanan.pengujian') }}" 
                            class="block px-4 py-2 text-sm text-primary hover:bg-slate-50 transition-colors {{ request()->routeIs('layanan.pengujian') ? 'bg-slate-50 font-semibold' : '' }}"
                        >
                            <i class="fas fa-flask mr-2 text-slate-500"></i>
                            Pengujian
                        </a>
                        <!-- Tambah layanan lain di sini -->
                    </div>
                </div>
            </div>

            <!-- SIPINTU Link (Kanan) -->
            <div class="hidden md:block">
                <a 
                    href="#" 
                    class="text-sm font-bold text-white bg-slate-800 hover:bg-black px-5 py-2.5 rounded-xl transition-all"
                >
                    SIPINTU
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button 
                @click="mobileMenuOpen = !mobileMenuOpen" 
                class="md:hidden p-2 text-primary"
            >
                <i class="fas" :class="mobileMenuOpen ? 'fa-times' : 'fa-bars'"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div 
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="md:hidden border-t border-black/5 py-4 space-y-2"
        >
            <a 
                href="{{ route('home') }}" 
                class="block px-4 py-3 text-sm font-semibold text-primary hover:bg-slate-50 rounded-xl transition-colors"
            >
                Beranda
            </a>
            
            <!-- Mobile Layanan Accordion -->
            <div x-data="{ open: false }">
                <button 
                    @click="open = !open" 
                    class="w-full flex items-center justify-between px-4 py-3 text-sm font-semibold text-primary hover:bg-slate-50 rounded-xl transition-colors"
                >
                    Layanan
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-collapse class="pl-4">
                    <a 
                        href="{{ route('layanan.pengujian') }}" 
                        class="block px-4 py-2 text-sm text-secondary hover:text-primary transition-colors"
                    >
                        <i class="fas fa-flask mr-2"></i>
                        Pengujian
                    </a>
                </div>
            </div>
            
            <a 
                href="#" 
                class="block mx-4 text-center text-sm font-bold text-white bg-slate-800 py-3 rounded-xl"
            >
                SIPINTU
            </a>
        </div>
    </div>
</nav>