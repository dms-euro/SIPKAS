    <aside class="fixed inset-y-0 left-0 w-72 bg-green-100/10 border-r border-gray-200 flex flex-col z-40">
        <div class="h-20 flex items-center px-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center shadow-md">
                    <img src="{{ asset('images/logo_smp2.png') }}"
                            alt="Logo"
                            class="w-full h-full object-contain">
                </div>

                <div>
                    <h1 class="font-semibold text-gray-800 text-lg leading-tight">
                        Sipkas
                    </h1>
                    <p class="text-xs text-gray-400">
                        Admin Portal
                    </p>
                </div>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-8 text-sm">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-3">
                    Menu Utama
                </p>

                <div class="space-y-2">
                    {{-- Dashboard --}}
                    <a href="{{ route('dashboard.admin') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                        {{ request()->routeIs('dashboard.admin')
                            ? 'bg-green-50 text-green-600 border-l-4 border-green-600 shadow-sm'
                            : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                        <i class="ri-dashboard-line text-lg"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    {{-- Tagihan --}}
                    <a href="{{ route('admin.tagihan.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                        {{ request()->routeIs('admin.tagihan.*')
                                ? 'bg-green-50 text-green-600 border-l-4 border-green-600 shadow-sm'
                            : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                        <i class="ri-bill-line text-lg"></i>
                        <span class="font-medium">Tagihan Kas</span>
                    </a>

                    {{-- Saldo --}}
                    <a href="{{ route('admin.saldo.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                        {{ request()->routeIs('admin.saldo.*')
                                ? 'bg-green-50 text-green-600 border-l-4 border-green-600 shadow-sm'
                            : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                        <i class="ri-wallet-line text-lg"></i>
                        <span class="font-medium">Saldo</span>
                    </a>

                </div>
            </div>

            {{-- AKUN --}}
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-3">
                    Akun
                </p>

                <div class="space-y-2">

                    <a href="{{ route('users') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                        {{ request()->routeIs('users')
                            ? 'bg-green-50 text-green-600 border-l-4 border-green-600 shadow-sm'
                            : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                        <i class="ri-user-line text-lg"></i>
                        <span class="font-medium">Kelola User</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-600 hover:bg-red-50 transition-all duration-200">
                            <i class="ri-logout-box-line text-lg"></i>
                            <span class="font-medium">Keluar</span>
                        </button>
                    </form>

                </div>
            </div>

        </nav>
    </aside>
