<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('dashboard.appointments.index', compact('appointments'));
    }

    public function updateStatus(Appointment $appointment, $status)
    {
        if (in_array($status, ['pending', 'confirmed', 'cancelled'])) {
            $appointment->update(['status' => $status]);
            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Status tidak valid.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validasi input
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'note' => 'nullable|string',
        ]);

        // Normalisasi nomor telepon: jika diawali 0, ubah ke 62
        $phone = $validated['phone_number'];
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        // Format tanggal ke 'Y-m-d'
        $validated['date'] = Carbon::parse($validated['date'])->format('Y-m-d');

        // Simpan ke database
        Appointment::create([
            'customer_name' => $validated['customer_name'],
            'phone_number' => $phone,
            'date' => $validated['date'],
            'time' => $validated['time'],
            'note' => $validated['note'] ?? null,
            'status' => 'pending', // default
        ]);

        return redirect()->back()->with('success', 'Permintaan janji temu berhasil dibuat. Kami akan segera menghubungi Anda melalui WhatsApp.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Data Janji Temu Berhasil Dihapus.');
    }
}
