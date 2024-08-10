<?php

namespace Tests\Feature;

use App\Models\TaskManager;
use Tests\TestCase;
use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskManagerApiTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticate()
    {

        return Passport::actingAs(
            User::factory()->create()
        );
    }

    /** @test */
    public function user_can_create_a_task()
    {
        $token = $this->authenticate();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/v1/tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'is_completed' => false,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'statusCode' => 201,
                'message' => "Task created successfully",
                'data' => [],
            ]);
    }

    /** @test */
    public function user_can_get_fetch_all_tasks()
    {
        $token = $this->authenticate();

        // Create sample tasks
        TaskManager::factory(5)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/v1/tasks');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data');
    }

    /** @test */
    public function user_can_fetch_a_specific_task()
    {
        $token = $this->authenticate();

        $task = TaskManager::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson("/api/v1/tasks/{$task->id}");


        $response->assertStatus(200)
            ->assertJsonFragment([
                'statusCode' => 200,
                'message' => "Tasks retrieved successfully",
            ]);
    }

    /** @test */
    public function user_can_update_a_task()
    {
        $token = $this->authenticate();

        $task = TaskManager::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/v1/tasks/{$task->id}", [
            'title' => 'Updated Task',
            'description' => 'Updated Description',
            'is_completed' => true,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'statusCode' => 200,
                'message' => "Task updated successfully",
                'data' => []
            ]);
    }

    /** @test */
    public function user_can_delete_a_task()
    {
        $token = $this->authenticate();

        $task = TaskManager::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/v1/tasks/{$task->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('task_managers', ['id' => $task->id]);
    }

}
