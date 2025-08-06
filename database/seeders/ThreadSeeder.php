<?php

namespace Database\Seeders;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('name', 'Elham Syahrian Putra')->first();

        $threads = [
            [
                "user_id" => $user->id,
                "role" => "user",
                "message" => "apa daftar surat yang bisa saya ajukan beserta totalnya"
            ],
            [
                "user_id" => $user->id,
                "role" => "assistant",
                "message" => "Berikut adalah daftar jenis surat yang bisa Anda ajukan:\n- Ijin Penelitian\n- Bebas Administrasi\n- Aktif Kuliah\n- Aktif Untuk Tunjangan Ortu\n- Publikasi & Prosiding\n- Verifikasi Data PDDIKTI\n- SKL & SK YUDISIUM\n- Perubahan PDDIKTI\n- Pembayaran Luar Jadwal\n- Perpanjangan Studi\n- Selang/Cuti\n- Penundaan UKT\n- Undur Diri\n\nTotal ada 13 jenis surat yang bisa Anda ajukan."
            ],
        ];

        foreach ($threads as $thread) {
            Thread::create($thread);
        }
    }
}
