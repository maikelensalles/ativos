<?php

namespace App;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoUser extends Model
{
    protected $table = 'contrato_users';
    protected $fillable = ['valor', 'saque', 'status', 'contrato_id', 'user_id'];
    protected $primaryKey = 'id';
    protected $dates = [
        'seen_at',
    ];

    //MÉTODO QUE RETORNA OS CONTRATOS 
    public static function obter_Dados()
    {
        $assinados = ContratoUser::all();

        $mes = date('m'); 
        
        foreach($assinados as $assinado){
            if($assinado->status == "Aprovado"){
                $assinado = DB::table('contrato_users')
    
                            ->join('users', 'contrato_users.user_id', '=', 'users.id')

                            //->select('contrato_users.updated_at', '=', Carbon::now()->format('F'))

                            ->groupBy('user_id', DB::raw('MonthName(contrato_users.created_at)'))

                            //->select(DB::raw('MONTH(contrato_users.created_at) as Mes, count(*) as Quantidade'))   
    
                            ->select('user_id', DB::raw('MonthName(contrato_users.created_at) as mes'), DB::raw('count(status) as contar'))
    
                            ->where('user_id', '=', Auth::id())

                            ->orderByRaw('mes DESC')
                                
                            //->pluck('mes','contar'); 

                            ->get();

                return $assinado;
                
            }else{
                return null;
           }
        }        
    } 

    //METODO QUE CALCULA A PARTICIPAÇÃO AO DIA 
    public static function saldo()
    {
        $saldoos = ContratoUser::all();

        foreach($saldoos as $saldoo){
            if($saldoo->status == "Aprovado"){
                $saldoo = DB::table('contrato_users')

                                    ->join('users', 'contrato_users.user_id', '=', 'users.id')

                                    ->join('contratos', 'contrato_users.contrato_id', '=', 'contratos.id')

                                    //->select('contrato_id', DB::raw('sum(contratos.participacao) as porcento'))

                                    ->select('user_id', '=', 'contrato_id')

                                    ->select('user_id', DB::raw('sum(contrato_users.valor) as value'), DB::raw('sum(contratos.participacao) as porcento'))

                                    ->where([
                                        ['contrato_users.status', '=', 'Aprovado'],
                                        ['contrato_users.user_id', '=', Auth::id()],
                                    ])  

                                    ->groupBy('contrato_users.user_id', 'contrato_users.status')

                                    ->pluck('porcento', 'value');

                                    //->get();

                return $saldoo;
                
            }else{
                return null;
           }
        }        
    } 
    

    //MÉTODO QUE RETORNA OS CONTRATOS 
    //public static function obterDados()
    //{
       // $buscas = ContratoUser::orderBy('created_at', 'ASC')->get();
        
        //if($buscas->count()){
            
            //$buscas_meses = [];
            //foreach($buscas as $chave => $valor){
                //$status_mes = json_decode($valor->all(), true);
                //foreach($status_mes as $chavemes => $valormes){
                    //$buscas_meses[ $chavemes ] = $valormes;
                //}
            //}

            //return $buscas_meses;

        //}else{
          //  return null;
       //}

      // return $buscas->toJson();
   // } 

    public function contrato()
    {
        return $this->belongsTo('App\Contrato', 'contrato_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function contratouser() {
        return $this->hasMany('App\ContratoUserSaque');
    }
}