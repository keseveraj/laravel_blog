<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $incomeF = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomeF['title'] = strip_tags($incomeF['title']);
        $incomeF['body'] = strip_tags($incomeF['body']);
        $incomeF['user_id'] = auth()->id();
        Post::create($incomeF);

        return redirect('/');
    }

    public function update(Post $post) {
        return view('edit-post', ['post' => $post]);
    }

    Public function updatedPost(Post $post, request $request) {

        if(auth()->user()->id === $post['user_id']) {
            $incomeF = $request->validate([
                'title' => 'required',
                'body' => 'required'
            ]);
    
            $post->update($incomeF);
            return redirect('/');
        }
        
        return redirect('/');
    }

    Public function deletePost(Post $post) {

        if(auth()->user()->id === $post['user_id']) {
            $post->delete();
        }

        return redirect('/');
    }

}
