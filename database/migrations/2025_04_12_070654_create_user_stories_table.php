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
        Schema::create('user_stories', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100); //nama depan
            $table->string('last_name', 100); //nama belakang
            $table->date('date_of_birth'); //tanggal lahir
            $table->string('phone', 20); //nomer telepon
            $table->string('email', 150)->unique(); //alamat email
            $table->string('province', 100); //alamat provinsi
            $table->string('city', 100); //alamat kota
            $table->string('street_address', 255); //alamat jalan
            $table->string('zip_code', 10); //kode pos
            $table->string('ktp_number', 20)->unique(); //nomor KTP
            $table->string('position', 100); //posisi saat ini
            $table->string('bank_account_name', 150); //nama bank
            $table->string('bank_account_number', 50); //nomor rekening bank
            $table->string('scan_ktp_url_drive', 255); //URL scan KTP
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_stories');
    }
};
