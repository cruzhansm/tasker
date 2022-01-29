<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller {
    public function retrieveAll() {
        return response()->json(['tasks' => Task::where('status', '!=', 'deleted')->where('status', '!=', 'done')->get()]);
    }

    public function retrieveAllNotFinished() {
        return response()->json(['tasks' => Task::where('status', '!=', 'deleted')->get()]);
    }

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

    public function update(Request $request) {
        $numrows = Task::where('id', $request->task['id'])->update([
            'date' => $request->task['date'],
            'title' => $request->task['title'],
            'location' => $request->task['location'],
            'description' => $request->task['description'],
            'start' => $request->task['start'],
            'end' => $request->task['end']    
        ]);

        return response()->json(['success' => $numrows > 0 ? true : false]);
    }
    
    public function retrieveAllSpecific(Request $request) {
        $task = new Task;

        $task->date = $request->date;

        $tasks = Task::where('date', $task->date)->where('status', '!=', 'deleted')->get();

        return response()->json(['tasks' => $tasks]);
    }

    public function updateTaskStatus(Request $request) {
        $numrows = Task::where('id', $request->id)->update(['status' => $request->status]);

        return response()->json(['success' => $numrows > 0 ? true : false]);
    }
}
