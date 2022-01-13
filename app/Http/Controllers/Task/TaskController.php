<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(Request $request) {
        $task = new Task;

        $task->date = $request->task['date'];
        $task->title = $request->task['title'];
        $task->location = $request->task['location'];
        $task->description = $request->task['description'];
        $task->start = $request->task['start'];
        $task->end = $request->task['end'];

        $task->save();

        return response()->json(['success' => true]);
    }
    
    public function retrieveAllSpecific(Request $request) {
        $task = new Task;

        $task->date = $request->date;

        $tasks = Task::where('date', $task->date)->get();

        return response()->json(['tasks' => $tasks]);
    }

    public function retrieveAll() {
        return response()->json(['tasks' => Task::all()]);
    }
}
