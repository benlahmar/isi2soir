<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

      protected $fillable = [
        'date',
        'etat'
       
    ];


    public function inviter()
{
    return $this->belongsTo(Utilisateur::class, 'inviter_id');
}

public function invitee()
{
    return $this->belongsTo(Utilisateur::class, 'invitee_id');
}
}
