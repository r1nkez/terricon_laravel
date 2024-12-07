<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Portfolio;

class PortController extends Controller
{
    public function renderPortPage ()
    {
        $portfolio = Portfolio::all();

        return view('createPort', [
            'portfolio'=>$portfolio
        ]);
    }

    public function createPost (Request $request)

    {
        $data = $request->all();

        $port = Portfolio::create($data);

        return back();
    }
}
