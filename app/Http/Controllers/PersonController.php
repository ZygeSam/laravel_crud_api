<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PersonResource;
use App\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()// :PersonResource
    {
        return  ["data"=>Person::paginate(5)];
       //return new PersonResource(Person::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Person $person, Request $request):PersonResource
    {
        $data= $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required'
        ]);
        return new PersonResource($person->create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $person 
     * @return \Illuminate\Http\Response
     */
    public function show($id)// :PersonResource
    {
        $person = Person::find($id);
        if(!($person)){
            return response()->json(["message"=>"Record not found"], 201);
        }
        return  ["data"=>$person];
         //return new PersonResource($person);
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)//:PersonResource
    {
       // dd($request->all());
       $person = Person::find($id);
        if(!($person)){
            return response()->json(["message"=>"Record not found"], 201);
        }
        $data= $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required'
        ]);
        $person->update($data);
          return  ["data"=>$person]; ; 
           //return new PersonResource($person);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        if(!($person)){
            return repsonse()->json(["message"=>'Record not found'], 201);
        }
         $person->delete();
         return response()->json("Record deleted");
    }
}
