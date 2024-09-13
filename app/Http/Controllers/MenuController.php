<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $merchantId = Auth::guard('merchant')->user()->id;

        $menus = Menu::where('merchant_id', $merchantId)->paginate(10);
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {

        $merchant = Auth::guard('merchant')->user();

        $merchantId = $merchant->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'menu_category' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('photo', 'public');
        } else {
            $imagePath = null;
        }

        Menu::create([
            'merchant_id' => $merchantId,
            'name' => $request->name,
            'type_menu' => 'food',
            'menu_category' => $request->menu_category,
            'description' => $request->description,
            'photo' => $imagePath,
            'price' => $request->price,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu created successfully.');
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        $merchantId = Auth::guard('merchant')->id();

        if ($menu->merchant_id !== $merchantId) {
            return redirect()->back();
        }

        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type_menu' => 'nullable|string',
            'menu_category' => 'nullable|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $menu->update($request->all());
        return redirect()->route('menu.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        $merchantId = Auth::guard('merchant')->id();

        if ($menu->merchant_id !== $merchantId) {
            return redirect()->back();
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully.');
    }
}
