<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $post = Post::all();
        return view('posts.index' , compact('post'));
    }

    public function postsTrashed()
    {
        $post = Post ::onlyTrashed()->get();
        return view('posts.trashed' , compact('post'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $this->validate($request ,[
            'title' => 'required',
            'content' => 'required',
            'photo' => 'required|image',
        ]);

        $photo = $request-> photo;
        $newphoto = time().$photo->getClientOriginalName();
        $photo->move('upload/posts',$newphoto);

        $post = Post::create([
            'title'=> $request->title,
            'content'=> $request->content,
            'photo'=> 'upload/posts/'.$newphoto,
            'slug' =>   str::slug($request->title),
            'user_id'=> Auth::id()
        ]);

        return redirect()->back();
    }


    public function show($slug)
    {
        $post = Post::where('slug' , $slug)->firstOrFail();
        return view('posts.show' , compact('post'));
    }


    public function edit($id)
    {
        $post = Post::find( $id);
        return view('posts.edit' , compact('post'));

    }


    public function update(Request $request, $id)
    {
        $post = Post::find( $id);
        $this->validate($request ,[
            'title' => 'required',
            'content' => 'required',
            'photo' => 'required|image',
        ]);
    if ($request ->has('photo')) {
        $photo = $request-> photo;
        $newphoto = time().$photo->getClientOriginalName();
        $photo->move('upload/posts',$newphoto);
        $post->photo = 'upload/posts'.$newphoto;
    }
    $post->title = $request->title;
    $post->content = $request->content;
    $post->save;
    return redirect()->back();

    }


    public function destroy($id)
    {
        $post = Post::find( $id);
        $post->delete();
        return redirect()->back();

    }

    public function hdelete($id)
    {
        $post = Post::withTrashed()->where( 'id' ,$id)->firstOrFail();
        $post->forceDelete();
        return redirect()->back();

    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where( 'id' ,$id)->firstOrFail();
        $post->restore();
        return redirect()->back();

    }
}
