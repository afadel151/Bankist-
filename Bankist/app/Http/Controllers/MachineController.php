<?php

namespace App\Http\Controllers;

use App\Models\Machine;
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
        
        
        $machines = Machine::all();
        return response()->json($machines);
    }
}
