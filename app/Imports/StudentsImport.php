<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Normalize and trim Qalam ID (unique key)
        $qalamId = isset($row['qalam_id']) ? trim($row['qalam_id']) : null;

        // Skip if Qalam ID is missing or invalid
        if (empty($qalamId) || !is_numeric($qalamId)) {
            return null;
        }

        // Unique key for updateOrCreate
        $uniqueKey = ['qalam_id' => $qalamId];

        // Prepare attributes with fallback defaults where necessary
        $attributes = [
            'student_name'               => $row['student_name'] ?? null,
            'father_name'                => $row['father_name'] ?? null,
            'institutions'               => $row['institutions'] ?? null,
            'discipline'                 => $row['discipline'] ?? null,
            'contact_no'                 => $row['contact_no'] ?? null,
            'home_address'               => $row['home_address'] ?? null,
            'scholarship_name'           => $row['scholarship_name'] ?? null,
            'nust_trust_fund_donor_name' => $row['nust_trust_fund_donor_name'] ?? null,
            'province'                   => $row['province'] ?? null,
            'domicile'                   => $row['domicile'] ?? null,
            'gender'                     => $row['gender'] ?? null,
            'program'                    => $row['program'] ?? null,
            'degree'                     => $row['degree'] ?? null,
            'year_of_admission'          => $row['year_of_admission'] ?? null,
            'father_status'              => $row['father_status'] ?? null,
            'father_profession'          => $row['father_profession'] ?? null,
            'monthly_income'             => $row['monthly_income'] ?? 0,
            'statement_of_purpose'       => $row['statement_of_purpose'] ?? null,
            'remarks'                    => $row['remarks'] ?? null,

            // Boolean / tinyint columns with default 0 to avoid NOT NULL errors
            'make_pledge'                => $row['make_pledge'] ?? 0,
            'payment_approved'           => $row['payment_approved'] ?? 0,
            'hostel_status'              => $row['hostel_status'] ?? 0,

            'images'                    => $row['images'] ?? null,
        ];

        // Update existing record or create a new one
        return Student::updateOrCreate($uniqueKey, $attributes);
    }
}
