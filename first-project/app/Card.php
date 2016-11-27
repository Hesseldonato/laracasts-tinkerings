<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function addNote(Note $note, $user_id)
    {
        $note->user_id = $user_id;
        return $this->notes()->save($note);
    }
}
