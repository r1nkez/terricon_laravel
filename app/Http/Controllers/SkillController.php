<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;

class SkillController extends Controller
{
    public function renderCreatePage ()
    {
        $skills = Skill::all();

        return view('createSkill', [
            'skills' => $skills
        ]);
    }

    public function getApiSkills ()
    {
        $skills = Skill::all();

        return response()->json([
            'data' => $skills,
            'count_data' => $skills->count()
        ]);
    }

    public function createApiSkill ()
    {
        $data = request()->all();
        $skill = null;

        if(isset($data['name'])){
            $skill = Skill::create($data);
        }

        return response()->json([
            'data' => $skill
        ]);
    }

    public function createSkill (Request $request)
    {
        $data = $request->all();

        $skill = Skill::create($data);

        return back();

    }
}
