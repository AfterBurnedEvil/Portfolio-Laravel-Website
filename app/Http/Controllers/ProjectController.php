<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\File; 

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view('project.viewallproject',compact('projects'));
    }
    public function createproj()
    {

        return view('project.createproject');
        
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'imgz.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('imgz');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'), $imageName);

        $id =Project::create([
            'title' => $request->title,
            'body' => $request->body,
            'img' => $imageName,
        ])->id;
  
        return \Redirect::route('project_viewspecific', [$id])->with('message', 'State saved correctly!!!');
  
    }

    public function viewproj($id)
    {
        $projdetails = Project::find($id);
        return view('project.viewproject',compact('projdetails'));
    }

    public function editview($id){
        $projdetails = Project::find($id);
        return view('project.editproject',compact('projdetails'));
    }

    public function delete($id){
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('home');
    }

    public function edit(Request $request,$id){

        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'imgz.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('imgz');
        if($file)
        {
            $file = $request->file('imgz');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $imageName);

            Project::whereId($id)->update([
                'title' => $request->title,
                'body' => $request->body,
                'img' => $imageName,
               ]);
               File::delete('/images/'.$request->hidden_img);
               return \Redirect::route('project_viewspecific', [$id])->with('message', 'State saved correctly!!!');

        }    

        else{
            Project::whereId($id)->update([
                'title' => $request->title,
                'body' => $request->body,
                'img' => $request->hidden_img,
               ]);
               return \Redirect::route('project_viewspecific', [$id])->with('message', 'State saved correctly!!!');
        }
       
    }
}
