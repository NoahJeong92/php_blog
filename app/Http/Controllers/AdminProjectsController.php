<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('AdminProject.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();


        return view('AdminProject.create_project', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'title' => 'required',
            // 'thumbnail' => 'required',
            // 'description' => 'required',
            // 'github_link' => 'required',
            // 'youtube_link' => 'required',
            // 'skills' => 'required',
            // 'category_id' => 'required'

        ]);

        $project = new Project;

        //Image Upload

        if($file = $request->file('thumbnail')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $project->thumbnail = $name;
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->github_link = $request->ithub_link;
        $project->youtube_link = $request->youtube_link;
        $project->skills = $request->skills;
        $project->category_id = $request->category_id;


        $project->save();

        return redirect()->route('admin.projects.create')->with('success', 'Project Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $categories = Category::all();
        return view('AdminProject.edit_project', compact('project','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required',
            // 'github_link' => 'required',
            // 'youtube_link' => 'required',
            // 'skills' => 'required',
            // 'category_id' => 'required'

        ]);

        $project = Project::find($id);

        if($file = $request->file('thumbnail')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $project->thumbnail = $name;
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->github_link = $request->ithub_link;
        $project->youtube_link = $request->youtube_link;
        $project->skills = $request->skills;
        $project->category_id = $request->category_id;

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project Updateed Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
