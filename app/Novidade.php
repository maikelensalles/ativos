<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novidade extends Model
{
    protected $table = 'novidades';
    protected $primaryKey = 'id';
    protected $fillable = ['titulo', 'sub_titulo', 'descricao', 'descricao_longa', 'image', 'descricao_media', 'obs', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
