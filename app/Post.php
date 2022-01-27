<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titre', 'detail', 'photo','views','categorie_id',
    ];

}
