<!-- Lightbox Modal menggunakan Alpine.js -->
<div 
    x-data="{ 
        open: false, 
        imgSrc: '' 
    }"
    @open-lightbox.window="open = true; imgSrc = $event.detail.src"
    @keydown.escape.window="open = false"
>
    <template x-teleport="body">
        <div 
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false"
            class="fixed inset-0 z-[100] bg-black/90 backdrop-blur-sm flex items-center justify-center p-4 md:p-10"
        >
            <button 
                @click="open = false"
                class="absolute top-6 right-6 text-white text-3xl hover:text-gray-300 transition-colors z-[110]"
            >
                <i class="fas fa-times"></i>
            </button>
            
            <img 
                :src="imgSrc"
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @click.stop
                class="max-w-full max-h-full rounded-lg shadow-2xl"
            >
        </div>
    </template>
</div>