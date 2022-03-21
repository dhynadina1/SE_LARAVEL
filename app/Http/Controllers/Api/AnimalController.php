<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Cage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animal = Animal::with('cage')->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get all animal",
            'data' => $animal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = Animal::create([
            'name' => $request->name,
            'class' =>$request->class,
            'cage_id' => $request->cage_id,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success create the animal",
            'data' => $animal
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        $animal = Animal::with("cage")->find($animal->id);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get the animal".$animal->id,
            'data' => $animal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $animal->update([
            'name' => $request->name,
            'class' =>$request->class,
            'cage_id' => $request->cage_id,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success update the animal".$animal->id,
            'data' => $animal
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success delete the animal".$animal->id,
            'data' => ""
        ]);
    }
}
