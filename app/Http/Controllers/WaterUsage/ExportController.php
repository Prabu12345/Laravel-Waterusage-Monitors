<?php

namespace App\Http\Controllers\WaterUsage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdf()
    {
        // Get only the authenticated user's water usage data
        $user = Auth::user();
        $data = \App\Models\WaterUsage::where('user_id', $user->id)->get();

        $pdf = Pdf::loadView('waterUsage.pdf', ['data' => $data]);
        $date = now()->format('Y-m-d');
        return $pdf->download("water_usage_report_{$date}.pdf");
    }

    public function excel()
    {
        $user = Auth::user();
        $data = \App\Models\WaterUsage::where('user_id', $user->id)->get();

        // Create new Spreadsheet
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add logo image on top (row 1)
        $logoPath = public_path('image/logo.png'); // Ensure logo.png exists in public/
        if (file_exists($logoPath)) {
            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setName('Logo');
            $drawing->setPath($logoPath);
            $drawing->setHeight(60);
            $drawing->setCoordinates('A1');
            $drawing->setWorksheet($sheet);
            // Merge cells for logo area
            $sheet->mergeCells("A1:D2");
        }

        // Report Title (row 3)
        $sheet->setCellValue("A3", 'Laporan Penggunaan Air');
        $sheet->mergeCells("A3:D3");
        $sheet->getStyle("A3")->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 18,
                'color' => ['rgb' => '222B45'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Date (row 4)
        $sheet->setCellValue("A4", 'Tanggal Laporan: ' . now()->format('Y-m-d'));
        $sheet->mergeCells("A4:D4");
        $sheet->getStyle("A4")->applyFromArray([
            'font' => [
                'italic' => true,
                'size' => 12,
                'color' => ['rgb' => '2563eb'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Header (row 6)
        $headerRow = 6;
        $headers = ['No', 'Meter Usage', 'Start Date', 'End Date'];
        foreach (range('A', 'D') as $col => $column) {
            $sheet->setCellValue("{$column}{$headerRow}", $headers[$col]);
        }
        $sheet->getStyle("A{$headerRow}:D{$headerRow}")->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '2563eb'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            // No borders for invisible grid
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE,
                ],
            ],
        ]);

        // Data rows
        $row = $headerRow + 1;
        $no = 1;
        foreach ($data as $item) {
            $sheet->setCellValue("A{$row}", $no);
            $sheet->setCellValue("B{$row}", $item->meter_usage);
            $sheet->setCellValue("C{$row}", $item->start_date);
            $sheet->setCellValue("D{$row}", $item->end_date);

            // Alternating row color
            if ($row % 2 == 0) {
                $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'f1f5f9'],
                    ],
                ]);
            }

            // Center align all data
            $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                // No borders for invisible grid
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE,
                    ],
                ],
            ]);

            $row++;
            $no++;
        }

        // Center align all text in the sheet
        $sheet->getStyle("A1:D{$row}")->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Remove gridlines (only visual, not borders)
        $sheet->setShowGridlines(false);

        // Auto size columns
        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $date = now()->format('Y-m-d');
        $fileName = "water_usage_report_{$date}.xlsx";

        // Output to browser
        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $writer->save('php://output');
        }, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}
