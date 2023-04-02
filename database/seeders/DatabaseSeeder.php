<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Claass;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Claass
        Claass::create([
            "major" => "IPA",
            "class_level" => "10",
            "class_name" => "10 IPA 1",
        ]);
        Claass::create([
            "major" => "IPA",
            "class_level" => "10",
            "class_name" => "10 IPA 2",
        ]);
        Claass::create([
            "major" => "IPS",
            "class_level" => "10",
            "class_name" => "10 IPS",
        ]);
        Claass::create([
            "major" => "IPA",
            "class_level" => "11",
            "class_name" => "11 IPA",
        ]);
        Claass::create([
            "major" => "IPS",
            "class_level" => "11",
            "class_name" => "11 IPS",
        ]);
        Claass::create([
            "major" => "IPA",
            "class_level" => "12",
            "class_name" => "12 IPA",
        ]);
        Claass::create([
            "major" => "IPS",
            "class_level" => "12",
            "class_name" => "12 IPS",
        ]);

        // User & Teacher
        User::create([
            "username" => "admin",
            "password" => bcrypt("password"),
            "name" => "Administrator",
            "email" => "admin@gmail.com",
            "level" => "1",
        ]);
        User::create([
            "username" => "0101",
            "password" => bcrypt("password"),
            "name" => "Fahrul",
            "email" => "fahrul@gmail.com",
        ]);
        User::create([
            "username" => "0202",
            "password" => bcrypt("password"),
            "name" => "Rahman",
            "email" => "rahman@gmail.com",
        ]);

        Teacher::create([
            "user_id" => "2",
            "phone" => "081123456789",
            "gender" => "Laki-laki",
        ]);

        Teacher::create([
            "user_id" => "3",
            "phone" => "09213123231",
            "gender" => "Laki-laki",
        ]);


        // Semester
        Semester::create([
            "start_year" => "2020",
            "end_year" => "2021",
            "odd_even" => "1"
        ]);
        Semester::create([
            "start_year" => "2020",
            "end_year" => "2021",
            "odd_even" => "2"
        ]);


        // Student
        Student::create([
            "claass_id" => "1",
            "name" => "Agung Umar",
            "nis" => "001",
            "gender" => "Laki-laki",
            "parent_phone" => "0812313123",
        ]);
        Student::create([
            "claass_id" => "1",
            "name" => "Wahyuni Umar",
            "nis" => "002",
            "gender" => "Perempuan",
            "parent_phone" => "0812313123",
        ]);
        Student::create([
            "claass_id" => "2",
            "name" => "Andi Ahmad",
            "nis" => "003",
            "gender" => "Laki-laki",
            "parent_phone" => "0812313123",
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
