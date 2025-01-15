<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function lock(Request $request)
    {
        $card = Card::find($request->card_id);
        $card->update([
            'locked' => !$card->locked
        ]);
        return redirect()->route('accounts.'.$card->account->account_type);
    }
    public function get_cards()
    {
        $cards = Card::where('user_id',auth()->user()->id)->get();
        $cards->load(['user','account']);
        return response()->json($cards);
    }
}
