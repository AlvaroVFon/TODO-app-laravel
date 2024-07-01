<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
  public function index()
  {
    // $tasks = Task::all()->where('user_id', auth()->id()); //Eloquent ORM --> SELECT * FROM tasks
    $tasks = Task::where('user_id', auth()->id())->get(); //Eloquent ORM --> SELECT * FROM tasks WHERE user_id = auth()->id()
    return view('index')->with('tasks', $tasks);
  }
  public function addTask(Request $request)
  {
    $validate = $request->validate([
      'title' => 'required',
      'description' => 'required'
    ]);
    try {
      // $task = new Task;
      Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'user_id' => auth()->user()->id
      ]); //Eloquent ORM --> INSERT INTO tasks (title, description) VALUES ($request->title, $request->description)
      return redirect('/task');
    } catch (\Exception $e) {
      return redirect('/task')->with('error', 'Error adding task');
    }
  }
  public function deleteTask($id)
  {
    try {
      $task = Task::find($id);
      $task->delete(); //Eloquent ORM --> DELETE FROM tasks WHERE id = $id
      return redirect('/task');
    } catch (\Exception $e) {
      return redirect('/task')->with('error', 'Error deleting task');
    }
  }
  public function editTask($id)
  {
    $task = Task::find($id); //Eloquent ORM --> SELECT * FROM tasks WHERE id = $id
    return view('edit')->with('task', $task);
  }
  public function updateTask(Request $request)
  {

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
