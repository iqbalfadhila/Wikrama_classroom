<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Teacher;

class TeacherExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::all();
    }
}
