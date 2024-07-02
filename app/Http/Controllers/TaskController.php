<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
  public function index()
  {
    $tasks = Task::where('user_id', auth()->id())->get(); //FIXME
    return view('index')->with(['tasks' => $tasks])->with('user', auth()->user());
  }
  public function allTask()
  {
    $tasks = Task::simplePaginate(5);
    return view('alltasks')->with(['tasks' => $tasks]);
  }
  public function addTask(Request $request)
  {
    $validate = $request->validate([
      'title' => 'required',
      'description' => 'required'
    ]);
    try {
      Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'user_id' => auth()->user()->id
      ]);
      return redirect('/task');
    } catch (\Exception $e) {
      return redirect('/task')->with('error', 'Error adding task');
    }
  }
  public function deleteTask($id)
  {
    try {
      $task = Task::find($id);
      $task->delete();
      return redirect('/task');
    } catch (\Exception $e) {
      return redirect('/task')->with('error', 'Error deleting task');
    }
  }
  public function editTask(Request $request, $id)
  {
    if ($request->user()->cannot('updateTask', Task::find($id))) {
      abort(403, 'Unauthorized action.');
    }
    $task = Task::find($id);
    return view('edit')->with('task', $task)->with('user', auth()->user());
  }
  public function updateTask(Request $request)
  {
    $validate = $request->validate([
      'title' => ['required', 'string'],
      'description' => ['required', 'string']
    ]);
    try {
      $task = Task::find($request->id);
      $task->title = $request->title;
      $task->description = $request->description;
      $task->save();
      return redirect('/task');
    } catch (\Exception $e) {
      return redirect('/task')->with('error', 'Error updating task');
    }
  }
}
