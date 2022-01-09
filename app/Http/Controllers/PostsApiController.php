<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return response()->json(['data'=> $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validRequest();
        Post::create($data);
        return response()->json(['data'=>$data, 'status'=>'Record saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($post);
        ($post) ? response()->json(['data'=>$post], 200) : response()->json(['data'=>'No data found'], 401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validRequest();
        $post = Post::findOrFail($post);
        $post->update($data);
        return response()->json(['data'=>$post, 'status'=>'Record updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($post);
        $post->delete();
        return response()->json(['status'=>'Record deleted'], 200);
    }
}
