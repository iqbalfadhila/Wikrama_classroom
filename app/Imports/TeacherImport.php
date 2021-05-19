<?php

namespace App\Imports;

use App\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;

class TeacherImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teacher([
            'nip' => $row[1],
            'name' => $row[2],
            'email' => $row[3],
            'password' => $row[4],
            'lesson' => $row[5],
            'religion' => $row[6],
            'gender' => $row[7],
        ]);
    }
}
