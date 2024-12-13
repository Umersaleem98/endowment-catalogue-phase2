<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'qalam_id' => $row[0], // First column in Excel file for qalam_id
            'student_name' => $row[1], // Second column for student_name
            'father_name' => $row[2], // Third column for father_name
            'institutions' => $row[3], // Fourth column for institutions
            'discipline' => $row[4], // Fifth column for discipline
            'contact_no' => $row[5], // Sixth column for contact_no
            'home_address' => $row[6], // Seventh column for home_address
            'scholarship_name' => $row[7], // Eighth column for scholarship_name
            'nust_trust_fund_donor_name' => $row[8], // Ninth column for donor_name
            'province' => $row[9], // Tenth column for province
            'domicile' => $row[10], // Eleventh column for domicile
            'gender' => $row[11], // Twelfth column for gender
            'program' => $row[12], // Thirteenth column for program
            'degree' => $row[13], // Fourteenth column for degree
            'year_of_admission' => $row[14], // Fifteenth column for year_of_admission
            'father_status' => $row[15], // Sixteenth column for father_status
            'father_profession' => $row[16], // Seventeenth column for father_profession
            'father_profession_category' => $row[17], // Eighteenth column for father_profession_category
            'organization' => $row[18], // Nineteenth column for organization
            'category' => $row[19], // Twentieth column for category
            'monthly_income' => $row[20], // Twenty-first column for monthly_income
            'statement_of_purpose' => $row[21], // Twenty-second column for statement_of_purpose
            'remarks' => $row[22], // Twenty-third column for remarks
        ]);
    }
}
