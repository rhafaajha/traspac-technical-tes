<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'username.required'     => 'Username tidak boleh kosong!',
            'username.unique'       => 'Username sudah digunakan!',
            'password.required'     => 'Password tidak boleh kosong!',
            'password.min'          => 'Password minimal 12 karakter!',
            'password.regex'        => 'Password harus terdiri dari setidaknya Huruf Kapital, Huruf Kecil, Angka, Simbol, dan minimal 12 karakter.',
        ];

        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required|min:12|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{12,}$/',
        ], $messages);

        $login = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            $result = User::where('username', $validateData['username'])->first();
            session([
                'username' => $request->username,
                'image' => $result->image,
                'name' => $result->name,
                'role' => $result->role,
                'success' => true
            ]);
            $pesan = "Anda login sebagai " . Auth::user()->name . " (@" . Auth::user()->username . ")!";
            return redirect('/dashboard')->with('pesan', $pesan);
        } else {
            // Menentukan pesan berdasarkan alasan kegagalan login
            $pesan = "Login Gagal. ";
            if (User::where('username', $validateData['username'])->exists()) {
                // Jika username benar, tapi password salah
                $pesan .= "Password yang Anda masukkan salah.";
            } else {
                // Jika username tidak ditemukan
                $pesan .= "Username tidak ditemukan.";
            }

            Session::put('success', false);
            return back()->withInput()->with('pesan', $pesan);
        }
    }

    public function logout()
    {
        // session(['success' => true])->forget(['username', 'password', 'image', 'role', 'nama', 'success']);
        Auth::logout();
        // Hapus semua session
        Session::flush();
        // Menetapkan session 'success' ke true
        Session::put('success', true);
        return redirect('/')->with('pesan', 'Logout berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $c)
    {
        //
    }
}
