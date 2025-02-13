<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select([
            'qalam_id', 'student_name', 'father_name', 'institutions', 'discipline', 
            'contact_no', 'home_address', 'scholarship_name', 'nust_trust_fund_donor_name', 
            'province', 'domicile', 'gender', 'program', 'degree', 'year_of_admission', 
            'father_status', 'father_profession', 'monthly_income', 'statement_of_purpose', 
            'remarks', 'make_pledge', 'payment_approved', 'images'
        ])->get();
    }

    public function headings(): array
    {
        return [
            'Qalam ID', 'Student Name', 'Father Name', 'Institutions', 'Discipline',
            'Contact No', 'Home Address', 'Scholarship Name', 'NUST Trust Fund Donor Name',
            'Province', 'Domicile', 'Gender', 'Program', 'Degree', 'Year of Admission',
            'Father Status', 'Father Profession', 'Monthly Income', 'Statement of Purpose',
            'Remarks', 'Make Pledge', 'Payment Approved', 'Images'
        ];
    }
}
