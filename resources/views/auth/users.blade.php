<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Kelas - Kas Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9f0',
                            100: '#dbf0db',
                            200: '#b8e0b8',
                            300: '#88ca88',
                            400: '#56ab56',
                            500: '#3d8f3d',
                            600: '#2f712f',
                            700: '#285a28',
                            800: '#234823',
                            900: '#1d3b1d',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 min-h-screen">
    <!-- Sidebar -->
    <div class="flex">
        <div
            class="fixed inset-y-0 left-0 bg-white w-64 shadow-lg border-r border-gray-100 transform transition-transform duration-300 ease-in-out z-30">
            <div class="flex items-center justify-center h-16 bg-gradient-to-r from-primary-500 to-primary-700">
                <div class="flex items-center space-x-2">
                    <i class="ri-bank-line text-white text-2xl"></i>
                    <span class="text-white font-bold text-xl">Kas Sekolah</span>
                </div>
            </div>

            <nav class="mt-8 px-4">
                <div class="mb-6">
                    <p class="text-xs uppercase text-gray-500 font-semibold tracking-wider pl-3 mb-2">Menu Utama</p>
                    <a href="admin.html"
                        class="flex items-center py-3 px-3 text-gray-700 hover:bg-gray-100 rounded-lg mb-1">
                        <i class="ri-dashboard-line mr-3 text-lg"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a href="tagihan.html"
                        class="flex items-center py-3 px-3 text-gray-700 hover:bg-gray-100 rounded-lg mb-1">
                        <i class="ri-bill-line mr-3 text-lg"></i>
                        <span class="font-medium">Tagihan Kas</span>
                    </a>
                    <a href="transaksi.html"
                        class="flex items-center py-3 px-3 text-gray-700 hover:bg-gray-100 rounded-lg mb-1">
                        <i class="ri-exchange-dollar-line mr-3 text-lg"></i>
                        <span class="font-medium">Konfirmasi Transaksi</span>
                    </a>
                    <a href="rekapitulasi.html"
                        class="flex items-center py-3 px-3 text-gray-700 hover:bg-gray-100 rounded-lg mb-1">
                        <i class="ri-file-chart-line mr-3 text-lg"></i>
                        <span class="font-medium">Rekapitulasi</span>
                    </a>
                </div>

                <div class="mb-6">
                    <p class="text-xs uppercase text-gray-500 font-semibold tracking-wider pl-3 mb-2">Pengaturan</p>
                    <a href="user.html"
                        class="flex items-center py-3 px-3 text-gray-700 hover:bg-gray-100 rounded-lg mb-1">
                        <i class="ri-user-line mr-3 text-lg"></i>
                        <span class="font-medium">Management User</span>
                    </a>
                    <a href="kelas.html"
                        class="flex items-center py-3 px-3 bg-primary-50 text-primary-700 rounded-lg mb-1">
                        <i class="ri-group-line mr-3 text-lg"></i>
                        <span class="font-medium">Data Kelas</span>
                    </a>
                </div>

                <div class="mb-6">
                    <p class="text-xs uppercase text-gray-500 font-semibold tracking-wider pl-3 mb-2">Akun</p>
                    <div class="flex items-center py-3 px-3 text-gray-700">
                        <div
                            class="h-8 w-8 bg-gradient-to-r from-primary-500 to-primary-700 rounded-full flex items-center justify-center text-white font-bold mr-3">
                            A</div>
                        <div>
                            <p class="font-medium">Admin Sekolah</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                    </div>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="flex items-center py-3 px-3 text-gray-700 hover:bg-gray-100 rounded-lg mb-1">
                        <i class="ri-logout-box-line mr-3 text-lg"></i>
                        <span class="font-medium">Keluar</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>

                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1 p-6">
            <!-- Header -->
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Management Kelas</h1>
                    <p class="text-gray-600">Kelola data kelas dan wali kelas</p>
                </div>
                <div class="flex items-center space-x-3">
                    <div
                        class="h-10 w-10 bg-gradient-to-r from-primary-500 to-primary-700 rounded-full flex items-center justify-center text-white font-bold">
                        A</div>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Total Kelas</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">15 Kelas</p>
                        </div>
                        <div class="bg-primary-50 p-3 rounded-lg">
                            <i class="ri-group-line text-primary-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600 text-sm">X: 5, XI: 5, XII: 5</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Kelas dengan Wali</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">12 Kelas</p>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <i class="ri-user-star-line text-green-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-green-600 text-sm">80% terisi</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Kelas Tanpa Wali</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">3 Kelas</p>
                        </div>
                        <div class="bg-amber-50 p-3 rounded-lg">
                            <i class="ri-user-unfollow-line text-amber-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-amber-600 text-sm">Perlu penugasan</p>
                    </div>
                </div>
            </div>

            <!-- Form Tambah Kelas dan Wali Kelas -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Tambah Kelas & Wali Kelas Baru</h2>

                <form id="kelasForm" method="POST" action="{{ route('adduser') }}">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div class="space-y-6">
                            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <i class="ri-user-star-line text-blue-600 text-xl mr-2"></i>
                                    <h3 class="font-bold text-blue-800">Data Kelas</h3>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
                                        <input type="text" name="name"
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            placeholder="Masukkan nama kelas contoh: 7A" required>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Kelas</label>
                                        <input type="email" name="email"
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            placeholder="Masukkan email kelas contoh: 7A@smp.com" required>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                        <input type="password" name="password"
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            placeholder="Masukkan password kelas" required>
                                    </div>

                                    <div class="hidden">
                                        <input type="text" name="role" value="kelas" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-600">
                                    <i class="ri-information-line text-blue-500 mr-1"></i>
                                    Data Akan Disimpan Sebagai Kelas
                                </p>
                            </div>
                            <div class="flex space-x-4">
                                <button type="reset"
                                    class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50">
                                    Reset Form
                                </button>
                                <button type="submit"
                                    class="px-6 py-3 bg-gradient-to-r from-primary-500 to-primary-700 text-white font-medium rounded-lg hover:opacity-90">
                                    <i class="ri-add-line mr-2"></i> Simpan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Filter dan Pencarian -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cari Kelas</label>
                        <div class="relative">
                            <input type="text" id="searchInput"
                                class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="Cari nama kelas atau wali...">
                            <i class="ri-search-line absolute left-3 top-3.5 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tingkatan</label>
                        <select id="tingkatanFilter"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option value="">Semua Tingkatan</option>
                            <option value="X">Kelas X</option>
                            <option value="XI">Kelas XI</option>
                            <option value="XII">Kelas XII</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status Wali</label>
                        <select id="waliFilter"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option value="">Semua Status</option>
                            <option value="ada">Ada Wali</option>
                            <option value="tanpa">Tanpa Wali</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Tabel Kelas -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-lg font-bold text-gray-800">Daftar Kelas</h2>
                    <div class="text-sm text-gray-500">
                        Total: <span class="font-bold text-gray-800">15 Kelas</span>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table id="kelasTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kelas</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tingkatan</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Wali Kelas</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email Wali</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah Siswa</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="h-10 w-10 bg-gradient-to-r from-primary-500 to-primary-700 rounded-lg flex items-center justify-center text-white font-bold mr-3">
                                            XA</div>
                                        <div>
                                            <div class="font-medium text-gray-900">X A</div>
                                            <div class="text-sm text-gray-500">ID: KLS001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary-100 text-primary-800">Kelas
                                        X</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Budi Santoso, S.Pd.</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-900">budi.santoso@sekolah.id</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center">
                                        <div class="font-bold text-gray-800">32</div>
                                        <div class="text-xs text-gray-500">siswa</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-primary-600 hover:text-primary-900 mr-3"
                                        onclick="editKelas(1)">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 mr-3" onclick="deleteKelas(1)">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-900">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="h-10 w-10 bg-gradient-to-r from-green-500 to-green-700 rounded-lg flex items-center justify-center text-white font-bold mr-3">
                                            XB</div>
                                        <div>
                                            <div class="font-medium text-gray-900">X B</div>
                                            <div class="text-sm text-gray-500">ID: KLS002</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary-100 text-primary-800">Kelas
                                        X</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Siti Aminah, S.Pd.</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-900">siti.aminah@sekolah.id</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center">
                                        <div class="font-bold text-gray-800">30</div>
                                        <div class="text-xs text-gray-500">siswa</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-primary-600 hover:text-primary-900 mr-3"
                                        onclick="editKelas(2)">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 mr-3" onclick="deleteKelas(2)">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-900">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="h-10 w-10 bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg flex items-center justify-center text-white font-bold mr-3">
                                            XC</div>
                                        <div>
                                            <div class="font-medium text-gray-900">X C</div>
                                            <div class="text-sm text-gray-500">ID: KLS003</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary-100 text-primary-800">Kelas
                                        X</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">-</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-500 text-sm">Belum ada wali</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">Tanpa
                                        Wali</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center">
                                        <div class="font-bold text-gray-800">28</div>
                                        <div class="text-xs text-gray-500">siswa</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-primary-600 hover:text-primary-900 mr-3"
                                        onclick="editKelas(3)">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 mr-3" onclick="deleteKelas(3)">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-900">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="h-10 w-10 bg-gradient-to-r from-amber-500 to-amber-700 rounded-lg flex items-center justify-center text-white font-bold mr-3">
                                            XIA</div>
                                        <div>
                                            <div class="font-medium text-gray-900">XI A</div>
                                            <div class="text-sm text-gray-500">ID: KLS004</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Kelas
                                        XI</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Agus Wijaya, S.Pd.</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-900">agus.wijaya@sekolah.id</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center">
                                        <div class="font-bold text-gray-800">35</div>
                                        <div class="text-xs text-gray-500">siswa</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-primary-600 hover:text-primary-900 mr-3"
                                        onclick="editKelas(4)">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 mr-3" onclick="deleteKelas(4)">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-900">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-100 flex justify-between items-center">
                    <div class="text-sm text-gray-500">
                        Menampilkan <span class="font-medium">4</span> dari <span class="font-medium">15</span> kelas
                    </div>
                    <div class="flex space-x-2">
                        <button
                            class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Sebelumnya</button>
                        <button
                            class="px-3 py-1.5 border border-primary-500 bg-primary-50 text-primary-700 rounded-lg text-sm font-medium">1</button>
                        <button
                            class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
                        <button
                            class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
                        <button
                            class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">4</button>
                        <button
                            class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Selanjutnya</button>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-8 pt-6 border-t border-gray-200 text-center text-gray-500 text-sm">
                <p>© 2024 Admin Web Kas Sekolah. Sistem manajemen kas sekolah terintegrasi.</p>
            </footer>
        </div>
    </div>

    <!-- Modal Edit Kelas -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-4">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Edit Data Kelas</h3>
                <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>

            <div class="p-6">
                <form id="editForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Data Kelas -->
                        <div class="space-y-4">
                            <div class="bg-primary-50 border border-primary-100 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <i class="ri-group-line text-primary-600 text-xl mr-2"></i>
                                    <h3 class="font-bold text-primary-800">Data Kelas</h3>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tingkatan</label>
                                        <select
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            required>
                                            <option value="X" selected>Kelas X</option>
                                            <option value="XI">Kelas XI</option>
                                            <option value="XII">Kelas XII</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Abjad Kelas</label>
                                        <select
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            required>
                                            <option value="A" selected>A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                            <option value="G">G</option>
                                            <option value="H">H</option>
                                            <option value="I">I</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah
                                            Siswa</label>
                                        <input type="number"
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            value="32" min="0" max="50">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Wali Kelas -->
                        <div class="space-y-4">
                            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <i class="ri-user-star-line text-blue-600 text-xl mr-2"></i>
                                    <h3 class="font-bold text-blue-800">Data Wali Kelas</h3>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Wali
                                            Kelas</label>
                                        <input type="text"
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            value="Budi Santoso, S.Pd." required>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                        <input type="email"
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            value="budi.santoso@sekolah.id" required>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Ganti
                                            Password</label>
                                        <input type="password"
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                            placeholder="Kosongkan jika tidak ingin mengganti">
                                    </div>

                                    <div class="hidden">
                                        <input type="text" name="role" value="kelas" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-4">
                        <button type="button" onclick="closeEditModal()"
                            class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50">Batal</button>
                        <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-primary-500 to-primary-700 text-white font-medium rounded-lg hover:opacity-90">Update
                            Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete Confirmation -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4">
            <div class="p-6">
                <div class="text-center mb-6">
                    <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-alert-line text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Hapus Kelas</h3>
                    <p class="text-gray-600">Apakah Anda yakin ingin menghapus kelas ini?</p>
                    <p class="text-sm text-red-600 mt-2">Perhatian: Wali kelas terkait juga akan dihapus!</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <div
                            class="h-10 w-10 bg-gradient-to-r from-primary-500 to-primary-700 rounded-lg flex items-center justify-center text-white font-bold mr-3">
                            XA</div>
                        <div>
                            <div class="font-medium text-gray-900">X A</div>
                            <div class="text-sm text-gray-500">Wali: Budi Santoso, S.Pd.</div>
                            <div class="text-sm text-gray-500">32 siswa</div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <button onclick="closeDeleteModal()"
                        class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50">Batal</button>
                    <button onclick="confirmDelete()"
                        class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-700 text-white font-medium rounded-lg hover:opacity-90">Hapus
                        Kelas</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
