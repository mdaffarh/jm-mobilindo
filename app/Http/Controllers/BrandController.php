<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('dashboard.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('logo')) {
            $image      = $request->file('logo');
            $extension  = $image->getClientOriginalExtension();
            $filename   = $request->name . '-logo.' . $extension;

            // save in storage/app/public/brands
            $path = $image->storeAs('brands', $filename, 'public');
        }

        Brand::create([
            'name' => $request->name,
            'country' => $request->country,
            'image_path' => $path,
        ]);

        return redirect()->route('brands.index')->with('success', 'Data Merk Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('dashboard.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $brand->name = $request->name;
        $brand->country = $request->country;

        if ($request->hasFile('logo')) {
            $image      = $request->file('logo');
            $extension  = $image->getClientOriginalExtension();
            $filename   = $request->name . '-logo.' . $extension;

            // save in storage/app/public/brands
            $brand->image_path = $image->storeAs('brands', $filename, 'public');
        }


        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Data Merk Berhasil Diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->image_path) {
            Storage::disk('public')->delete($brand->image_path);
        }

        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Data Merk Berhasil Dihapus.');
    }
}
