<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Task;

class TaskController extends Controller
{

    // --------------------- [ Load Task ] -----------------------
   
    public function index()
    {
        $tasks  = Task::all();
        return view('task/index', compact('tasks'));
    }


    // --------------------- [Create task ] -------------------------
   
    public function create()
    {
        return view ('task/create');
    }

  
    // ------------------- [ Store Task ] ----------------------------
    public function storeTask(Request $request)
    {
      
       $validator = $request->validate(
           [
                'task_title' => 'required',            
                'description' => 'required',
                'category'    => 'required',
                'duration'    => 'required'
           ]
        );
    
        $input  =   $request->all();

        $task   =   Task::create($input);
        if(!is_null($task)) {
            return response()->json(['status' => 'success', 'message' => 'Task created successfully']);
        }     
        else {
            return response()->json(['status' => 'failed', 'message' => 'Failed to create task']);
        }   
    }


    // -------------- [ Display Task ] -------------------
    
    public function show($id)
    {
        
    }

    // -------------- [ Edit Task ] ----------------------
    
    public function edit($id)
    {
        
    }


    // -------------- [ Update Task ] --------------------

   
    public function update(Request $request, $id)
    {
        
    }


    // ------------- [ Delete Task ] ---------------------
   
    public function destroy($id)
    {
        
    }
}
