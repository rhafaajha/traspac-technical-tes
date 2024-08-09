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
        return view('soal1.login');
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
            'username.required'     => 'Username atau Email tidak boleh kosong!',
            'password.required'     => 'Password tidak boleh kosong!',
        ];

        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], $messages);

        // $login = [
        //     'username' => $request->username,
        //     'password' => $request->password,
        // ];
        // Check if input is email or username
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Attempt login with the appropriate field
        if (Auth::attempt([$fieldType => $validateData['username'], 'password' => $validateData['password']])) {
            $user = Auth::user();


            // if (Auth::attempt($login)) {
            //     $result = User::where('username', $validateData['username'])->orWhere('email', $validateData['username'])->first();

            // session([
            //     'username' => $request->username,
            //     'image' => $result->image,
            //     'name' => $result->name,
            //     'role' => $result->role,
            //     'success' => true
            // ]);
            // $pesan = "Anda login sebagai " . Auth::user()->name . " (@" . Auth::user()->username . ")!";

            // Set session data
            session([
                'username' => $user->username,
                'image' => $user->image,
                'name' => $user->name,
                'role' => $user->role,
                'success' => true
            ]);

            $pesan = "Anda login sebagai " . $user->name . " (@" . $user->username . ")!";

            return redirect('/dashboard')->with('pesan', $pesan);
        } else {
            // Menentukan pesan berdasarkan alasan kegagalan login
            $pesan = "Login Gagal. ";
            if (User::where('username', $validateData['username'])->orWhere('email', $validateData['username'])->exists()) {
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
