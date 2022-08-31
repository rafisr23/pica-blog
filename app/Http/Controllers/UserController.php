<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postInAuthor(User $author)
    {
        return view('posts', [
            'title' => "Post by Author : $author->name",
            'active' => 'author',
            'posts' => $author->posts->load(['category', 'author']),
        ]);
    }
}
