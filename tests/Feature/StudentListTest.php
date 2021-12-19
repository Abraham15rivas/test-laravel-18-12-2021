<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentListTest extends TestCase
{
    /** @test */
    public function getStudentList()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/admin/list/students');
        $response->assertJson([]);

        $this->post('/logout');
    }
}
