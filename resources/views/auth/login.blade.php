<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kas Sekolah</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="min-h-screen overflow-hidden bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 relative">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <!-- Blob animations -->
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-green-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-1/3 -right-32 w-[500px] h-[500px] bg-emerald-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute -bottom-24 left-1/3 w-96 h-96 bg-teal-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>

        <!-- Floating circles -->
        <div class="absolute top-20 left-[15%] w-20 h-20 bg-green-300/30 rounded-full blur-xl animate-bounce" style="animation-duration: 3s;"></div>
        <div class="absolute bottom-32 right-[20%] w-16 h-16 bg-emerald-300/30 rounded-full blur-xl animate-bounce" style="animation-duration: 4s; animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-[10%] w-12 h-12 bg-teal-300/30 rounded-full blur-lg animate-bounce" style="animation-duration: 5s; animation-delay: 2s;"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 flex items-center justify-center min-h-screen p-4 lg:p-8">
        <div class="w-full max-w-6xl">
            <div class="grid lg:grid-cols-2 gap-0 lg:gap-8 items-center">

                <!-- Left Side - Branding -->
                <div class="hidden lg:block" data-aos="fade-right" data-aos-duration="1000">
                    <div class="bg-gradient-to-br from-green-600 via-green-500 to-emerald-600 rounded-3xl p-12 shadow-2xl shadow-green-500/50 relative overflow-hidden">
                        <!-- Decorative elements -->
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2"></div>

                        <div class="relative z-10">
                            <!-- Logo -->
                            <div class="flex items-center space-x-4 mb-12" data-aos="fade-down" data-aos-delay="200">
                                <div class="w-16 h-16 bg-white/20 backdrop-blur-lg rounded-2xl flex items-center justify-center border border-white/30 shadow-lg">
                                    <i class="ri-bank-line text-3xl text-white"></i>
                                </div>
                                <div>
                                    <h1 class="text-3xl font-bold text-white">Kas Sekolah</h1>
                                    <p class="text-green-100 text-sm font-medium">Digital Management System</p>
                                </div>
                            </div>

                            <!-- Main Title -->
                            <div class="mb-12" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="text-4xl font-bold text-white mb-4 leading-tight">
                                    Sistem Kas<br>Terintegrasi
                                </h2>
                                <p class="text-green-50 text-lg leading-relaxed">
                                    Kelola keuangan sekolah dengan mudah, aman, dan transparan dalam satu platform modern.
                                </p>
                            </div>

                            <!-- Features -->
                            <div class="space-y-6">
                                <div class="flex items-start space-x-4" data-aos="fade-up" data-aos-delay="400">
                                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0 border border-white/30">
                                        <i class="ri-shield-check-line text-2xl text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white text-lg mb-1">Keamanan Terjamin</h3>
                                        <p class="text-green-50 text-sm">Data terenkripsi dengan standar keamanan tinggi</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4" data-aos="fade-up" data-aos-delay="500">
                                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0 border border-white/30">
                                        <i class="ri-bar-chart-line text-2xl text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white text-lg mb-1">Laporan Real-time</h3>
                                        <p class="text-green-50 text-sm">Pantau perkembangan kas sekolah secara langsung</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4" data-aos="fade-up" data-aos-delay="600">
                                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0 border border-white/30">
                                        <i class="ri-team-line text-2xl text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white text-lg mb-1">Kolaborasi Mudah</h3>
                                        <p class="text-green-50 text-sm">Admin dan wali kelas bekerja dalam satu sistem</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="mt-12 pt-8 border-t border-white/20" data-aos="fade-up" data-aos-delay="700">
                                <p class="text-green-100 text-sm flex items-center">
                                    <i class="ri-copyright-line mr-2"></i>
                                    <span id="currentYear"></span> Kas Sekolah v2.0 - All Rights Reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="w-full" data-aos="fade-left" data-aos-duration="1000">
                    <!-- Glass Card -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl shadow-green-200/50 border border-white/50 p-8 lg:p-12">

                        <!-- Mobile Logo -->
                        <div class="lg:hidden flex items-center justify-center mb-8" data-aos="zoom-in">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-green-500/50">
                                <i class="ri-bank-line text-3xl text-white"></i>
                            </div>
                        </div>

                        <!-- Header -->
                        <div class="text-center mb-8" data-aos="fade-down" data-aos-delay="200">
                            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
                            <p class="text-gray-600">Masuk ke akun Anda untuk melanjutkan</p>
                        </div>

                        <!-- Messages -->
                        @if ($errors->any())
                        <div class="mb-6 bg-red-50/80 backdrop-blur-sm border border-red-200 rounded-2xl p-4" data-aos="fade-in">
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center mr-3 flex-shrink-0">
                                    <i class="ri-error-warning-line text-red-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-red-800">Terjadi kesalahan</p>
                                    <ul class="text-sm text-red-600 mt-1 space-y-1">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if (session('success'))
                        <div class="mb-6 bg-green-50/80 backdrop-blur-sm border border-green-200 rounded-2xl p-4" data-aos="fade-in">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center mr-3">
                                    <i class="ri-checkbox-circle-line text-green-600"></i>
                                </div>
                                <p class="font-semibold text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="mb-6 bg-red-50/80 backdrop-blur-sm border border-red-200 rounded-2xl p-4" data-aos="fade-in">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center mr-3">
                                    <i class="ri-error-warning-line text-red-600"></i>
                                </div>
                                <p class="font-semibold text-red-800">{{ session('error') }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf

                            <!-- Email Field -->
                            <div data-aos="fade-up" data-aos-delay="300">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="ri-mail-line mr-2 text-green-600"></i>Alamat Email
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="ri-user-3-line text-gray-400 group-focus-within:text-green-600 transition-colors"></i>
                                    </div>
                                    <input type="email"
                                           name="email"
                                           required
                                           value="{{ old('email') }}"
                                           class="w-full pl-12 pr-4 py-4 bg-white/50 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none"
                                           placeholder="contoh@email.com"
                                           autocomplete="email"
                                           autofocus>
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div data-aos="fade-up" data-aos-delay="400">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="ri-lock-line mr-2 text-green-600"></i>Kata Sandi
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="ri-key-line text-gray-400 group-focus-within:text-green-600 transition-colors"></i>
                                    </div>
                                    <input type="password"
                                           name="password"
                                           required
                                           id="password"
                                           class="w-full pl-12 pr-14 py-4 bg-white/50 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none"
                                           placeholder="••••••••"
                                           autocomplete="current-password">
                                    <button type="button"
                                            onclick="togglePassword()"
                                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-green-600 transition-colors focus:outline-none">
                                        <i class="ri-eye-line text-xl" id="toggleIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div data-aos="fade-up" data-aos-delay="500">
                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg shadow-green-500/50 hover:shadow-xl hover:shadow-green-500/60 transform hover:-translate-y-0.5 transition-all duration-300">
                                    <span class="flex items-center justify-center">
                                        <i class="ri-login-circle-line mr-2 text-xl"></i>
                                        Masuk ke Sistem
                                    </span>
                                </button>
                            </div>
                        </form>

                        <!-- Support Info -->
                        <div class="mt-8 pt-6 border-t border-gray-200" data-aos="fade-up" data-aos-delay="600">
                            <div class="flex flex-col sm:flex-row items-center justify-between text-sm">
                                <div class="flex items-center text-gray-600 mb-3 sm:mb-0">
                                    <i class="ri-question-line mr-2 text-green-600"></i>
                                    <span>Butuh bantuan? <span class="font-semibold text-green-600">Hubungi admin</span></span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                    <span class="text-gray-600">Status: <span class="text-green-600 font-semibold">Online</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ri-eye-line');
                toggleIcon.classList.add('ri-eye-off-line');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ri-eye-off-line');
                toggleIcon.classList.add('ri-eye-line');
            }
        }

        // Set current year
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>
</body>

</html>
