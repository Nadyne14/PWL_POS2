<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswordSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua user
        $users = DB::table('m_user')->get();

        foreach ($users as $user) {
            // Jika password belum di-hash (misal panjang password < 60 karakter)
            if (strlen($user->password) < 60) {
                DB::table('m_user')
                    ->where('user_id', $user->user_id)
                    ->update(['password' => Hash::make($user->password)]);
            }
        }
    }
}
