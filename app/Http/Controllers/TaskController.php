<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Project $project) {
        $data = request()->validate([
            'body' => 'required'
        ]);
        $data['project_id']  = $project->id;
        Task::create($data);
        return back();
    }

    public function update(Project $project, Task $task) {
        $task->update([
            'done' => request()->has('done')
        ]);
        return back();
    }

    public function destroy(Project $project, Task $task) {
        $task->delete();
        return redirect('/projects/' . $project->id);
    }
}
