<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGestore extends Model
{
    use SoftDeletes;
    protected $table = 'user_gestores';
    protected $fillable = ['nome', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}