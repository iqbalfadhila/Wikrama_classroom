<?php

namespace App\Imports;

use App\Teacher;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class TeacherImport implements ToModel
{
    private $role;

    public function __construct($role)
    {
        $this->role = $role;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $rows)
    {
        foreach ($rows as $row) {
            $user = User::create([
                'email' => $row[0],
                'password' => '12345678',
            ]);
            $user->assignRole($this->role);
        }
        $teacher = Teacher::create([
            'user_id' => $user->id,
            'nip' => $row[1],
            'name' => $row[2],
            'lesson' => $row[3],
            'religion' => $row[4],
            'gender' => $row[5],
        ]);

        $user->update(['pemilik_id' => $teacher->id]);
    }
}
