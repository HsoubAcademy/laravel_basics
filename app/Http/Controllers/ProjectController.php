<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $data['user_id'] = auth()->id();
        Project::create($data);
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if (auth()->user()->id !== $project->user_id) {
            abort(403);
        }
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if (auth()->user()->id !== $project->user_id) {
            abort(403);
        }
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project)
    {
        if (auth()->user()->id !== $project->user_id) {
            abort(403);
        }
        $data = request()->validate(
            [
                'title' => 'sometimes|required',
                'description' => 'sometimes|required',
                'status' => 'sometimes|required'

            ]
        );
        $project->update($data);

        return redirect('/projects/' . $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if (auth()->user()->id !== $project->user_id) {
            abort(403);
        }
        $project->delete();
        return redirect('/projects');
    }
}
