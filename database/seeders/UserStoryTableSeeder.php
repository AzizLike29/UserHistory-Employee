<?php

namespace Database\Seeders;

use App\Models\UserStory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserStoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKtpPath = 'public/ktp_dummy.jpg';
        Storage::put($dataKtpPath, 'fake content');

        UserStory::create([
            'first_name' => 'Dody',
            'last_name' => 'Doe',
            'date_of_birth' => '1990-05-15',
            'phone' => '08123456789',
            'email' => 'dody.doe@example.com',
            'province' => 'Jawa Barat',
            'city' => 'Bandung',
            'street_address' => 'Jl. Merdeka No.123',
            'zip_code' => '40123',
            'ktp_number' => '3271012300120001',
            'position' => 'Staff Marketing',
            'bank_account_name' => 'Mandiri',
            'bank_account_number' => '1234567890',
            'scan_ktp_url_drive' => 'https://drive.google.com/file/d/FAKE_ID/view',
        ]);
    }
}
