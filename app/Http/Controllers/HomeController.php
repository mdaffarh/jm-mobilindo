<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::with('brand', 'images')->latest()->get();
        $latestCars = Car::with('brand', 'images')->latest()->take(5)->get();
        $brands = Brand::all();
        $news = News::where('status', 'published')->get();
        return view('home', compact('cars', 'brands', 'latestCars', 'news'));
    }

    public function showNews($id)
    {
        $news = News::findOrFail($id);

        return view('news-detail', compact('news'));
    }

    public function showCarDetail(Car $car)
    {
        $car->load(['brand', 'images']); // eager load relasi
        return view('car', compact('car'));
    }

    public function browseCars(Request $request)
    {
        $search = $request->input('search');

        $brands = Brand::all();
        $cars = Car::with(['brand', 'images'])
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhereHas('brand', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate(12);

        return view('cars', compact('cars', 'search', 'brands'));
    }

    public function browseBrands(Request $request)
    {
        $search = $request->input('search');

        $brands = Brand::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(12);

        return view('brands', compact('brands', 'search'));
    }

    public function browseNews(Request $request)
    {
        $search = $request->input('search');

        $news = News::when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(12);

        return view('news', compact('news', 'search'));
    }

    public function showCreditForm()
    {
        $cars = Car::with('brand')
            ->where('price_type', 'otr_credit')
            ->get();
        return view('credit-simulation', compact('cars'));
    }

    public function simulateCredit(Request $request)
    {
        $car = Car::with('brand')->findOrFail($request->car_id);
        $dp = (int) str_replace('.', '', $request->dp);
        $tenor = (int) $request->tenor;
        $harga = $car->price_value;

        // Validasi DP minimal 25%
        $minDp = $harga * 0.25;
        if ($dp < $minDp) {
            return back()->withInput()->withErrors(['dp' => 'DP minimal 25% dari harga mobil (Rp' . number_format($minDp, 0, ',', '.') . ')']);
        }

        // Tentukan bunga otomatis berdasarkan tenor
        $bungaRates = [1 => 3.5, 2 => 4.5, 3 => 5.5, 4 => 6.5, 5 => 7.5];
        $bunga = $bungaRates[$tenor] ?? 6;

        // Hitung asuransi
        $asuransiType = $request->asuransi;
        $asuransi = 0;
        if ($asuransiType === 'komprehensif') {
            $asuransi = $harga * 0.025 * $tenor;
        } elseif ($asuransiType === 'kombinasi') {
            $asuransi = $harga * 0.015 * $tenor;
        }

        $sisa = $harga - $dp;
        $bunga_total = ($sisa * ($bunga / 100)) * $tenor;
        $total_pinjaman = $sisa + $bunga_total + $asuransi;
        $angsuran_bulanan = $total_pinjaman / ($tenor * 12);

        return view('credit-simulation', [
            'cars' => Car::with('brand')->where('price_type', 'otr_credit')->get(),
            'selectedCar' => $car,
            'result' => [
                'angsuran' => round($angsuran_bulanan),
                'total_pinjaman' => round($total_pinjaman),
                'bunga_total' => round($bunga_total),
                'bunga_rate' => $bunga,
                'asuransi' => round($asuransi),
            ]
        ]);
    }
}
