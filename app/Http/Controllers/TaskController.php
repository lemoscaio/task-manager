<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{

  public function index(Request $request)
  {
    $sort = $request->query('sort', 'id');
    $direction = $request->query('direction', 'desc');
    $status = $request->query('status');

    $tasks = Task::query()->when($status, function ($query) use ($status) {
      $query->where('status', $status);
    })->orderBy($sort, $direction)->get();

    return response()->json($tasks);
  }

  public function show(Task $task)
  {
    return response()->json($task);
  }

  public function store(StoreTaskRequest $request)
  {
    $data = $request->validated();

    $task = Task::create($data);
    return response()->json($task, 201, ['Location' => route('tasks.show', $task->id)]);
  }

  public function update(UpdateTaskRequest $request, Task $task)
  {
    $data = $request->validated();

    $task->update($data);
    return response()->json($task);
  }

  public function destroy(Task $task)
  {
    $task->delete();
    return response()->json(null, 204);
  }
}
