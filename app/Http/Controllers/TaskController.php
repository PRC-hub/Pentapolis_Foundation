<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TaskController extends Controller
{
    public function task()
    {
        // Load task data from JSON
        $jsonPath = public_path('json/salesperson_dashboard/tasks.json');
        $tasks = json_decode(File::get($jsonPath), true)['tasks'];

    

        return view('task', compact('tasks'));
    }
}
