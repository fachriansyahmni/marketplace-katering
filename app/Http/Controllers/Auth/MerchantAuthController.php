<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MerchantAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.merchant.merchant-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:merchants',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'description' => 'nullable|string|max:500',
            'location' => 'nullable|string|max:255',
        ], [
            'company_name.required' => 'Nama perusahaan wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Password konfirmasi tidak cocok.',
            'password.min' => 'Password harus minimal 8 karakter.',
            'address.required' => 'Alamat wajib diisi.',
            'contact.required' => 'Kontak wajib diisi.',
            'contact.max' => 'Kontak tidak boleh lebih dari 20 karakter.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
        ]);

        // Create the Merchant user
        $merchant = Merchant::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'contact' => $request->contact,
            'description' => $request->description,
            'location' => $request->location,
        ]);

        Auth::guard('merchant')->login($merchant);

        return redirect()->route('merchant.login')->with('success', 'Registration successful');;
    }

    public function showLoginForm()
    {
        return view('auth.merchant.merchant-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('merchant')->attempt($credentials)) {
            return redirect()->intended('/merchants/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->route('merchant.login')->withErrors([
            'email' => trans('auth.failed'),
        ]);
    }

    public function logout()
    {
        Auth::guard('merchant')->logout();
        return redirect('/');
    }
}
