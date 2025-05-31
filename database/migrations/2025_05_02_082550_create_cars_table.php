<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama mobil
            $table->string('description')->nullable(); // deskripsi mobil
            $table->foreignId('brand_id')->constrained()->onDelete('cascade'); // relasi ke tabel brands
            $table->year('year'); // tahun produksi
            $table->string('license_plate_area'); // plat mana
            $table->unsignedInteger('mileage_km'); // kilometer
            $table->date('tax_valid_until')->nullable(); // pajak nyala sampai (month/year)
            $table->enum('type', ['gasoline', 'ev']); // jenis: bensin atau EV
            $table->string('spec_image_path')->nullable(); // gambar spesifikasi
            $table->enum('price_type', ['dp', 'otr_cash', 'otr_credit', 'contact']);
            $table->unsignedBigInteger('price_value')->nullable(); // bisa null kalau tipe contact
            $table->text('price_notes')->nullable(); // tambahan keterangan opsional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
