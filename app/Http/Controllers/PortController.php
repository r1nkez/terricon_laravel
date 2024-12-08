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
            'portfolio' => $portfolio
        ]);
    }

    public function createPort (Request $request)

    {
        $data = $request->all();

        $port = Portfolio::create($data);

        return back();
    }

    public function getApiPort () 
    {
        $portfolio = Portfolio::all();

        return response()->json([
            'data' => $portfolio,
            'count_data' => $portfolio->count()
        ]);
    }

    public function createApiPort (Request $request)
    {
        $data = $request->all();
        $portfolio = null;

        if(isset($data['name'])){
            $portfolio = Portfolio::create($data);
        }

        return back();
    }
}
