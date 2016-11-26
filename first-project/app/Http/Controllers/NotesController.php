<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Card;

class NotesController extends Controller
{
    public function store(Request $request, Card $card)
    {
        $card->addNote(
            new Note( $request->all() )
        );

        return back();
    }
}
