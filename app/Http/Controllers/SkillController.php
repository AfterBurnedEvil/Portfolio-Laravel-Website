<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Skill_data;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index()
    {
        $skillz = Skill::all();
        return view('admin.skills', compact('skillz'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Skill::create($request->all());
  
        return redirect()->route('skillz_show')->with('success','Skill created successfully.');
    }

    public function destroy($id)
    {
        $skillz = Skill::find($id);
        $skillz->delete();

       return redirect()->route('skillz_show')
                       ->with('success','Skill deleted successfully');
    }

    public function mystore(Request $request)
    {
        
        $data = $request->except('_token');
        $uid = Auth::user()->id;
        foreach ($request->skillid as $index=>$skillid) {
            $newSkill = Skill_data::updateOrCreate([

                'user_id'   => Auth::user()->id,
                'skills_id'     => $request->skillid[$index],
            ],[
                
                'value' => $request->value[$index],
            ]);
        }
        
        
  
        return redirect()->route('skille_view',$uid)->with('success','Skill created successfully.');
    }

    public function viewskill($id)
    {
        $skillall = Skill::all();
        $user = User::find($id);
        $all_userdata = $user->skilldata;
        $skillnames = [];
        $i = 0;
        foreach($skillall as $skz)
        {
            if(!count($all_userdata)){
                $skillnames[$i]['name'] = $skz->title;
                $skillnames[$i]['value'] = 0;
                $skillnames[$i]['skill_id'] = $skz->id;
                $i++;
            }

            foreach($all_userdata as $skill)
            {
                if($skill->skills_id == $skz->id){
                    
                        $skillnames[$i]['name'] = $skz->title;
                        $skillnames[$i]['value'] = $skill->value;
                        $skillnames[$i]['skill_id'] = $skill->skills_id;
                        
                        /*
                        $skillnames[$i]['user_id'] = $skill->user_id;
                        */

                        $i++;
                }
                
            }
            
        }

        
        
        return view('admin.myskills', compact('skillnames'));
    }
}
