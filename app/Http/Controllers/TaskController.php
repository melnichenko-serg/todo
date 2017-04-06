<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Auth;
use Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->get();
        return response()->json($tasks);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //validate new task data
        $validator = $this->validator($request->all());

        if ($validator->invalid()) {
            return response()->json(["error" => $validator->errors()], 422);
        }

        //create new task with auth user
        $newTask = new Task($request->all());
        Auth::user()->tasks()->save($newTask);

        return response()->json($newTask, 201);
    }

    /**
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * @param Task $task
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Task $task)
    {
        $validator = $this->validator($request->all());
        if ($validator->invalid()) {
            return response()->json($validator->errors(), 422);
        }

        $task->update($request->all());
    }

    /**
     * @param Task $task
     * @return bool|null
     */
    public function destroy(Task $task)
    {
        return $task->delete();
    }

    /**
     * @param array $data
     * @return \Illuminate\Validation\Validator
     */
    private function validator(array $data)
    {
        return Validator::make($data, [
            'text' => 'required|min:3',
        ]);
    }
}
