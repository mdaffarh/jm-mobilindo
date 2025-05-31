<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@jmmobilindo.com',
            'password' => bcrypt('1234')
        ]);

        // appointments dummy data
        Appointment::create([
            'customer_name' => 'Andi Saputra',
            'phone_number' => '6281290413084',
            'date' => now()->addDays(1)->toDateString(),
            'time' => '10:00:00',
            'note' => 'Ingin test drive Avanza',
            'status' => 'pending',
        ]);

        Appointment::create([
            'customer_name' => 'Dewi Lestari',
            'phone_number' => '6281298765432',
            'date' => now()->addDays(2)->toDateString(),
            'time' => '13:30:00',
            'note' => 'Konsultasi kredit mobil',
            'status' => 'confirmed',
        ]);

        Appointment::create([
            'customer_name' => 'Budi Santoso',
            'phone_number' => '6281322233344',
            'date' => now()->addDays(3)->toDateString(),
            'time' => '09:15:00',
            'note' => null,
            'status' => 'cancelled',
        ]);

        // news dummy data
        News::insert([
            [
                'title' => 'Peluncuran Mobil Baru 2025',
                'content' => 'JM Mobilindo merilis mobil terbaru dengan fitur canggih dan efisiensi bahan bakar tinggi.',
                'thumbnail_path' => null,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Promo Besar Akhir Tahun',
                'content' => 'Dapatkan diskon hingga 30% untuk pembelian mobil bekas berkualitas hanya di JM Mobilindo.',
                'thumbnail_path' => null,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tips Merawat Mobil',
                'content' => 'Berikut adalah tips sederhana untuk menjaga performa mobil Anda tetap optimal setiap hari.',
                'thumbnail_path' => null,
                'status' => 'archived',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
