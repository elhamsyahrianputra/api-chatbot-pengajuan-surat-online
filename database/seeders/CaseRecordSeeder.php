<?php

namespace Database\Seeders;

use App\Models\CaseRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaseRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $caseRecords = [
            // Kasus 1: Kasus Ideal yang Sudah Diverifikasi dan Sering Digunakan
            [
                'problem' => 'Bagaimana cara mengajukan surat keterangan bebas UKT karena saya penerima KIP-Kuliah?',
                'solution' => "Untuk mahasiswa penerima KIP-Kuliah, Anda dapat memilih 'Surat Keterangan Lainnya' pada form pengajuan online. Pada kolom keterangan, tuliskan 'Pengajuan Surat Keterangan Bebas UKT' dan lampirkan bukti status sebagai penerima KIP-K pada file persyaratan.",
                'keywords' => 'bebas ukt, kip-kuliah, kipk, spp, uang kuliah tunggal, keringanan',
                'frequency' => 12,
                'confidence_score' => 0.98,
                'status' => 'verified',
            ],

            // Kasus 2: Kasus Baru yang Dicatat Sistem dan Menunggu Verifikasi Admin
            [
                'problem' => 'Saya mau ambil transkrip nilai sementara untuk daftar beasiswa, tapi harus ada tanda tangan dari Kajur. Apakah bisa diproses lewat layanan surat online?',
                'solution' => '',
                'keywords' => '',
                'frequency' => 1,
                'confidence_score' => 0.5,
                'status' => 'unverified',
            ],

            // Kasus 3: Kasus Lama yang Sudah Tidak Relevan (Deprecated)
            [
                'problem' => 'Di mana saya bisa mengambil formulir F-1 untuk pengajuan judul skripsi secara offline?',
                'solution' => 'Formulir F-1 bisa diambil di loket 3 bagian akademik gedung A. Jam pengambilan formulir adalah jam 09.00 - 14.00.',
                'keywords' => 'formulir, f-1, skripsi, offline, judul',
                'frequency' => 25,
                'confidence_score' => 0.1,
                'status' => 'deprecated',
            ],

            // Kasus 4: Kasus Umum dengan Variasi Pertanyaan (Sudah Diverifikasi)
            [
                'problem' => 'Saya mau cek status surat saya yang kemarin, kodenya SUB-12345. Sudah sampai mana ya prosesnya?',
                'solution' => "Anda bisa melacak status pengajuan surat Anda secara mandiri melalui menu 'Pantauan' > 'Lacak Surat Online' di website ini, atau bisa langsung bertanya kepada saya dengan format 'cek status surat kode SUB-12345'.",
                'keywords' => 'cek status, lacak surat, status pengajuan, kode surat, tracking',
                'frequency' => 8, // Cukup sering ditanyakan
                'confidence_score' => 0.96,
                'status' => 'verified',
            ],
        ];



        foreach ($caseRecords as $caseRecord) {
            CaseRecord::create($caseRecord);
        }
    }
}
