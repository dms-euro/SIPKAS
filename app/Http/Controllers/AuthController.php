<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function users()
    {
        return view('auth.users');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {
        $users = User::latest()->get();
        return view('auth.users', compact('users'));
    }

    public function adduser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('dashboard.admin')
                    ->with('success', 'Login berhasil sebagai Admin');
            }

            if ($user->role == 'kelas') {
                return redirect()->route('kelas.dashboard')
                    ->with('success', 'Login berhasil sebagai Kelas');
            }

            // kalau role tidak dikenal
            Auth::logout();
            return redirect()->back()->withErrors([
                'email' => 'Role tidak dikenali'
            ]);
        }

        return redirect()->back()
            ->withErrors(['email' => 'Email atau password salah'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login')->with('success', 'Logout berhasil');
    }

    public function profil(String $id)
    {
        return view('auth.profile');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Optional: jangan biarkan user hapus dirinya sendiri
        if ($user->id == auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
