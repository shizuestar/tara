<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportsExport implements FromArray, WithHeadings, WithStyles
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        $rows = [
            ['Statistik', 'Jumlah'],
            ['Total Komunitas', $this->data['totalCommunities']],
            ['Total Proyek', $this->data['totalProjects']],
            ['Total Karya', $this->data['totalArtworks']],
            ['Total Event', $this->data['totalEvents']],
            ['Total Pengguna Aktif', $this->data['totalActiveUsers']],
            ['Total Suka', $this->data['totalLikes']],
            ['Total Komentar', $this->data['totalComments']],
            [], // Baris kosong
            ['Laporan Aktivitas'],
            ['ID', 'Pengguna', 'Deskripsi', 'Subjek', 'Tanggal'],
        ];

        foreach ($this->data['activities'] as $activity) {
            $rows[] = [
                $activity['id'],
                $activity['user'],
                $activity['description'],
                $activity['subject'],
                $activity['date'],
            ];
        }

        return $rows;
    }

    public function headings(): array
    {
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'fill' => ['fillType' => 'solid', 'color' => ['argb' => 'FFFFD700']]],
            10 => ['font' => ['bold' => true], 'fill' => ['fillType' => 'solid', 'color' => ['argb' => 'FFFFD700']]],
            11 => ['font' => ['bold' => true], 'fill' => ['fillType' => 'solid', 'color' => ['argb' => 'FFE0E0E0']]],
        ];
    }
}