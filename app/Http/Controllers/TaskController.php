<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = response()->json(Task::all());
        return $tasks;
    }

    public function show($id)
    {
        //Az azonosító alapján megkeresi
        $task = response()->json(Task::find($id));
        return $task;
    }

    public function destroy($id)
    {
        Task::find($id)->delete;
        return redirect("/task/list");
    }
    
    public function store(Request $request){
        $task = new Task();
        $task -> title = $request -> title;
        $task -> end_date = $request -> end_date;
        $task -> user_id = $request -> user_id;
        $task -> status = $request -> status;
        $task -> save();
        return redirect ('/task/list');
    }

    
    public function update(Request $request, $id){
        $task = Task::find($id);
        $task -> title = $request -> title;
        $task -> end_date = $request -> end_date;
        $task -> user_id = $request -> user_id;
        $task -> status = $request -> status;
        $task -> save();
        return redirect ('/task/list');
    }

    
    public function newView(){
        return view('task.new', ['users' => User::all()]);
    }

    public function editView($id){
        return view('task.edit', ['users' => User::all(), 'task' => Task::find($id)]);
    }

    public function listView()
    {
        $tasks = Task::all();
        return view('task.list', ['users' => User::all()]);
    }

}
