<?php
namespace App\Imports;

use App\Models\Flat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FlatsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Validate and clean up data if needed, then insert into DB
        if (!is_numeric($row['floor']) || !is_numeric($row['area'])) {
            return null; // Skip rows with invalid data
        }

        return new Flat([
            'block' => $row['block'], // Use the correct heading names as per your Excel file
            'floor' => (int)$row['floor'], // Convert floor to an integer
            'flat_number' => $row['flat_number'], // Ensure flat_number is correctly mapped
            'flat_type' => $row['flat_type'],
            'area' => (float)$row['area'], // Convert area to a float if needed
            'status' => $row['status'],
        ]);
    }
}
