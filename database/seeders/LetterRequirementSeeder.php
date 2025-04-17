<?php

namespace Database\Seeders;

use App\Models\LetterRequirement;
use App\Models\LetterType;
use Illuminate\Database\Seeder;

class LetterRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ijin Penelitian
        $ijinPenelitian = LetterType::where('slug', 'ijin-penelitian')->first();
        $ijinPenelitianLetterRequirement = [
            [
                'letter_type_id' => $ijinPenelitian->id,
                'name' => 'Surat Izin Penyusunan Skripsi/Tesis/Disertasi beserta permohonannya (ada diformat surat yg telah disediakan)'
            ],
            [
                'letter_type_id' => $ijinPenelitian->id,
                'name' => 'Surat Ijin Penelitian yang dituju untuk melakukan penelitian (ada diformat surat yg telah disediakan)'
            ],
            [
                'letter_type_id' => $ijinPenelitian->id,
                'name' => 'Pengesahan Proposal Skripsi/Tesis/Disertasi'
            ],
            [
                'letter_type_id' => $ijinPenelitian->id,
                'name' => 'KRS Terakhir'
            ],
            [
                'letter_type_id' => $ijinPenelitian->id,
                'name' => 'KHS Terakhir/Transkrip Nilai'
            ],
            [
                'letter_type_id' => $ijinPenelitian->id,
                'name' => 'Kuitansi Terakhir/Rekap Pembayaran'
            ],
            [
                'letter_type_id' => $ijinPenelitian->id,
                'name' => 'SK Beasiswa/Bidik Misi (*Wajib dilampirkan dan diberi tanda bagi penerima)'
            ],
        ];
        foreach ($ijinPenelitianLetterRequirement as $item) {
            LetterRequirement::create($item);
        }

        // Bebas Administrasi
        $bebasAdministrasi = LetterType::where('slug', 'bebas-administrasi')->first();
        $bebasAdministrasiLetterRequirement = [
            [
                'letter_type_id' => $bebasAdministrasi->id,
                'name' => 'Surat Bebas Administrasi yang akan ditanda tangani Sub Koordinator Subbagian Akademik'
            ],
            [
                'letter_type_id' => $bebasAdministrasi->id,
                'name' => 'SKL dan SK Yudisium yang telah ditanda tangani oleh Wakil Dekan beserta Stempel'
            ],
        ];
        foreach ($bebasAdministrasiLetterRequirement as $item) {
            LetterRequirement::create($item);
        }

        // Verifikasi Data PDDIKTI
        $aktifKuliah = LetterType::where('slug', 'aktif-kuliah')->first();
        $aktifKuliahLetterRequirement = [
            [
                'letter_type_id' => $aktifKuliah->id,
                'name' => 'Surat Keterangan Aktif yang akan ditanda tangani pimpinan (ada diformat surat yg telah disediakan)'
            ],
            [
                'letter_type_id' => $aktifKuliah->id,
                'name' => 'Permohonan Surat Keterangan Aktif Kuliah yang telah ditanda tangani lengkap (ada diformat surat yg telah disediakan)'
            ],
            [
                'letter_type_id' => $aktifKuliah->id,
                'name' => 'KRS terakhir'
            ],
            [
                'letter_type_id' => $aktifKuliah->id,
                'name' => 'KHS Terakhir/Transkrip Nilai'
            ],
            [
                'letter_type_id' => $aktifKuliah->id,
                'name' => 'Kuitansi Terakhir/Rekap Pembayaran'
            ],
            [
                'letter_type_id' => $aktifKuliah->id,
                'name' => 'SK Beasiswa/Bidik Misi (*Wajib dilampirkan dan diberi tanda bagi penerima)'
            ],
        ];
        foreach ($aktifKuliahLetterRequirement as $item) {
            LetterRequirement::create($item);
        }

        // Verifikasi Data PDDIKTI
        $keteranganAktifUntukTunjanganOrangTua = LetterType::where('slug', 'aktif-untuk-tunjangan-ortu')->first();
        $keteranganAktifUntukTunjanganOrangTuaLetterRequirement = [
            [
                'letter_type_id' => $keteranganAktifUntukTunjanganOrangTua->id,
                'name' => 'Surat Permohonan yang telah ditanda tangani orang tua (ada diformat surat yg telah disediakan)'
            ],

            [
                'letter_type_id' => $keteranganAktifUntukTunjanganOrangTua->id,
                'name' => 'Surat Keterangan yang akan ditanda tangani oleh Koordinator Tata Usaha FKIP (ada diformat surat yg telah disediakan)'
            ],

            [
                'letter_type_id' => $keteranganAktifUntukTunjanganOrangTua->id,
                'name' => 'Scan KK Asli'
            ],

            [
                'letter_type_id' => $keteranganAktifUntukTunjanganOrangTua->id,
                'name' => 'KRS Terakhir'
            ],

            [
                'letter_type_id' => $keteranganAktifUntukTunjanganOrangTua->id,
                'name' => 'KHS Terakhir/Transkrip Nilai'
            ],

            [
                'letter_type_id' => $keteranganAktifUntukTunjanganOrangTua->id,
                'name' => 'Kuitansi Terakhir/Rekap Pembayaran'
            ],

            [
                'letter_type_id' => $keteranganAktifUntukTunjanganOrangTua->id,
                'name' => 'SK Beasiswa/Bidik Misi (*Wajib dilampirkan dan diberi tanda bagi penerima)'
            ],
        ];
        foreach ($keteranganAktifUntukTunjanganOrangTuaLetterRequirement as $item) {
            LetterRequirement::create($item);
        }
    }
}
