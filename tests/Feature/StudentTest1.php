<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    public function testIndex()
    {
        Student::factory(5)->create();

        $response = $this->get('/api/students');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'students');
    }

    public function testStore()
    {
        $data = [
            'name' => 'John Doe',
            'nim' => 12345,
            'room' => 101,
            'img' => 'https://example.com/image.jpg',
        ];

        $response = $this->post('/api/students', $data);

        $response->assertStatus(201)
            ->assertJson(['message' => 'Student created']);
    }

    public function testUpdate()
    {

        $student = Student::factory()->create();

        $data = [
            'name' => 'Updated Name',
            'nim' => 54321,
            'room' => 102,
            'img' => 'https://example.com/updated.jpg',
        ];

        $response = $this->put("/api/students/{$student->id}", $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Student updated']);
    }

    public function testDestroy()
    {
        $student = Student::factory()->create();

        $response = $this->delete("/api/students/{$student->id}");

        $response->assertStatus(204);
    }
}
