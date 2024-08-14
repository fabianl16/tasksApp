<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    //

    public function getWeather(Request $request){
        $validatedData = $request->validate([
            'lat' => 'required|numeric',
            'lon' => 'required|numeric'
        ]);

        $lat = $validatedData['lat'];
        $lon = $validatedData['lon'];

        $apiKey = env('WEATHER_API_KEY');

        $url = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$apiKey}";

        $response = Http::get($url);

        if($response->successful()){
            return response()->json($response->json());
        } else{
            return response()->json(['error' => 'Unable to retrieve weather data']);
        }

    }
}
