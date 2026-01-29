<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'College of Agriculture'],
            ['name' => 'College of Education'],
            ['name' => 'College of Engineering'],
            ['name' => 'College of Arts and Sciences'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
