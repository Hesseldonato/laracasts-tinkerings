<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Card;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view('cards.index', compact('cards'));
    }

    public function show($id)
    {
        $card = Card::find($id);

        return view('cards.show', compact('card'));
    }
}
