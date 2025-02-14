<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách tất cả ClassroomID có trong bảng classrooms
        $classroomIDs = DB::table('classrooms')->pluck('ClassroomID')->toArray(); 

        // Kiểm tra nếu không có lớp học nào thì không chèn dữ liệu
        if (empty($classroomIDs)) {
            return;
        }

        for ($i = 0; $i < 50; $i++) {
            DB::table('students')->insert([
                'StudentName' => $faker->name,
                'StudentEmail' => $faker->unique()->safeEmail,
                'StudentGender' => $faker->randomElement([0, 1]),
                'ClassroomID' => $faker->randomElement($classroomIDs), // Lấy ID hợp lệ từ bảng classrooms
            ]);
        }
    }
}