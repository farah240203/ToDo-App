<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskManager extends Controller
{
    function listTask()
    {
        $tasks = Tasks::where("user_id", auth()->user()->id)
                  ->whereIn("status", ['pending', 'completed'])
                  ->orderBy('status')  // Optional: order by status
                  ->paginate(8);  // Single pagination

        return view("welcome", compact('tasks'));
    }


    function addtask()
    {
        return view('tasks.add');
    }

    function addTaskPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);
        $task = new Tasks();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->user_id = auth()->user()->id;
        $task->status = $request->status ?? 'pending';

        if($task->save()){
            return redirect(route("home"))->with("success", "Task added successfully");
        }
        return redirect(route("task.add"))->with("error", "Task not added");
    }

    function updateTaskStatus($id)
    {
        if(Tasks::where("user_id", auth()->user()->id)
        ->where('id', $id)->update(['status' => "completed"])){
            return redirect(route("home"))->with("success", "Task completed");
        }
        return redirect(route("home"))->with("error", "Error occured while updating, try again");
    }

    function deleteTask($id)
    {
        if(Tasks::where("user_id", auth()->user()->id)
        ->where('id', $id)->delete()){
            return redirect(route("home"))->with("success", "Task deleted");
        }
        return redirect(route("home"))->with("error", "Error occured while deleting, try again");
    }
}
