<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
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

    if (!$post) {
        return abort(404);
    }

    $post->delete();

    return redirect()->route('dashboard')->with('success', 'Пост успешно удалён');
}
}
