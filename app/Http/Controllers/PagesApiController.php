<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $pages = Page::all();
        return response()->json(['data'=> $pages]);
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
        Page::create($data);
        return response()->json(['data'=>$data, 'status'=>'Record saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $page = Page::findOrFail($page);
        ($page) ? response()->json(['data'=>$page], 200) : response()->json(['data'=>'No data found'], 401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $data = $this->validRequest();
        $page = Page::findOrFail($page);
        $page->update($data);
        return response()->json(['data'=>$page, 'status'=>'Record updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page = Page::findOrFail($page);
        $page->delete();
        return response()->json(['status'=>'Record deleted'], 200);
    }
    public function validRequest(){
         request()->validate(
            [
                'title'=> 'required|min:3',
                'description' => 'required|min:5',
            ]
            );
            
    }
}
