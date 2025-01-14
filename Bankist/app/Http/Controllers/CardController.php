<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function lock(Request $request)
    {
        $card = Card::find($request->card_id);
        
    }
}
