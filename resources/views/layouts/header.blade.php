<header class="mb-8" data-aos="fade-down" data-aos-duration="800">
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 font-display mb-1">Dashboard Admin</h1>
                <p class="text-gray-600 flex items-center">
                    <i class="ri-time-line mr-2 text-green-600"></i>
                    Selamat datang kembali, <span class="font-semibold ml-1">{{ Auth::user()->name }}</span>
                </p>
            </div>
            <div class="flex items-center space-x-4">
                <div
                    class="flex items-center space-x-3 bg-white/60 backdrop-blur-sm rounded-xl px-4 py-2 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div
                        class="h-12 w-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-md">
                        A
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">{{ Auth::user()->email }}</p>
                        <p class="text-xs text-gray-500 flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5 animate-pulse"></span>
                            {{ Auth::user()->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
