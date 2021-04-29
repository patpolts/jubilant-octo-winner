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
    protected $indicador, $indicadorAnos;

    public function __construct()
    {

        $this->metas         = self::class;
        $this->indicador     = DB::table('indicadores');
        $this->indicadorAnos = DB::table('indicadores_anos');

    }
    
    public function getMetas()
    {
       $metas = self::where('active',true)->get();
        $arr = [];  
        $arr2 = [];  
        $arr3 = [];  
       foreach ($metas as $value) { 

            $indicadores   = $this->indicador->where('id',$value->indicador_id)->get();
            
            foreach ($indicadores as $idc) {
                $arr2[] = array(
                    'id' => $idc->id,
                    'titulo'        => $idc->titulo,
                    'descricao'     => $idc->descricao,
                    'valor_inicial' => $idc->valor_inicial,
                    'valor'         => $idc->valor,
                    'valor_final'   => $idc->valor_final,
                    'data_registro' => $idc->data_registro,
                );

                $indicadorAnos = $this->indicadorAnos->where('indicador_id',$idc->id)->get();

                foreach ($indicadorAnos as $idca) {
                    $arr3[] = array(
                        "id" => $idca->id,
                        "ano" => $idca->ano,
                        "valor" => $idca->valor,
                        "justificativa" => $idca->justificativa
                    );
                }

            }

            $arr[] = array(
                'id' => $value->id,
                'titulo' => $value->titulo,
                'descricao' => $value->descricao,
                'justificativa' => $value->justificativa,
                'data_registro' => $value->data_registro,
                'pne' => $value->pne,
                'ods' => $value->ods,
                'indicadores' => $arr2,
                'indicadores_anos' => $arr3
            );

        }

    //    print_r('<pre>');
    //    print_r($arr);

       return $arr;

    }

    // public function metas()
    // {
    //     return $this->where('active',true)->get();
    // }

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

    // public function indicador($id)
    // {
    //     $model = Indicadores::class;
    //     return $model::indicador($id);
    // }

    // public function indicadorAnos($id)
    // {
    //     $model = IndicadoresAnos::class;
    //     return $model::indicadorAnos($id);
    // }

}
