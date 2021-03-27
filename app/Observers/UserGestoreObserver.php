<?php namespace App\Observers;

use App\UserGestore;

class UserGestoreObserver 
{
    public function creating(UserGestore $model)
    {
        $model->user_id = auth()->user()->id;
    }   
}