<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Mandiri;
use App\Models\Wawancara;
use App\Models\Posting;

class GrafikPOMChart extends LarapexChart
{
    public function build()
    {
        // Menghitung jumlah entri dengan status "Lolos seleksi Magang" dari masing-masing tabel
        $mandiriCount = Mandiri::where('status', 'Peserta Magang Aktif', 'Peserta selesai magang')->count();
        // $wawancaraCount = Wawancara::where('status', 'Peserta Penelitian Aktif')->count();
        $postingCount = Posting::where('status', 'Peserta Magang Aktif', 'Peserta selesai magang')->count();

        // Membuat grafik line dengan data yang dihitung
        return $this->lineChart()
            ->setTitle('Grafik Penerimaan Magang')
            ->setSubtitle('PPSDM POM')
            ->addData('Mandiri', [0, $mandiriCount])
            // ->addData('Wawancara', [$wawancaraCount])
            ->addData('Posting', [0, $postingCount])
            ->setXAxis(['Mandiri', 'Posting'])
            ->setGrid(true)
            ->setMarkers(['#0000ff', '#00ff00' ]); // Hijau untuk Mandiri dan Biru untuk Posting
    }
}
