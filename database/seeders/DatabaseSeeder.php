<?php

namespace Database\Seeders;

use App\Models\Alur;
use App\Models\Komoditi;
use App\Models\Laboratorium;
use App\Models\RuangLingkup;
use App\Models\Sertifikasi;
use App\Models\Tarif;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Laboratorium
        $labs = [
            ['nama' => 'Laboratorium Limbah', 'slug' => 'limbah'],
            ['nama' => 'Laboratorium Udara', 'slug' => 'udara'],
            ['nama' => 'Laboratorium Kimia', 'slug' => 'kimia'],
            ['nama' => 'Laboratorium Mikrobiologi', 'slug' => 'mikrobiologi'],
            ['nama' => 'Laboratorium Proses (Bahan Bangunan)', 'slug' => 'proses'],
        ];

        foreach ($labs as $lab) {
            Laboratorium::create($lab);
        }

        // Sertifikasi
        Sertifikasi::create([
            'judul' => 'Sertifikat Akreditasi KAN',
            'gambar' => 'sertifikasi/sertifikat.png',
            'lampiran' => 'sertifikasi/lampiran-akreditasi.pdf',
            'deskripsi' => 'Sertifikat akreditasi dari Komite Akreditasi Nasional',
        ]);

        // Alur
        Alur::create([
            'judul' => 'Alur Pelayanan Pengujian',
            'gambar' => 'alur/alur-pengujian.jpg',
            'deskripsi' => 'Alur pelayanan pengujian di BSPJI Banda Aceh',
        ]);

        // Ruang Lingkup
        $ruangLingkup = [
            ['laboratorium_id' => 1, 'komoditi' => 'Air Limbah Industri', 'parameter_uji' => 'pH (Derajat Keasaman)', 'metode_uji' => 'SNI 6989.11:2019'],
            ['laboratorium_id' => 1, 'komoditi' => 'Air Limbah Domestik', 'parameter_uji' => 'BOD (Biochemical Oxygen Demand)', 'metode_uji' => 'SNI 6989.72:2009'],
            ['laboratorium_id' => 2, 'komoditi' => 'Udara Ambien', 'parameter_uji' => 'Sulfur Dioksida (SO2)', 'metode_uji' => 'SNI 7119.7:2017'],
            ['laboratorium_id' => 2, 'komoditi' => 'Udara Emisi', 'parameter_uji' => 'Nitrogen Oksida (NOx)', 'metode_uji' => 'SNI 7117.16:2019'],
            ['laboratorium_id' => 3, 'komoditi' => 'Pupuk NPK padat', 'parameter_uji' => 'Kadar Nitrogen Total', 'metode_uji' => 'SNI 2803:2010'],
            ['laboratorium_id' => 3, 'komoditi' => 'Garam Konsumsi', 'parameter_uji' => 'Kadar NaCl', 'metode_uji' => 'SNI 3556:2016'],
            ['laboratorium_id' => 4, 'komoditi' => 'Makanan Ringan', 'parameter_uji' => 'Angka Lempeng Total', 'metode_uji' => 'SNI 01-2332.3.2006'],
            ['laboratorium_id' => 4, 'komoditi' => 'Air Minum', 'parameter_uji' => 'E.Coli', 'metode_uji' => 'SNI 01-2332.1:2006'],
            ['laboratorium_id' => 5, 'komoditi' => 'Batu Bata Merah', 'parameter_uji' => 'Kuat Tekan', 'metode_uji' => 'SNI 15-2094-2000'],
            ['laboratorium_id' => 5, 'komoditi' => 'Beton', 'parameter_uji' => 'Kuat Tekan', 'metode_uji' => 'SNI 1974:2011'],
        ];

        foreach ($ruangLingkup as $rl) {
            RuangLingkup::create($rl);
        }

        // Komoditi untuk Tarif
        $komoditiData = [
            ['nama' => 'Pupuk', 'slug' => 'pupuk'],
            ['nama' => 'Garam', 'slug' => 'garam'],
            ['nama' => 'Semen', 'slug' => 'semen'],
            ['nama' => 'Air Minum', 'slug' => 'air-minum'],
            ['nama' => 'Makanan', 'slug' => 'makanan'],
        ];

        foreach ($komoditiData as $kom) {
            Komoditi::create($kom);
        }

        // Tarif
        $tarifData = [
            ['komoditi_id' => 1, 'parameter' => 'Kadar Nitrogen', 'satuan' => 'Sampel', 'harga' => 150000],
            ['komoditi_id' => 1, 'parameter' => 'Kadar Fosfor', 'satuan' => 'Sampel', 'harga' => 175000],
            ['komoditi_id' => 1, 'parameter' => 'Kadar Kalium', 'satuan' => 'Sampel', 'harga' => 160000],
            ['komoditi_id' => 2, 'parameter' => 'Kadar NaCl', 'satuan' => 'Sampel', 'harga' => 125000],
            ['komoditi_id' => 2, 'parameter' => 'Kadar Iodium', 'satuan' => 'Sampel', 'harga' => 100000],
            ['komoditi_id' => 3, 'parameter' => 'Kuat Tekan', 'satuan' => 'Sampel', 'harga' => 200000],
            ['komoditi_id' => 3, 'parameter' => 'Waktu Ikat', 'satuan' => 'Sampel', 'harga' => 180000],
            ['komoditi_id' => 4, 'parameter' => 'pH', 'satuan' => 'Sampel', 'harga' => 50000],
            ['komoditi_id' => 4, 'parameter' => 'TDS', 'satuan' => 'Sampel', 'harga' => 75000],
            ['komoditi_id' => 5, 'parameter' => 'Angka Lempeng Total', 'satuan' => 'Sampel', 'harga' => 250000],
        ];

        foreach ($tarifData as $tarif) {
            Tarif::create($tarif);
        }
    }
}