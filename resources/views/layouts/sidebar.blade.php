<aside
    class="fixed inset-y-0 left-0 w-72 bg-white/80 backdrop-blur-xl border-r border-white/50 shadow-2xl shadow-green-500/10 z-40"
    data-aos="fade-right" data-aos-duration="800">

    <div
        class="h-20 bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 flex items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
        <div class="relative flex items-center space-x-3 z-10">
            <div
                class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30 shadow-lg">
                <i class="ri-bank-line text-white text-2xl"></i>
            </div>
            <div>
                <h1 class="text-white font-bold text-xl font-display">Kas Sekolah</h1>
                <p class="text-green-100 text-xs font-medium">Admin Portal v2.0</p>
            </div>
        </div>
    </div>

    <nav class="px-4 py-6 space-y-8">
        <div>
            <p class="text-xs uppercase text-gray-500 font-bold tracking-wider px-4 mb-3">Menu Utama</p>
            <div class="space-y-1">
                {{-- Dashboard --}}
                <a href="{{ route('dashboard.admin') }}"
                    class="group flex items-center py-3 px-4 rounded-xl transform transition-all duration-300
        {{ request()->routeIs('dashboard.admin')
            ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-500/50 hover:shadow-xl hover:scale-105'
            : 'text-gray-700 hover:bg-white/60 backdrop-blur-sm hover:shadow-md' }}">
                    <div
                        class="w-10 h-10 rounded-lg flex items-center justify-center mr-3
            {{ request()->routeIs('dashboard.admin') ? 'bg-white/20' : 'bg-green-50 group-hover:bg-green-100' }}">
                        <i
                            class="ri-dashboard-line text-lg
               {{ request()->routeIs('dashboard.admin') ? 'text-white' : 'text-green-600' }}"></i>
                    </div>
                    <span class="font-semibold">Dashboard</span>
                </a>

                {{-- Tagihan Kas --}}
                <a href="{{ route('admin.tagihan.index') }}"
                    class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300
        {{ request()->routeIs('admin.tagihan.*')
            ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-500/40'
            : 'text-gray-700 hover:bg-white/60 backdrop-blur-sm hover:shadow-md' }}">
                    <div
                        class="w-10 h-10 rounded-lg flex items-center justify-center mr-3
            {{ request()->routeIs('admin.tagihan.*') ? 'bg-white/20' : 'bg-blue-50 group-hover:bg-blue-100' }}">
                        <i
                            class="ri-bill-line text-lg
               {{ request()->routeIs('admin.tagihan.*') ? 'text-white' : 'text-blue-600' }}"></i>
                    </div>
                    <span class="font-semibold">Tagihan Kas</span>
                </a>

                {{-- Saldo --}}
                <a href="{{ route('admin.saldo.index') }}"
                    class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300
        {{ request()->routeIs('admin.saldo.*')
            ? 'bg-gradient-to-r from-green-500 to-emerald-500 text-white shadow-lg shadow-green-500/40'
            : 'text-gray-700 hover:bg-white/60 backdrop-blur-sm hover:shadow-md' }}">
                    <div
                        class="w-10 h-10 rounded-lg flex items-center justify-center mr-3
            {{ request()->routeIs('admin.saldo.*') ? 'bg-white/20' : 'bg-amber-50 group-hover:bg-amber-100' }}">
                        <i
                            class="ri-wallet-line text-lg
                {{ request()->routeIs('admin.saldo.*') ? 'text-white' : 'text-amber-600' }}"></i>
                    </div>
                    <span class="font-semibold">Saldo</span>
                </a>
            </div>

        </div>

        <div>
            <p class="text-xs uppercase text-gray-500 font-bold tracking-wider px-4 mb-3">Akun</p>
            <div class="space-y-1">
                <a href="{{ route('users') }}"
                    class="group flex items-center py-3 px-4 text-gray-700 hover:bg-white/60 backdrop-blur-sm rounded-xl transition-all duration-300 hover:shadow-md">
                    <div
                        class="w-10 h-10 bg-green-50 group-hover:bg-green-100 rounded-lg flex items-center justify-center mr-3 transition-colors">
                        <i class="ri-user-add-line text-lg text-green-600"></i>
                    </div>
                    <span class="font-semibold">Kelola User</span>
                </a>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit"
                        class="w-full group flex items-center py-3 px-4 text-gray-700 hover:bg-red-50 rounded-xl transition-all duration-300 hover:shadow-md">
                        <div
                            class="w-10 h-10 bg-red-50 group-hover:bg-red-100 rounded-lg flex items-center justify-center mr-3 transition-colors">
                            <i class="ri-logout-box-line text-lg text-red-600"></i>
                        </div>
                        <span class="font-semibold">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</aside>
