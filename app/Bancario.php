<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bancario extends Model
{
    protected $table = 'bancarios';

    protected $fillable = ['banco', 'agencia', 'conta_corrente'];

}