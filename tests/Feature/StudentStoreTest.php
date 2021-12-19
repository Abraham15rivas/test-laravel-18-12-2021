<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentStoreTest extends TestCase
{
    /** @test */
    public function associateSubjectsToStudent()
    {
        $user = User::factory()->create();

        $data = [
            'studentId' => 1,
            'lessonIds' => [1,2]
        ];

        $response = $this->actingAs($user)->post('/admin/student/store', $data);
        $response->assertJson([
            'status' => true,
            'message' => 'Signed in successfully'
        ]);

        $this->post('/logout');
    }
}
