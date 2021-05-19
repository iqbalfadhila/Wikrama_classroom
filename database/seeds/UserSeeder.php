<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.id',
            'password' => '12345678',
        ]);

        $admin->assignRole('admin');

        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@teacher.id',
            'password' => '12345678',
        ]);

        $teacher->assignRole('teacher');

        $student = User::create([
            'name' => 'Student',
            'email' => 'student@student.id',
            'password' => '12345678',
        ]);

        $student->assignRole('student');
    }
}