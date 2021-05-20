<?php

namespace App\Exports;

use App\Models\Absesni\Laporan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KegiatanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        $data = Laporan::with('pegawai');
        if (!empty($pegawai_id)) {
            $data->where('pegawai_id', $pegawai_id);
        }

        if (!empty($tanggal_mulai) && !empty($tanggal_akhir)) {
            $data->whereDate('tanggal', '>=', Carbon::parse($tanggal_mulai)->toDateString());
            $data->whereDate('tanggal', '<=', Carbon::parse($tanggal_akhir)->toDateString());
        }
        
        return $data->get();
    }

    public function headings(): array
    {
        return [
            "NIP",
            "Nama",
            "Tanggal Pengumpulan File",
            "Jumlah Hari Pengumpulan File Selanjutnya",
        ];
    }

    public function map($laporan): array
    {
        return [
            $laporan->pegawai->nip,
            $laporan->pegawai->nama,
            $laporan->tanggal,
            $laporan->maximum_hari_pengumpulan . " Hari",
         ]; 
     }
}
