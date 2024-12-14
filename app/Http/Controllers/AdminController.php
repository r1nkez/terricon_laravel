<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Post;
use App\Models\Portfolio;
use App\Models\Lead;
use App\Models\Slider;

use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    
    public function renderWelcomePage () 
    {
        $skills = Skill::all();
        $sliders = Slider::all();

        return view('welcome', [
            'skills' => $skills,
            'sliders' =>$sliders
        ]);
    }

    public function renderPublicPages ($name)
    {
        $data = [];
        switch(strtoupper($name)) {
            case 'WORKS':
                $data['portfolios'] = Portfolio::all();
                break;

            case 'POST':
                $post_id = request()->get('post_id', '');

                if($post_id) {
                    $data['post'] = Post::find($post_id);

                    if(!$data['post']) {
                        return abort(404);
                    }
                } else {
                    return abort(404);
                }

                break;

            case 'BLOG':

                $category_id = request()->get('category_id', '');
                $count_posts = request()->get('count_posts', 10);
                $data['categories'] = Category::all();

                if($category_id) {
                    $data['posts'] = Post::where('category_id', $category_id)->paginate($count_posts); 
                } else {
                    $data['posts'] = Post::paginate($count_posts);
                }
                
                break;

            case 'CONTACTS':

                break; 
        }
        return view("pages.$name", $data);
    }

    public function renderUsers ()
    {
        $users = User::all();

        return view('admin.users')->with('users', $users);
    }

    public function renderEditUsers ($id)
    {
        $user = User::find($id);

        if(!$user) {
            return abort(404);
        }

        return view('admin.edit')->with('user', $user);
    }

    public function editUser ($id) 
    {
        $user = User::find($id);

        if(!$user) {
            return abort(404);
        }

        $user->name = request()->get('name', $user->name);
        $user->email = request()->get('email', $user->email);
        $user->role = request()->get('role', $user->role);

        $user->save();

        return redirect( route('renderUsers', $user->id) );
    }

    public function renderAddUser ()
    {
        return view('admin.add');
    }

    public function addUser ()
    {
        $data = request()->all();
        $user = null;
        if(isset($data['name']) && isset($data['email']) && isset($data['password'])) {
            $user = User::create($data);
        }
        if($user) {
            return redirect( route('renderUsers') );
        } 
        return abort(400);
    }

    public function renderLeads () 
    {
        $leads = Lead::all();

        return view('admin.leads', [
            'leads' => $leads
        ]);
    }

    public function deleteLead ($id) 
    {
        $lead = Lead::find($id);
        if($lead) {
            $lead->delete();
        }
        return back();
    }

    public function addLead ()
    {
        $data = request()->all();

        if(isset($data['name']) && isset($data['email'])) {
            Lead::create($data);

            return redirect(route('pages', [
                'name' => 'contacts', 'createdLead' => 1
            ]));
        }
        
        return redirect( route('pages', 
            ['name' => 'contacts']) );
    }   

    public function renderAddSliderPage () 
    {
        return view('admin.sliders.add');
    }

    public function renderSlidersPage ()
    {
        $sliders = Slider::all();

        return view('admin.sliders', [
            'sliders' => $sliders
        ]);
    }


    public function deleteSlide ($id)
    {
        $slide = Slider::find($id);

        if($slide) {
            $imagePath = $slide->image;
            $slide->delete();

            Storage::disk('public')->delete($imagePath);
        }

        return back();
    }

    public function addSlider (Request $request) 
    {
        $title = request()->get('title', 'Заголовок 1');
        $image = request()->file('image');   
        $description = request()->get('description', '');
        $btn_name = request()->get('btn_name', 'Подробнее');
        $btn_link = request()->get('btn_link', '');

        $fileName = '';

        if($image) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $fileName = $image->storeAs('uploads', $fileName, 'public');
        }

        Slider::create([
            'title' => $title,
            'description' => $description,
            'image' => $fileName,
            'btn_name' => $btn_name,
            'btn_link' => $btn_link
        ]);

        return redirect( route('renderSlidersPage') );
    }

    public function renderEditSlide ($id)
    {
        $slide = Slider::find($id);
        
        return view('admin.sliders.edit')->with('slide', $slide);
    }

    public function editSlide (Request $request, $id)
    {
        $id = $request->id;
        $slide = Slider::find($id);
        if($slide) {
            $slide->title = request()->get('title', $slide->title);   
            $slide->description = request()->get('description', '');
            $slide->btn_name = request()->get('btn_name', $slide->btn_name);
            $slide->btn_link = request()->get('btn_link', '');

            $image = $request->file('image');
            if($image) {
                Storage::disk('public')->delete($slide->image);
                
                $fileName = time() . '_' . $image->getClientOriginalName();
                
                $fileName = $image->storeAs('uploads', $fileName, 'public');
                $slide->image = $fileName;
            }
            $slide->save();
            return redirect( route('renderSlidersPage') );
        }
        
        return abort(404);
    }

    public function renderPortPage ()
    {
        $portfolio = Portfolio::all();

        return view('createPort', [
            'portfolio' => $portfolio
        ]);
    }

    public function createPort ()

    {
        $name = request()->get('name', 'Заголовок 1');
        $image = request()->file('image');   
        $price = request()->get('price', '');
        $val = request()->get('val', 'Подробнее');
        $category = request()->get('category', '');

        $fileName = '';

        if($image) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $fileName = $image->storeAs('uploads', $fileName, 'public');
        }

        Portfolio::create([
            'name' => $name,
            'price' => $price,
            'image' => $fileName,
            'val' => $val,
            'category' => $category
        ]);

        return redirect( route('portCreate') );
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

    public function renderEditPort ($id)
    {
        $port = Portfolio::find($id);

        if(!$port) {
            return abort(404);
        }

        return view('editPort')->with('port', $port);
    }

    public function editPort ($id)
    {
        $port = Portfolio::find($id);

        if($port) {
            $port->name = request()->get('name', $port->name);
            $port->price = request()->get('price', $port->price);
            $port->val = request()->get('val', $port->val);
            $port->category = request()->get('category', $port->category);

            $image = request()->file('image');
            if($image) {
                Storage::disk('public')->delete($port->image);
                
                $fileName = time() . '_' . $image->getClientOriginalName();
                
                $fileName = $image->storeAs('uploads', $fileName, 'public');
                $port->image = $fileName;
            }

        $port->save();

        return redirect( route('portCreate', $port->id) );
        }

        return abort(404);
    }

    public function deletePort ($id)
    {
        $port = Portfolio::find($id);

        if($port) {
            $imagePath = $port->image;
            $port->delete();

            Storage::disk('public')->delete($imagePath);
        }

        return back();
    }
}


