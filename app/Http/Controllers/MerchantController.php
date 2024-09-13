<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    public function index()
    {
        $merchant = Auth::guard('merchant')->user();
        return view('merchants.index', compact('merchants'));
    }

    public function create()
    {
        return view('merchants.create');
    }

    public function edit()
    {
        $merchant = Auth::guard('merchant')->user();
        return view('merchants.edit', compact('merchant'));
    }

    public function update(Request $request)
    {
        $merchant = Auth::guard('merchant')->user();

        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        $merchant->company_name = $request->company_name;

        $merchant->address = $request->address;
        $merchant->contact = $request->contact;
        $merchant->description = $request->description;

        $merchant->save();

        return redirect()->route('merchant.home')->with('success', 'Merchant updated successfully.');
    }
}
