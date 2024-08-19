<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            // [9, 'Balai Besar POM Bandar Lampung'],
            // [11, 'Balai POM Pangkalpinang'],
            // [15, 'Balai Besar POM Yogyakarta'],
            // [17, 'Balai Besar POM Serang'],
            // [20, 'Balai POM Kupang'],
            // [30, 'Balai POM Ambon'],
            // [2, 'Balai Besar POM Banda Aceh'],
            // [4, 'Balai Besar POM Padang'],
            // [5, 'Balai Besar POM Pekanbaru'],
            // [6, 'Balai POM Jambi'],
            // [7, 'Balai Besar POM Palembang'],
            // [8, 'Balai POM Bengkulu'],
            // [10, 'Balai POM Batam'],
            // [12, 'Balai Besar POM di Jakarta'],
            // [13, 'Balai Besar POM Bandung'],
            // [14, 'Balai Besar POM Semarang'],
            // [16, 'Balai Besar POM Surabaya'],
            // [18, 'Balai Besar POM Denpasar'],
            // [19, 'Balai Besar POM Mataram'],
            // [21, 'Balai Besar POM Pontianak'],
            // [22, 'Balai Besar POM Palangkaraya'],
            // [23, 'Balai Besar POM Banjarmasin'],
            // [26, 'Balai POM Palu'],
            // [27, 'Balai Besar POM Makassar'],
            // [28, 'Balai POM Kendari'],
            // [29, 'Balai POM Gorontalo'],
            // [31, 'Balai Besar POM Jayapura'],
            // [32, 'Balai POM Manokwari'],
            // [3, 'Balai Besar POM Medan'],
            // [33, 'Balai POM Sofifi'],
            // [35, 'Loka POM di Kab. Aceh Selatan'],
            // [36, 'Loka POM di Kab. Aceh Tengah'],
            // [37, 'Loka POM di Kota Tanjung Balai'],
            // [38, 'Loka POM di Kab. Toba Samosir'],
            // [39, 'Loka POM di Kota Lubuklinggau'],
            // [41, 'Loka POM di Kota Tasikmalaya'],
            // [42, 'Loka POM di Kota Surakarta'],
            // [43, 'Loka POM di Kab. Banyumas'],
            // [44, 'Loka POM di Kab. Jember'],
            // [46, 'Loka POM di Kab. Buleleng'],
            // [47, 'Loka POM di Kota Palopo'],
            // [48, 'Loka POM di Kab. Mimika'],
            // [49, 'Loka POM di Kab. Merauke'],
            // [51, 'Loka POM di Kota Payakumbuh'],
            // [52, 'Loka POM di Kota Dumai'],
            // [53, 'Loka POM di Kab. Indragiri Hilir'],
            // [54, 'Loka POM di Kab. Tulangbawang'],
            // [56, 'Loka POM di Kab. Sanggau'],
            // [57, 'Loka POM di Kab. Hulu Sungai Utara'],
            // [58, 'Loka POM di Kab. Tanah Bumbu'],
            // [59, 'Loka POM di Kota Balikpapan'],
            // [62, 'Loka POM di Kab. Kotawaringin Barat'],
            // [63, 'Loka POM di Kab. Tangerang'],
            // [64, 'Loka POM di Kota Sungai Penuh'],
            // [65, 'Loka POM di Kab. Rejang Lebong'],
            // [66, 'Loka POM di Kab. Ende'],
            // [68, 'Loka POM di Kab. Banggai'],
            // [69, 'Loka POM di Kota Baubau'],
            // [70, 'Loka POM di Kab. Kepulauan Tanimbar'],
            // [71, 'Loka POM di Kota Tanjung Pinang'],
            // [72, 'Loka POM di Kab. Belitung'],
            // [74, 'Loka POM di Kab. Pulau Morotai'],
            // [24, 'Balai Besar POM Samarinda'],
            // [25, 'Balai Besar POM Manado'],
            // [34, 'Balai POM Mamuju'],
            // [40, 'Loka POM di Kab. Bogor'],
            // [45, 'Loka POM di Kab. Kediri'],
            // [50, 'Loka POM di Kab. Dharmasraya'],
            // [55, 'Loka POM di Kab. Bima'],
            // [61, 'Loka POM di Kab. Kepulauan Sangihe'],
            // [67, 'Loka POM di Kab. Manggarai Barat'],
            // [73, 'Loka POM di Kab. Sorong'],
            // [60, 'Balai POM di Kota Tarakan'],
            [102, 'Sekretariat Utama'],
            [1920, 'Pos POM Bima'],
            [110, 'Deputi Bidang Penindakan'],
            [108, 'Pusat Analisis Kebijakan Obat dan Makanan'],
            [109, 'Pusat Data dan Informasi Obat dan Makanan'],
            [206, 'Pos POM Sabang'],
            [2007, 'Pos POM Atambua'],
            [2407, 'Pos POM Tarakan'],
            [2008, 'Pos POM Sumba Timur'],
            [2506, 'Pos POM Ternate'],
            [2507, 'Pos POM Tahuna'],
            [2807, 'Pos POM Bau-Bau'],
            [3132, 'Pos POM Merauke'],
            // [101, 'Inspektorat Utama'],
            [103, 'Deputi Bidang Pengawasan Obat'],
            [104, 'Deputi Bidang Pengawasan Obat Tradisional'],
            [105, 'Deputi Bidang Pengawasan Pangan Olahan'],
            [106, 'Pusat Pengembangan Pengujian Obat dan Makanan Nasional'],
            [107, 'Pusat Pengembangan Sumber Daya Manusia Pengawasan Obat dan Makanan'],
            [10203, 'Biro Kerja Sama dan Hubungan Masyarakat'],
            [10309, 'Direktorat Pengawasan Keamanan'],
            [10405, 'Direktorat Pemberdayaan Masyarakat dan Pelaku Usaha Obat Tradisional'],
            [10503, 'Direktorat Pengawasan Produksi Pangan Olahan'],
            [11004, 'Direktorat Siber Obat dan Makanan'],
            [10103, 'Inspektorat II'],
            [10202, 'Biro Hukum dan Organisasi'],
            [10102, 'Inspektorat I'],
            [10204, 'Biro Sumber Daya Manusia'],
            [10205, 'Biro Umum'],
            [10306, 'Direktorat Registrasi Obat'],
            [10308, 'Direktorat Pengawasan Distribusi dan Pelayanan Obat'],
            [10301, 'Direktorat Standardisasi Obat'],
            [10401, 'Direktorat Standardisasi Obat Tradisional'],
            [10402, 'Direktorat Registrasi Obat Tradisional'],
            [10404, 'Direktorat Pengawasan Kosmetik'],
            [10403, 'Direktorat Pengawasan Obat Tradisional dan Suplemen Keseheatan'],
            [10501, 'Direktorat Standardisasi Pangan Olahan'],
            [10504, 'Direkotrat Pengawasan Peredaran Pangan Olahan'],
            [10505, 'Direktorat Pemberdayaan Masyarakat dan Pelaku Usaha Pangan Olahan'],
            // [10607, 'Balai Pengujian Produk Biologi'],
            // [10608, 'Balai Kalibrasi'],
            // [10609, 'Balai Pengujian Khusus Obat dan Makanan'],
            [11001, 'Direktorat Cegah Tangkal'],
            [10201, 'Biro Perencanaan dan Keuangan'],
            [10307, 'Direktorat Pengawasan Produksi Obat'],
            [10502, 'Direktorat Registrasi Pangan Olahan'],
            [11002, 'Direktorat Intelijen Obat dan Makanan'],
            [11003, 'Direktorat Penyidikan Obat dan Makanan']
        ];

        $units = [];
        foreach ($data as $item) {
            $units[] = [
                'id_unit' => $item[0],
                'nama_unit' => $item[1],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('unitkerja')->insert($units);
    }
}
