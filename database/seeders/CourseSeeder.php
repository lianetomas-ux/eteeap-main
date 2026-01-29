<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Department;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            // College of Agriculture
            ['department_name' => 'College of Agriculture', 'course_code' => 'BSA-AE', 'course_name' => 'BS in Agriculture - Agricultural Economics'],
            ['department_name' => 'College of Agriculture', 'course_code' => 'BSA-AX', 'course_name' => 'BS in Agriculture - Agricultural Extension'],
            ['department_name' => 'College of Agriculture', 'course_code' => 'BSA-AS', 'course_name' => 'BS in Agriculture - Animal Science'],
            ['department_name' => 'College of Agriculture', 'course_code' => 'BSA-CP', 'course_name' => 'BS in Agriculture - Crop Protection'],
            ['department_name' => 'College of Agriculture', 'course_code' => 'BSA-CS', 'course_name' => 'BS in Agriculture - Crop Science'],
            ['department_name' => 'College of Agriculture', 'course_code' => 'BSA-SS', 'course_name' => 'BS in Agriculture - Soil Science'],
            ['department_name' => 'College of Agriculture', 'course_code' => 'BSAB', 'course_name' => 'BS in Agri-Business'],
            ['department_name' => 'College of Agriculture', 'course_code' => 'BTLED', 'course_name' => 'Bachelor of Technology and Livelihood Education'],
            ['department_name' => 'College of Agriculture', 'course_code' => 'BPED', 'course_name' => 'Bachelor of Physical Education'],
            ['department_name' => 'College of Agriculture', 'course_code' => 'BSF', 'course_name' => 'BS in Fisheries'],

            // College of Education
            ['department_name' => 'College of Education', 'course_code' => 'BSED-EN', 'course_name' => 'Bachelor of Secondary Education - English'],
            ['department_name' => 'College of Education', 'course_code' => 'BSED-MA', 'course_name' => 'Bachelor of Secondary Education - Mathematics'],
            ['department_name' => 'College of Education', 'course_code' => 'BSED-SC', 'course_name' => 'Bachelor of Secondary Education - Science'],
            ['department_name' => 'College of Education', 'course_code' => 'BSED-FI', 'course_name' => 'Bachelor of Secondary Education - Filipino'],
            ['department_name' => 'College of Education', 'course_code' => 'BSED-VE', 'course_name' => 'Bachelor of Secondary Education - Values Education'],
            ['department_name' => 'College of Education', 'course_code' => 'BSED-SS', 'course_name' => 'Bachelor of Secondary Education - Social Science'],
            ['department_name' => 'College of Education', 'course_code' => 'BEED', 'course_name' => 'Bachelor of Elementary Education'],
            ['department_name' => 'College of Education', 'course_code' => 'BECED', 'course_name' => 'Bachelor of Early Childhood Education'],

            // College of Engineering
            ['department_name' => 'College of Engineering', 'course_code' => 'BSCE', 'course_name' => 'BS in Civil Engineering'],
            ['department_name' => 'College of Engineering', 'course_code' => 'BSABE', 'course_name' => 'BS in Agricultural and Biosystems Engineering'],
        ];

        foreach ($courses as $courseData) {
            $department = Department::where('name', $courseData['department_name'])->first();
            if ($department) {
                Course::create([
                    'department_id' => $department->id,
                    'course_code' => $courseData['course_code'],
                    'course_name' => $courseData['course_name'],
                ]);
            }
        }
    }
}
