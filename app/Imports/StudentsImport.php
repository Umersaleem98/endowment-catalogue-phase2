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
        // Skip the header row
        if ($row[0] === 'qalam_id' || $row[0] === 'Qalam ID') {
            return null;
        }

        return new Student([
            'qalam_id'                     => $row[0],
            'student_name'                  => $row[1],
            'father_name'                   => $row[2],
            'institutions'                  => $row[3],
            'discipline'                    => $row[4],
            'contact_no'                    => $row[5],
            'home_address'                  => $row[6],
            'scholarship_name'              => $row[7],
            'nust_trust_fund_donor_name'    => $row[8],
            'province'                      => $row[9],
            'domicile'                      => $row[10],
            'gender'                        => $row[11],
            'program'                       => $row[12],
            'degree'                        => $row[13],
            'year_of_admission'             => $row[14],
            'father_status'                 => $row[15],
            'father_profession'             => $row[16],
            'monthly_income'                => $row[17],
            'statement_of_purpose'          => $row[18],
            'remarks'                       => $row[19],
            'make_pledge'                   => $row[20],
            'payment_approved'              => $row[21],
            'hostel_status'                 => $row[22],
            'images'                        => $row[23],
        ]);
    }
}
