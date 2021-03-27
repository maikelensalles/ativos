<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoUserSaque extends Model
{
    protected $table = 'contrato_users_saques';
    protected $fillable = ['saque', 'status_saque', 'user_id'];
    protected $primaryKey = 'id';
    protected $dates = [
        'seen_at',
    ];

    //MÉTODO QUE RETORNA A SOMA DOS RESGATES FINALIZADOS 
    public static function obter_Resgates()
    {
        $contratousersaques = ContratoUserSaque::all();
        
        foreach($contratousersaques as $contratousersaque){
            if($contratousersaque->status_saque == "Finalizado"){
                $contratousersaque = DB::table('contrato_users_saques')
    
                                    ->join('users', 'contrato_users_saques.user_id', '=', 'users.id')

                                    ->groupBy('user_id', DB::raw('MonthName(contrato_users_saques.updated_at)'))

                                    ->select('user_id', DB::raw('MonthName(contrato_users_saques.updated_at) as month, sum(saque) as count'))

                                    ->where([
                                        ['contrato_users_saques.status_saque', '=', 'Finalizado'],
                                        ['user_id', '=', Auth::id()],
                                    ]) 
                                        
                                    ->get();

                return $contratousersaque;
                
            }else{
                return null;
           }
        }        
    }

    public function contratouser()
    {
        return $this->belongsTo('App\ContratoUser', 'contrato_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}