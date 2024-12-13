<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Comment;

class Post extends Model
{
    protected $fillable = [
        'name', 'description', 'preview', 'user_id', 'category_id', 'created_at'
    ];

    public function getComments() {
        return Comment::where('post_id', $this->id)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
