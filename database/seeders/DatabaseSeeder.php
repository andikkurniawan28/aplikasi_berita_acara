<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Kasus;
use App\Models\Dokumen;
use App\Models\Material;
use App\Models\JenisKendaraan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            ['name' => 'Andik Kurniawan', 'username' => 'andik', 'password' => bcrypt('Qc_789456')],
        ]);

        Dokumen::insert([
            [
                'judul' => 'Memorandum',
                'nomor_dokumen' => 'No. KBA/FRM/QCT/043-2025/',
                'kepada' => 'Kepala Bagian TUK',
                'dari' => 'Bagian Quality Control',
                'perihal' => 'Pengajuan Koreksi Bobot Timbangan',
                'redaksi_awal' => 'Sehubungan dengan adanya informasi dari petugas timbangan bagian Pabrikasi - Quality Control, bahwa ',
                'redaksi_akhir' => 'Berdasarkan kronologi kejadian tersebut, tim Quality Control memutuskan melakukan penyesuaian data penimbangan guna memastikan kebenaran informasi terkait. Sehubungan dengan hal ini, kami mohon untuk dilakukan koreksi atas angkutan dengan data sebagai berikut :',
                'penutup' => 'Demikian surat ini kami buat untuk dapat ditindaklanjuti. Atas perhatian dan kerjasamanya Kami sampaikan terima kasih.',
                'menyetujui' => 'Tri Sunu Hardi'
            ],
        ]);

        Kasus::insert([
            [ 'nama' => 'Ketumpangan', 'kronologi' => 'saat proses penimbangan berlangsung, terjadi ketidaksesuaian data akibat kendaraan tersebut ketumpangan dengan angkutan lain yang berada di belakangnya pada area timbangan.'],
            [ 'nama' => 'Double Tapping', 'kronologi' => 'terjadi tap kartu lebih dari satu kali pada angkutan yang sama sehingga sistem mencatat transaksi penimbangan ganda.'],
            [ 'nama' => 'Tidak Timbang Bruto', 'kronologi' => 'kendaraan tidak melaksanakan penimbangan bruto saat kedatangan sesuai prosedur, sehingga data awal yang valid terkait bobot total kendaraan tidak tersedia.'],
        ]);

        JenisKendaraan::insert([
            ['name' => 'Engkel Kecil'],
            ['name' => 'Engkel Besar'],
            ['name' => 'Gandeng'],
            ['name' => 'Pick-up'],
        ]);

        Material::insert([
            ['name' => 'Tebu'],
            ['name' => 'Tetes'],
            ['name' => 'Blotong'],
            ['name' => 'Ampas'],
            ['name' => 'Sekam'],
            ['name' => 'Kapur'],
            ['name' => 'Gula Reproses'],
        ]);
    }
}
