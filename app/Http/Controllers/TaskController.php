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
            return response()->json($validator->errors(), 422);
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @internal param Task $task
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all());
        if ($validator->invalid()) {
            return response()->json($validator->errors(), 422);
        }

        $task = Task::find($id)->first();

//        $task->update($request->all());
        $task->where('id', $id)->update($request->all());
    }

    /**
     * @param $task
     * @return int
     */
    public function destroy($task)
    {
        return Task::destroy($task);
    }

    public function isComplete($id)
    {
        $task = Task::find($id)->first();

        //todo create scopeById in model
        $task->where('id', $id)->update([
            'is_complete' => 1
        ]);
    }

    /**
     * @param array $data
     * @return \Illuminate\Validation\Validator
     */
    private function validator(array $data)
    {
        return Validator::make($data, [
            'text' => 'required',
            'endDay' => 'required'
        ]);
    }
}
