<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;

class SkillController extends Controller
{
    public function renderCreatePage (Request $request) 
    {
        $data = $request->all();

        $skill = Skill::create($data);

        return back();
    }
}
