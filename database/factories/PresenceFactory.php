<?php

namespace Database\Factories;

use App\Models\Presence;
use App\Models\Student;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresenceFactory extends Factory
{
    protected $model = Presence::class;

    public function definition()
    {
        $statuses = ['H', 'A', 'S'];

        return [
            'student_id' => Student::factory(),
            'activity_id' => Activity::factory(),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
