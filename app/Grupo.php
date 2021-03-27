<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes;
    protected $table = 'grupos';
    protected $primaryKey = 'id';
    protected $fillable = ['titulo', 'link'];
}