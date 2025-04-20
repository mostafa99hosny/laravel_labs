<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    function index(){
        // $posts =Post::all();
        $posts = Post::paginate(10);

        return view('posts.index', ['posts' => $posts]);
    }
    function show($id){
        $post= Post::find($id);
        return view('posts.show', ['post' => $post]);
    }
    function create(){
        return view('posts.create');
    }
    function store(StorePostRequest $request){

        $data = $request->all();
        // Post::create($data);
        //validation
        $post=new Post();
        $post->title=$data['title'];
        $post->body=$data['body'];
        $post->user_id=Auth()->user()->id;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $post->photo = $path;
        }
        $post->save();
        return redirect('/posts');
    }
    function edit($id){
        $post = Post::find($id);
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }
        return view('posts.edit', ['post' => $post]);
    }
    function update(UpdatePostRequest $request, $id){
        $data = $request->all();
        $post=Post::find($id);
        // if ($post->user_id !== auth()->user()->id) {
        //     abort(403, 'Unauthorized action.');
        // }
        $post->title=$data['title'];
        $post->body=$data['body'];
        $post->user_id=Auth()->user()->id;
        if ($request->hasFile('photo')) {
            if ($post->photo) {
                Storage::disk('public')->delete($post->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $post->photo = $path;
        }
        $post->save();
       return redirect('/posts');
    }
    function destroy($id){
        $post=Post::find($id);
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }
        if ($post->photo) {
            Storage::disk('public')->delete($post->photo);
        }
        
        $post->delete();
        // Post::destroy($id);
        return redirect('/posts');
    }

}
