<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;


class PostController extends Controller
{
    public function create(){

        // One To one (Polymorphic)

        // $post = Post::create([
        //     'title'=>'jjjjj'
        // ]);
        // $post->image()->create([
        //     'url'=>'kkkk'
        // ]);

        // dd(Post::first()->image->url);


        // $user = User::first();
        // $user->image()->create([
        //     'url'=>'ss'
        // ]);

        // dd($user->image->url);
        
        // return view('posts.create');

        // One To Many (Polymorphic)

        // $post = Post::first(); 
        // $post->comments()->create([
        //     'comment'=>'llll'
        // ]);
        // dd($post->comments);

        $video = Video::first(); 
        $video->comments()->create([
            'comment'=>'ppppp'
        ]);
        dd($video->comments);
    }
    
}
