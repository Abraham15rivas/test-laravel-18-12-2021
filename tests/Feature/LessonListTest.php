<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LessonListTest extends TestCase
{
    /** @test */
    public function getLessonList()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/admin/list/lessons');
        $response->assertJson([]);

        $this->post('/logout');
    }
}
