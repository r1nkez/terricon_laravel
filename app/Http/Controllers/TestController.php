<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;

class TestController extends Controller
{
    public function show ($id)
    {
        return $id;
    }

    public function getAllSkills ()
    {
        $skills = Skill::all();

        return response()->json($skills);
    }

    public function ReplaceSkills () 
    {
        $title = "Навыки";
    
        $skills = Skill::all();
        
        return view('skills',[
            'title' => $title,
            'skills' => $skills
        ]);
    }
}
