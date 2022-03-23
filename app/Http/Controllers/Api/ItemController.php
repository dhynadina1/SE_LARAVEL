<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::with('category')->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get all item",
            'data' => $item
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
        $item = Item::create([
            'name' => $request->name,
            'quantity' =>$request->quantity,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success create the item",
            'data' => $item
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $item = Item::with("category")->find($item->id);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get the item".$item->id,
            'data' => $item
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
    public function update(Request $request, Item $item)
    {
        $item->update([
            'name' => $request->name,
            'quantity' =>$request->quantity,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success update the item".$item->id,
            'data' => $item
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success delete the item".$item->id,
            'data' => ""
        ]);
    }
}
