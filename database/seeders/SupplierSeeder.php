<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_supplier')->insert([
            [
                'supplier_name' => 'PT Maju Jaya',
                'contact_person' => 'Budi Santoso',
                'phone_number' => '08123456789',
                'email' => 'budi@majujaya.com',
                'address' => 'Jalan Merdeka No. 1, Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_name' => 'CV Sejahtera Bersama',
                'contact_person' => 'Siti Aminah',
                'phone_number' => '08234567890',
                'email' => 'siti@sejahtera.com',
                'address' => 'Jalan Kartini No. 45, Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_name' => 'UD Makmur Abadi',
                'contact_person' => 'Ahmad Fauzi',
                'phone_number' => '08345678901',
                'email' => 'ahmad@makmurabadi.com',
                'address' => 'Jalan Sudirman No. 23, Surabaya',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}