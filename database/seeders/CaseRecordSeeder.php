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
                'problem' => 'Di mana saya bisa mendapatkan KHS?',
                'solution' => "KHS (Kartu Hasil Studi) dapat diunduh langsung melalui akun SIAKAD kamu. Jika mengalami kendala, hubungi admin program studi untuk meminta file softcopy-nya.",
                'keywords' => 'khs, kartu hasil studi, unduh khs, download khs, cetak khs, siakad',
                'frequency' => 12,
                'confidence_score' => 0.98,
                'status' => 'verified',
            ],
            [
                'problem' => 'Bagaimana cara mencetak KRS?',
                'solution' => "KRS (Kartu Rencana Studi) bisa dicetak atau diunduh melalui menu KRS di SIAKAD. Jika tidak bisa login atau terjadi error, silakan minta bantuan admin prodi untuk mendapatkan salinannya.",
                'keywords' => 'krs, kartu rencana studi, cetak krs, download krs, unduh krs, siakad',
                'frequency' => 9,
                'confidence_score' => 0.97,
                'status' => 'verified',
            ],
            [
                'problem' => 'Bagaimana cara mendapatkan transkrip nilai?',
                'solution' => "Transkrip nilai bisa kamu unduh di SIAKAD pada menu Transkrip. Untuk keperluan resmi atau legalisir, mintalah versi resmi yang dicetak dan distempel oleh bagian akademik.",
                'keywords' => 'transkrip nilai, download transkrip, unduh transkrip, cetak transkrip, siakad',
                'frequency' => 7,
                'confidence_score' => 0.96,
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
            // Kasus 3: Kasus Lama yang Sudah Tidak Relevan (Deprecated)
            [
                'problem' => 'Dimana saya bisa mencari atau mengunduh SK Beasiswa/Bidik Misi',
                'solution' => 'SK Beasiswa/Bidik Misi bisa dicari pada halaman situs https://sibea.integrasi.uns.ac.id/unduhan-dokumen. atau mungkin bisa bertanya kepada admin prodi untuk detail lebih lanjut',
                'keywords' => 'sk beasiswa, bidik misi, unduhan dokumen, situs beasiswa, sibea',
                'frequency' => 13,
                'confidence_score' => 0.99,
                'status' => 'verified',
            ],
        ];

        foreach ($caseRecords as $caseRecord) {
            CaseRecord::create($caseRecord);
        }
    }
}
