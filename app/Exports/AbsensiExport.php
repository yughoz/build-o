<?php

namespace App\Exports;

use App\Models\Absesni\Absensi;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AbsensiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    protected $request;
    public function __construct($request) {
        $this->request = $request;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pegawai_id = $this->request->query('pegawai_id');
        $tanggal_mulai = $this->request->query('tanggal_mulai');
        $tanggal_akhir = $this->request->query('tanggal_akhir');
        $data = Absensi::with('pegawai', 'koordinator.pegawai');
        if (!empty($pegawai_id)) {
            $data->where('pegawai_id', $pegawai_id);
        }

        if (!empty($tanggal_mulai) && !empty($tanggal_akhir)) {
            $data->whereDate('created_at', '>=', Carbon::parse($tanggal_mulai)->toDateString());
            $data->whereDate('created_at', '<=', Carbon::parse($tanggal_akhir)->toDateString());
        }
        
        return $data->get();
    }

    public function headings(): array
    {
        return [
            "NIP",
            "Nama",
            "Waktu Mulai Kerja",
            "Waktu Akhir Kerja",
            "Status Masuk",
            "Rencana Aktifitas Kerja",
            "Laporan Kegiatan",
            "Alasan Tidak Masuk",
            "Koordinator NIP",
            "Koordinator Nama"
        ];
    }

    public function map($absensi): array
    {
        return [
            $absensi->pegawai->nip,
            $absensi->pegawai->nama,
            $absensi->waktu_mulai_kerja ?? "-",
            $absensi->waktu_akhir_kerja ?? "-",
            $absensi->masuk == 1 ? "Masuk" : "Tidak Masuk",
            trim($absensi->aktifitas),
            trim($absensi->kegiatan),
            $absensi->alasan_tidak_masuk ?? "-",
            $absensi->koordinator->pegawai->nip ?? "-",
            $absensi->koordinator->pegawai->nama ?? "-",
         ]; 
     }
}
