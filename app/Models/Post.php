<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'slug', 'body', 'image'];
}

#user_id --- inizialmente non c'è ma lo metto, poi lo aggiungiamo a mano
#slug --- aggiungo anche lui, perchè ci permette di avere dei percorsi come: post/titolo del post     che sono più user friendly ed utili per il SEO
