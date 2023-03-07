<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function create(){

        // $post = Post::create([
        //     'title'=>'jjjjj'
        // ]);
        // $post->image()->create([
        //     'url'=>'kkkk'
        // ]);

        // dd(Post::first()->image->url);


        $user = User::first();
        $user->image()->create([
            'url'=>'ss'
        ]);

        dd($user->image->url);
        
        return view('posts.create');
    }
    
}
