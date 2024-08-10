<?php

namespace App\Http\Controllers;

use App\Models\TaskManager;
use App\Http\Requests\TaskManagerStoreRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\TaskManagerUpdateRequest;

class TaskManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        //
        $tasks = TaskManager::query()
            ->select('id', 'title', 'description', 'is_completed')
            ->get();

        return $this->apiResponse('Tasks retrieved successfully', Response::HTTP_OK, $tasks->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskManagerStoreRequest $request)
    {
        //
        TaskManager::create($request->validated());
        return $this->apiResponse('Task created successfully', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  TaskManager  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(TaskManager $task): \Illuminate\Http\JsonResponse
    {
        $taskData = $task->only('id', 'title', 'description', 'is_completed');
        return $this->apiResponse('Tasks retrieved successfully', Response::HTTP_OK, $taskData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TaskManagerUpdateRequest  $request
     * @param  TaskManager  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TaskManagerUpdateRequest $request, TaskManager $task): \Illuminate\Http\JsonResponse
    {
        //
        $task->update($request->validated());
        return $this->apiResponse('Task updated successfully', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskManager  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(TaskManager $task): \Illuminate\Http\JsonResponse
    {
        //
        $task->delete();
        return $this->apiResponse('Task deleted successfully', Response::HTTP_OK);
    }
}
