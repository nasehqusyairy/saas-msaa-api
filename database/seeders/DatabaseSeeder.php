<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\Presence;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // students
        Student::factory()->create([
            'nim' => '210605110066',
        ]);
        Student::factory()->create([
            'nim' => '210605110067',
        ]);
        Student::factory()->create([
            'nim' => '210605110068',
        ]);
        Student::factory(13)->create();

        // activities
        Activity::create([
            'name' => 'Jamaah Sholat Subuh',
            'date' => '02/01/2023',
            'time' => '04:00',
        ]);
        Activity::create([
            'name' => 'Shobahul Quran',
            'date' => '02/01/2023',
            'time' => '05:00',
        ]);
        Activity::create([
            'name' => 'Jamaah Sholat Maghrib',
            'date' => '02/01/2023',
            'time' => '18:00',
        ]);
        Activity::create([
            'name' => 'Jamaah Sholat Isya',
            'date' => '02/01/2023',
            'time' => '19:00',
        ]);
        Activity::create([
            'name' => 'Taklim Afkar',
            'date' => '02/01/2023',
            'time' => '19:30',
        ]);
        Activity::create([
            'name' => 'Jamaah Sholat Subuh',
            'date' => '03/01/2023',
            'time' => '04:00',
        ]);
        Activity::create([
            'name' => 'Shobahul Quran',
            'date' => '03/01/2023',
            'time' => '05:00',
        ]);
        Activity::create([
            'name' => 'Jamaah Sholat Maghrib',
            'date' => '03/01/2023',
            'time' => '18:00',
        ]);
        Activity::create([
            'name' => 'Jamaah Sholat Isya',
            'date' => '03/01/2023',
            'time' => '19:00',
        ]);
        Activity::create([
            'name' => 'Taklim Quran',
            'date' => '03/01/2023',
            'time' => '19:30',
        ]);

        // presences
        Presence::create([
            'student_id' => 1,
            'activity_id' => 1,
            'status' => 'H',
        ]);
        Presence::create([
            'student_id' => 2,
            'activity_id' => 1,
            'status' => 'I',
        ]);
        Presence::create([
            'student_id' => 3,
            'activity_id' => 1,
            'status' => 'S',
        ]);
        Presence::create([
            'student_id' => 4,
            'activity_id' => 1,
            'status' => 'A',
        ]);
        Presence::create([
            'student_id' => 1,
            'activity_id' => 6,
            'status' => 'H',
        ]);
        Presence::create([
            'student_id' => 2,
            'activity_id' => 6,
            'status' => 'I',
        ]);
        Presence::create([
            'student_id' => 3,
            'activity_id' => 6,
            'status' => 'S',
        ]);
        Presence::create([
            'student_id' => 4,
            'activity_id' => 6,
            'status' => 'A',
        ]);
    }
}
