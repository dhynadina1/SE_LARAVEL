<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CekGempaController extends Controller
{
    public function getData () {

        $data = Http::get("https://cuaca-gempa-rest-api.vercel.app")->object();
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get data",
            'data' => $data
        ]);
    }
    
    public function getQuake () {

        $quake = Http::get("https://cuaca-gempa-rest-api.vercel.app/quake")->object();
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get quake data",
            'data' => $quake
        ]);
    }

    public function getProvince ($province) {

        $weather = Http::get("https://cuaca-gempa-rest-api.vercel.app/weather/".$province)->object();
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get the province, ".$province,
            'data' => $weather
        ]);
    }

    public function getCity ($province, $city) {

        $weather = Http::get("https://cuaca-gempa-rest-api.vercel.app/weather/".$province ."/".$city)->object();
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get the city, ".$city,
            'data' => $weather
        ]);
    }
}