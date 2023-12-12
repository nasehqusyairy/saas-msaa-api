<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\Presence;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class PresenceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_can_get_all_presences()
    {
        $presences = Presence::factory()->count(3)->create();

        $response = $this->getJson('/api/presences');

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(3, 'data');
    }

    public function test_can_get_presences_by_activity()
    {
        $activity = Activity::factory()->create();
        $presences = Presence::factory()->count(3)->create([
            'activity_id' => $activity->id,
        ]);

        $response = $this->getJson("/api/presences/activity/{$activity->id}");

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(3, 'data');
    }

    public function test_can_create_presence()
    {
        $student = Student::factory()->create();
        $activity = Activity::factory()->create();
        $data = [
            'student_id' => $student->id,
            'activity_id' => $activity->id,
            'status' => 'H',
        ];

        $response = $this->postJson('/api/presences', $data);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment($data);
    }

    public function test_can_update_presence()
    {
        $presence = Presence::factory()->create();
        $data = [
            'status' => 'A',
        ];

        $response = $this->putJson("/api/presences/{$presence->id}", $data);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment($data);
    }

    public function test_can_delete_presence()
    {
        $presence = Presence::factory()->create();

        $response = $this->deleteJson("/api/presences/{$presence->id}");

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
