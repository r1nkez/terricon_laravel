<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    
    public function renderPost() {
        return view('admin.post.post')
            ->with('posts', Post::all())
            ->with('users', User::all());
    }

    public function renderAddPost ()
    {
        return view('admin.post.add');
    }

    public function addPost() {
        $name = request()->get('name', '');
        $preview = request()->file('preview');   
        $description = request()->get('description', '');
        $category_id = request()->get('category_id', '');
        $user_id = request()->get('user_id', '');


        $fileName = '';

        if($preview) {
            $fileName = time() . '_' . $preview->getClientOriginalName();
            $fileName = $preview->storeAs('uploads', $fileName, 'public');
        }

        Post::create([
            'name' => $name,
            'description' => $description,
            'preview' => $fileName,
            'category_id' => $category_id,
            'user_id' => $user_id
        ]);

        return redirect( route('renderAddPost') );
    }

    public function renderEditPost ($id) {
        
        $post = Post::find($id);

        if(!$post) {
            return abort(404);
        }
        return view('admin.post.edit', [
            'post' => $post
        ]);
    }

    public function editPost ($id) {
        $post = Post::find($id);

        if(!$post) {
            return abort(404);
        }

        $post->name = request()->get('name', $post->name);
        $post->description = request()->get('description', $post->description);
        $post->user_id = request()->get('user_id', $post->user_id);

        $date = request()->get('date');
        if ($date) {
            $post->forceFill([
                'created_at' => $date . ' 00:00:00',
        ]);
    }
        $post->update();

        return redirect()->route('renderEditPost', $id);    
        
    }

    public function deletePost($id)
{
    $post = Post::find($id);

        if($post) {
            $imagePath = $post->preview;
            $post->delete();

            Storage::disk('public')->delete($imagePath);
        }

        return back();
}
}
