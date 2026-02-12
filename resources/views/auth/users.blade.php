@extends('layouts.app')
@section('title', 'Manajemen User')
@section('content')
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-start gap-4">
            <!-- Icon Container -->
            <div
                class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg flex-shrink-0">
                <i class="ri-user-add-line text-white text-2xl"></i>
            </div>

            <!-- Title & Description -->
            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Form Tambah User Baru</h1>
                <p class="text-gray-600">Isi data user yang akan didaftarkan ke sistem</p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <form action="{{ route('adduser') }}" method="POST" id="userRegistrationForm" class="space-y-8">
        @csrf

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-lg border border-gray-100">
            <div class="space-y-8">
                <!-- Name Field -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">
                        <span class="text-red-500">*</span> Nama
                    </label>

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-emerald-600/5 rounded-xl blur-sm group-focus-within:blur-0 transition-all duration-300">
                        </div>

                        <div class="relative">
                            <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
                            <input type="text" id="name" name="name" required
                                class="w-full pl-12 pr-4 py-4 bg-white/80 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-medium placeholder-gray-400"
                                placeholder="Masukkan nama lengkap user" oninput="validateName()">
                        </div>
                    </div>

                    <div id="nameError" class="hidden text-red-500 text-sm mt-2 flex items-center">
                        <i class="ri-error-warning-line mr-1.5"></i>
                        <span></span>
                    </div>
                </div>

                <!-- Email Field -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">
                        <span class="text-red-500">*</span> Email
                    </label>

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-emerald-600/5 rounded-xl blur-sm group-focus-within:blur-0 transition-all duration-300">
                        </div>

                        <div class="relative">
                            <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
                            <input type="email" id="email" name="email" required
                                class="w-full pl-12 pr-4 py-4 bg-white/80 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-medium placeholder-gray-400"
                                placeholder="contoh@sekolah.id" oninput="validateEmail()">
                        </div>
                    </div>

                    <div id="emailError" class="hidden text-red-500 text-sm mt-2 flex items-center">
                        <i class="ri-error-warning-line mr-1.5"></i>
                        <span></span>
                    </div>
                </div>

                <!-- Role Field -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">
                        <span class="text-red-500">*</span> Role
                    </label>

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-emerald-600/5 rounded-xl blur-sm group-focus-within:blur-0 transition-all duration-300">
                        </div>

                        <div class="relative">
                            <i
                                class="ri-shield-user-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>

                            <select name="role" id="role" required
                                class="w-full pl-12 pr-10 py-4 bg-white/80 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-medium appearance-none cursor-pointer">
                                <option value="" disabled selected>-- Pilih Role --</option>
                                <option value="admin">Administrator</option>
                                <option value="kelas">Kelas</option>
                            </select>

                            <i
                                class="ri-arrow-down-s-line absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl pointer-events-none"></i>
                        </div>
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">
                        <span class="text-red-500">*</span> Password
                    </label>

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-emerald-600/5 rounded-xl blur-sm group-focus-within:blur-0 transition-all duration-300">
                        </div>

                        <div class="relative">
                            <i class="ri-lock-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>

                            <input type="password" id="password" name="password" required
                                class="w-full pl-12 pr-12 py-4 bg-white/80 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-medium placeholder-gray-400"
                                placeholder="Minimal 8 karakter" oninput="validatePassword()">

                            <button type="button" onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors focus:outline-none"
                                aria-label="Toggle password visibility">
                                <i id="passwordIcon" class="ri-eye-off-line text-xl"></i>
                            </button>
                        </div>
                    </div>

                    <div id="passwordError" class="hidden text-red-500 text-sm mt-2 flex items-center">
                        <i class="ri-error-warning-line mr-1.5"></i>
                        <span></span>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="pt-8 mt-8 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row gap-4">
                    <!-- Reset Button -->
                    <button type="button" onclick="resetForm()"
                        class="flex-1 px-6 py-4 bg-white border-2 border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-50 hover:border-gray-300 transition-all duration-300 flex items-center justify-center shadow-sm hover:shadow-md">
                        <i class="ri-refresh-line mr-3 text-xl"></i>
                        Reset Form
                    </button>

                    <!-- Submit Button -->
                    <button type="submit" id="submitButton"
                        class="flex-1 px-6 py-4 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-green-500/50 hover:shadow-xl hover:shadow-green-500/60 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center">
                        <i class="ri-user-add-line mr-3 text-xl"></i>
                        Tambah User
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- User Table Section -->
    <div class="mt-8" data-aos="fade-up" data-aos-delay="300">
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Daftar User</h2>
                    <p class="text-gray-600">Kelola semua user yang terdaftar dalam sistem</p>
                </div>
                <div class="flex gap-3 mt-4 md:mt-0">
                    <div class="relative">
                        <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" id="searchUser"
                            class="pl-12 pr-4 py-3 bg-white/80 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-medium"
                            placeholder="Cari user..." oninput="searchUsers()">
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="overflow-x-auto rounded-xl border border-gray-200">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-green-50 to-emerald-50/50">
                            <th class="py-4 px-6 text-left font-bold text-gray-700">ID</th>
                            <th class="py-4 px-6 text-left font-bold text-gray-700">Nama</th>
                            <th class="py-4 px-6 text-left font-bold text-gray-700">Email</th>
                            <th class="py-4 px-6 text-left font-bold text-gray-700">Role</th>
                            <th class="py-4 px-6 text-left font-bold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        @foreach ($users as $user)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="py-4 px-6">{{ $user->id }}</td>
                                <td class="py-4 px-6 font-medium">{{ $user->name }}</td>
                                <td class="py-4 px-6">{{ $user->email }}</td>
                                <td class="py-4 px-6">
                                    @if ($user->role == 'admin')
                                        <span
                                            class="px-3 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded-full">
                                            Admin
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 text-sm font-semibold text-blue-700 bg-blue-100 rounded-full">
                                            Kelas
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 flex gap-2">
                                    <form action="{{ route('deleteuser', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="px-3 py-2 text-sm bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function searchUsers() {
            let input = document.getElementById("searchUser").value.toLowerCase();
            let rows = document.querySelectorAll("#usersTableBody tr");

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
    </script>
@endpush
