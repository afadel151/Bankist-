<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MachineController extends Controller
{
    public function map()
    {
        return Inertia::render('Map');
    }
    public function machines()
    {
        $machines = [ 
            [ "latitude" => 36.737232, "longitude" => 3.086472 ], // El Madania
            [ "latitude" => 36.752500, "longitude" => 3.041970 ], // Bab El Oued
            [ "latitude" => 36.766720, "longitude" => 3.052560 ], // Hydra
            [ "latitude" => 36.767920, "longitude" => 3.059630 ], // El Mouradia
            [ "latitude" => 36.752220, "longitude" => 3.087460 ]  // Kouba
        ];
        
          
        return response()->json($machines);
    }
}
