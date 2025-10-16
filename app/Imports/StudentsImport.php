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
        // 1. Normalize Keys: Convert keys to snake_case if your headings 
        // don't perfectly match your database columns.
        // Maatwebsite usually handles this, but it's good practice.
        // For simplicity, we assume your Excel headers match your DB columns.
        
        $qalamId = trim($row['qalam_id']);

        // 2. Skip rows with missing or invalid Qalam IDs (the unique identifier)
        if (empty($qalamId) || !is_numeric($qalamId)) {
            return null;
        }

        // 3. Define the key used to check for existing records (Unique Key)
        $uniqueKey = [
            'qalam_id' => $qalamId,
        ];

        // 4. Define the attributes to update or create.
        // Use the null coalescing operator (??) to provide default values 
        // for required DB fields (NOT NULL) if the Excel cell is blank.
        $attributes = [
            'student_name'                  => $row['student_name'] ?? null,
            'father_name'                   => $row['father_name'] ?? null,
            'institutions'                  => $row['institutions'] ?? null,
            'discipline'                    => $row['discipline'] ?? null,
            'contact_no'                    => $row['contact_no'] ?? null,
            'home_address'                  => $row['home_address'] ?? null,
            'scholarship_name'              => $row['scholarship_name'] ?? null,
            'nust_trust_fund_donor_name'    => $row['nust_trust_fund_donor_name'] ?? null,
            'province'                      => $row['province'] ?? null,
            'domicile'                      => $row['domicile'] ?? null,
            'gender'                        => $row['gender'] ?? null,
            'program'                       => $row['program'] ?? null,
            'degree'                        => $row['degree'] ?? null,
            'year_of_admission'             => $row['year_of_admission'] ?? null,
            'father_status'                 => $row['father_status'] ?? null,
            'father_profession'             => $row['father_profession'] ?? null,
            'monthly_income'                => $row['monthly_income'] ?? 0, // Default to 0 if required
            'statement_of_purpose'          => $row['statement_of_purpose'] ?? null,
            'remarks'                       => $row['remarks'] ?? null,

            // Critical Fix for 'NOT NULL' errors (1048): Provide a default (e.g., 0 or 1)
            'make_pledge'                   => $row['make_pledge'] ?? 0, 
            'payment_approved'              => $row['payment_approved'] ?? 0, 
            'hostel_status'                 => $row['hostel_status'] ?? 0,
            
            'images'                        => $row['images'] ?? null,
        ];

        // 5. Use updateOrCreate to prevent Duplicate Entry errors and handle NOT NULL errors
        return Student::updateOrCreate($uniqueKey, $attributes);
    }
}