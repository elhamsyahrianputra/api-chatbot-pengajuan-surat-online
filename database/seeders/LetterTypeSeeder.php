<?php

namespace Database\Seeders;

use App\Models\LetterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $letterTypes = [
            [
                "id" => "0196334d-8c25-73a7-8a7e-c08277ac2acb",
                "name" => "Ijin Penelitian",
                "slug" => "ijin-penelitian",
            ],
            [
                "id" => "0196335a-04cb-731f-9177-20d5c37d2804",
                "name" => "Bebas Administrasi",
                "slug" => "bebas-administrasi",
            ],
            [
                "id" => "0196335a-04cc-7027-a4ed-2473a8ebc19e",
                "name" => "Verifikasi Data PDDIKTI",
                "slug" => "verifikasi-data-pddikti",
            ],
            [
                "id" => "0196335a-04ce-7205-a7bf-a39c700acf17",
                "name" => "SKL & SK YUDISIUM",
                "slug" => "skl-sk-yudisium",
            ],
            [
                "id" => "0196335a-04cf-7289-be04-f16ba09901c9",
                "name" => "Publikasi & Prosiding",
                "slug" => "publikasi-prosiding",
            ],
            [
                "id" => "0196335a-04d0-7084-88ae-c4b5a593939f",
                "name" => "Aktif Kuliah",
                "slug" => "aktif-kuliah",
            ],
            [
                "id" => "0196335a-04d1-7154-bec2-75241d6ce171",
                "name" => "Aktif Untuk Tunjangan Ortu",
                "slug" => "aktif-untuk-tunjangan-ortu",
            ],
            [
                "id" => "0196335a-04d2-70a9-83c6-439f67dc2c47",
                "name" => "Perubahan PDDIKTI",
                "slug" => "perubahan-pddikti",
            ],
            [
                "id" => "0196335a-04d2-70a9-83c6-439f684f5c9f",
                "name" => "Pembayaran Luar Jadwal",
                "slug" => "pembayaran-luar-jadwal",
            ],
            [
                "id" => "0196335a-04d3-7041-9b59-3059e12e386b",
                "name" => "Perpanjangan Studi",
                "slug" => "perpanjangan-studi",
            ],
            [
                "id" => "0196335a-04d4-7111-902a-8734100c53dc",
                "name" => "Selang/Cuti",
                "slug" => "selang-cuti",
            ],
            [
                "id" => "0196335a-04d5-71d6-9d12-03c8c2fead29",
                "name" => "Penundaan UKT",
                "slug" => "penundaan-ukt",
            ],
            [
                "id" => "0196335a-04d6-733f-a820-3badc2d3b8ff",
                "name" => "Undur Diri",
                "slug" => "undur-diri",
            ]
        ];

        foreach ($letterTypes as $letterType) {
            LetterType::create($letterType);
        }
    }
}
