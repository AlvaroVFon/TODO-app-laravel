<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index()
    {   
        $tasks = Task::all();
        return view('index')->with('tasks', $tasks);
    }
    public function addTask(Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        return redirect('/');
    }
    public function deleteTask($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/');
    }
    public function editTask($id)
    {
        $task = Task::find($id);
        return view('edit')->with('task', $task);
    }
    public function updateTask(Request $request)
    {   
        $task = Task::find($request->id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        return redirect('/');
    }
}
