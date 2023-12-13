<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Post;
use Illuminate\Support\Facades\DB;

class taskController extends Controller
{
    public function index(){
        $tasks = task::all();
        return view('tasks.index' , compact("tasks"));

    }

    public function create(){
        return view('tasks.create');
    }
    public function store(Request $request){
        task::create([
            'task'=>$request->task
        ]);
        
        return redirect('/tasks');
        
    }

    public function destroy($id){
        $task = task::find($id);
        $task->delete();
        return redirect('/tasks');
    }
    public function edit($id){
        $task = task::find($id);
        return view('tasks.edit' , compact('task'));
    
    }
    public function update($id , Request $request){
        $task = task::find($id);
        
        $task->task = $request->task;
        $task->save();
        return  redirect('/tasks');
    
    }
    public function search(Request $request){
        $search = $request->search;
        $tasks = task::where("task" ,"like" ,"%".$search."%")->get();
        $noTasksFound = $tasks->isEmpty();
        session()->flash('noTasksFound', $noTasksFound);

        return view('tasks.index' , compact("tasks" , "search" , "noTasksFound"));  

    }
    public function gerer(){
        
        $tasks = task::all();
        return view('tasks.gerer' , compact("tasks") );
    }
    public function doneTask($id){
        
        $tasks = task::where('id',$id)->update(['etat'=>"done"]);

        
        


        return redirect('tasks/gerer');

    }
    public function notdoneTask($id){
        
        $tasks = task::where('id',$id)->update(['etat'=>"not done"]);

        
        


        return redirect('tasks/gerer');

    }
    





    



}
