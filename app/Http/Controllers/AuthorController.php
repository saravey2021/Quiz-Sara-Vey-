<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Author::latest()->get();
        // return Author::get()->where('name', '<', 3, '>', 10);
        // return Author::get()->where('age', '<', 1, '>', 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $Author = new Author();
        $Author->name = $request->name;
        $Author->age = $request->age;
        $Author->province = $request->province;
       

        $Author->save();
        return response()->json(['message' => 'create'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Author::findOrFail($id);
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
        //
        $Author = Author::findOrFail($id);
        $Author->name = $request->name;
        $Author->age = $request->age;
        $Author->province = $request->province;

        $Author->save();

        return response()->json(['message' => 'update'], 200);
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
        return Author::destroy($id);
        // return reponse()->json(['message'=>'ID NOT EXIST'], 404);
    }
}
