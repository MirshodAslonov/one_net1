<?php

namespace App\Exports;

use App\Models\Branch\Branch;
use App\Models\Organ\Organ;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment; // Add this line for alignment


class ClientsExport implements FromCollection, WithHeadings, WithColumnWidths, WithStyles
{
    protected $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    public function collection()
    {
        return $this->list->map(function ($client) {
            return [
                'branch_id' => Branch::query()->where('id', $client->branch_id)->first()->name,
                'organ_id' => Organ::query()->where('id', $client->organ_id)->first()->name,
                'name_organ' => $client->name_organ,
                'mgmt_ip' => $client->mgmt_ip,
                'ip' => $client->ip,
                'vlan' => $client->vlan,
                'vlan_ip' => $client->vlan_ip,
                'zayafka' => $client->zayafka,
                'stp_zayafka' => $client->stp_zayafka,
                'atc' => $client->atc,
                'port' => $client->port,
                'speed' => $client->speed,
                'client_name' => $client->client_name,
                'client_number' => $client->client_number,
                'date_connect' => $client->date_connect,
                'location' => $client->location,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Branch',
            'Organ',
            'Host Name',
            'Mgmt IP',
            'IP Address',
            'VLAN',
            'VLAN IP',
            'Zayafka',
            'STP Zayafka',
            'ATC',
            'Port',
            'Speed',
            'Client Name',
            'Client Number',
            'Date Connect',
            'Location',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,  // Branch ID
            'B' => 20,  // Organ ID
            'C' => 40,  // Organization Name
            'D' => 20,  // Mgmt IP
            'E' => 20,  // IP Address
            'F' => 15,  // VLAN
            'G' => 20,  // VLAN IP
            'H' => 20,  // Zayafka
            'I' => 20,  // STP Zayafka
            'J' => 15,  // ATC
            'K' => 45,  // Port
            'L' => 10,  // Speed
            'M' => 20,  // Client Name
            'N' => 15,  // Client Number
            'O' => 15,  // Date Connect
            'P' => 45,  // Location
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Set bold font for header
        $sheet->getStyle('A1:P1')->getFont()->setBold(true);

        // Set row height for the header row
        $sheet->getRowDimension(1)->setRowHeight(30); // Set height for the header row (row 1)

        // Set row height for all rows starting from row 2
        $rowIndex = 2;
        foreach ($sheet->getRowIterator() as $row) {
            // Set height for each row after the header (starting from row 2)
            $sheet->getRowDimension($rowIndex)->setRowHeight(30); // Adjust this value as needed
            $rowIndex++;
        }

        // Set font, horizontal alignment, and vertical alignment for all rows
        $sheet->getStyle('A1:P' . $sheet->getHighestRow())
            ->getFont();


        return [
            'A1:P1' => [
                'font' => ['bold' => true],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_TOP, // You can change this to VERTICAL_BOTTOM if you want bottom alignment
                ],
            ],
        ];
    }


}
