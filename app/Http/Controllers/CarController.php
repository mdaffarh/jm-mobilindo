<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('dashboard.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('dashboard.cars.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
            'year' => 'required|digits:4|integer|min:1980|max:' . date('Y'),
            'license_plate_area' => 'required|string|max:10',
            'mileage_km' => 'required|integer|min:0',
            'tax_valid_until' => 'nullable',
            'type' => 'required|in:gasoline,ev',
            'spec_image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'price_type' => 'required|in:dp,otr_cash,otr_credit,contact',
            'price_value' => 'nullable|integer',
            'price_notes' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Konversi 'YYYY-MM' ke 'YYYY-MM-01' jika ada isinya
        if ($request->filled('tax_valid_until')) {
            $validated['tax_valid_until'] = $request->tax_valid_until . '-01';
        } else {
            $validated['tax_valid_until'] = null;
        }

        // Simpan gambar spesifikasi jika ada
        if ($request->hasFile('spec_image_path')) {
            $validated['spec_image_path'] = $request->file('spec_image_path')->store('cars/specs', 'public');
        }

        // Simpan data mobil
        $car = Car::create($validated);

        // Simpan gambar-gambar galeri jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('cars/gallery', 'public');
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('cars.index')->with('success', 'Data mobil berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Car $car) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        return view('dashboard.cars.edit', compact('car', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
            'year' => 'required|digits:4|integer|min:1980|max:' . date('Y'),
            'license_plate_area' => 'required|string|max:10',
            'mileage_km' => 'required|integer|min:0',
            'tax_valid_until' => 'nullable',
            'type' => 'required|in:gasoline,ev',
            'spec_image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'price_type' => 'required|in:dp,otr_cash,otr_credit,contact',
            'price_value' => 'nullable|integer',
            'price_notes' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'exists:car_images,id',
        ]);

        // Konversi 'YYYY-MM' ke 'YYYY-MM-01' jika ada isinya
        if ($request->filled('tax_valid_until')) {
            $validated['tax_valid_until'] = $request->tax_valid_until . '-01';
        } else {
            $validated['tax_valid_until'] = null;
        }

        // Hapus 'delete_images' dan 'images' dari array yang akan digunakan untuk update
        $updateData = collect($validated)
            ->except(['spec_image_path', 'delete_images', 'images'])
            ->toArray();

        // Update gambar spesifikasi jika ada file baru
        if ($request->hasFile('spec_image_path')) {
            // Hapus gambar spesifikasi lama jika ada
            if ($car->spec_image_path && Storage::disk('public')->exists($car->spec_image_path)) {
                Storage::disk('public')->delete($car->spec_image_path);
            }

            $updateData['spec_image_path'] = $request->file('spec_image_path')->store('cars/specs', 'public');
        }

        // Update data mobil
        $car->update($updateData);

        // Hapus gambar yang dicentang untuk dihapus
        if ($request->has('delete_images')) {
            $imagesToDelete = CarImage::whereIn('id', $request->delete_images)->where('car_id', $car->id)->get();

            foreach ($imagesToDelete as $image) {
                if (Storage::disk('public')->exists($image->path)) {
                    Storage::disk('public')->delete($image->path);
                }
                $image->delete();
            }
        }

        // Tambahkan gambar baru ke galeri jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('cars/gallery', 'public');
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('cars.index')->with('success', 'Data mobil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if ($car->spec_image_path) {
            Storage::disk('public')->delete($car->spec_image_path);
        }

        // Delete related car images in the storage
        $carImages = $car->images; // Assuming there's a relationship set up

        foreach ($carImages as $carImage) {
            if ($carImage->path) {
                // Delete image from storage
                Storage::disk('public')->delete($carImage->path);
            }
        }

        // Delete related car images from the database
        $carImages->each(function ($carImage) {
            $carImage->delete();
        });

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Data Mobil Berhasil Dihapus.');
    }
}
