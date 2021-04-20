<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;
use Illuminate\Support\Facades\DB;

class Metas extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'indicador_id',
        'titulo',
        'descricao',
        'justificativa',
        'valor',
        'data_registro',
        'pne',
        'ods',
        'logs',
        'active',
    ];

    /**
     * 
     */
    protected $atributes = [
        'active' => true,
    ];

    protected $casts = [
        'pne' => 'array',
        'ods' => 'array',
        'logs' => 'array',
    ];
    
    public function getMetas()
    {
       $metas = self::where("active",'=',true)->get();
       $arr = [];
       $arr2 = [];
       foreach ($metas as $value) {

            $arr[] = array(
                'id' => $value->id,
                'indicadores' => $this->getIndicadores($value->indicador_id),
                'titulo' => $value->titulo,
                'descricao' => $value->descricao,
                'justificativa' => $value->justificativa,
                'data_registro' => $value->data_registro,
                'pne' => $value->pne,
                'ods' => $value->ods,
            );

       }
       return $arr;
    }
    public function adminViewData()
    {
        $arr = [];
        $view = self::all();
        for ($i=0; $i < count($view); $i++) { 
            foreach ($this->viewTable as  $key => $value) {
               $arr[$i] = [$key => $value];
            }
        }
        return $arr;
    }

    public function getIndicadores($id)
    {
        
        $indicadores = DB::table('indicadores')->where('id','=',$id)->get();
        $arr = [];
        if(count($indicadores) <= 1){
            foreach ($indicadores as $value) {
                $arr["codigo"]        = $value->id;
                $arr["nome"]        = $value->titulo;
                $arr['descricao']     = $value->descricao;
                $arr["anos"]          = $value->anos;
                $arr["metas"]         = $value->metas;
                $arr['valor_inicial'] = $value->valor_inicial;
                $arr["valor"]         = $value->valor;
                $arr["valor_final"]   = $value->valor_final;
                $arr['data_registro'] = $value->data_registro;
            } 

        }
        return $arr;

    }

}
