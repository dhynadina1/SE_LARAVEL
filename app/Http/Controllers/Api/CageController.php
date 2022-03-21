<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cage;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cage = Cage::with('animal')->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get all cage",
            'data' => $cage
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
        $cage = Cage::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success create the cage",
            'data' => $cage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cage $cage)
    {
        $cage = Cage::with('animal')->find($cage->id);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get the cage".$cage->id,
            'data' => $cage
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
    public function update(Request $request, Cage $cage)
    {
        $cage->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success update the cage".$cage->id,
            'data' => $cage
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cage $cage)
    {
        $cage->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success delete the cage".$cage->id,
            'data' => ""
        ]);
    }
}
