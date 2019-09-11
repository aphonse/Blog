<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($user=Auth::user()){
            $post=Post::orderby('id','desc')->paginate(2);
            return view('home')->with('post',$post);
        }else{
         return redirect('/login');
        }
        //return redirect('/')->with('post',$post);
       //return view('pages.posts',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($user=Auth::user()){
            return view('pages.posts');
        }else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name45'=>'required',
            'message'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);
        //Image handling
        if ($request->hasFile('image')){
            $fileNameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //use command 'php artisan storage:link after path'
            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
        }else{
            $fileNameToStore='Noimage.jpg';
        }

        //Creating a post in database
        $post=new Post;
        $post->name=$request->input('name45');
        $post->message=$request->input('message');
        $post->image=$fileNameToStore;
        $post->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        //return dd($post);
        return view('pages.items')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 123;
        $post=Post::find($id);
        return view('pages.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return 123;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
