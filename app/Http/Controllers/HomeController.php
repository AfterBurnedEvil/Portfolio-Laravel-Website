<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uDetail;
use App\Models\User;
use App\Models\Skill;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $idd = 1;
        if (uDetail::where('user_id', '=', $idd)->exists()) {
            $skillnames = $this->viewskill($idd);
            $details = uDetail::where('user_id', $idd)->first();
            return view('homee.index',compact('details','skillnames','projects'));
        }
        else{
            return view('homee.index');
        }
        
        
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
        return $skillnames;
    }
}