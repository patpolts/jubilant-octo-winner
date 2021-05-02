<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;
use Illuminate\Support\Facades\DB;

class Indicadores extends Model
{
    use HasFactory,Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'indicador_anos_id',
        'titulo',
        'descricao',
        'valor_atual',
        'valor_meta',
        'data_registro',
        'active',
    ];

    
// public function getById($id)
// {
//    if(!is_numeric($id) || !is_integer(($id))){
//        report("ERRO: parametro id não é valido");
//        return false;
//    }
//        try {    
//           $indicador = self::where('id',$id)->get();
//             foreach ($indicador as $value) {
//                 $indicador_anos = DB::table('indicadores_anos')->where('indicador_id',$value->id);
//                 foreach ($indicador_anos as $anos) {
//                     $arr2[] = array(
//                         'id' => $anos->id,
//                         'titulo' => $anos->titulo,
//                         'justificativa' => $anos->justificativa,
//                         'ano' => $anos->ano,
//                         'valor' => $anos->valor,
//                         'data' => $anos->data_registro
//                     );
//                 }
//                 $arr[] = array(
//                     'id' => $value->id,
//                     'indicador_anos'  => $arr2,
//                     'titulo'        => $value->titulo,
//                     'descricao'     => $value->descricao,
//                     'justificativa' => $value->justificativa,
//                     'valor_inicial' => $value->valor_inicial,
//                     'valor'         => $value->valor,
//                     'valor_final'   => $value->valor_final,
//                     'data_registro' => $value->data_registro,
//                 );
//             }
          
//           return json_encode($arr);
//        } catch (\Throwable $e) {
//            report($e);
//            return false;
//        }

// }

    // public function indicador($id)
    // {
    //     $data  = $this->where('id',$id)->get();
        
    //     if(count($data)){
    //         foreach ($data as $value) {
    //             $arr[] = array(
    //                 "id"            => $value->id,
    //                 "titulo"        => $value->titulo,
    //                 "descricao"     => $value->descricao,
    //                 "metas"         => $value->metas,
    //                 "valor_inicial" => $value->valor_inicial,
    //                 "valor"         => $value->valor,
    //                 "valor_final"   => $value->valor_final,
    //                 "data_registro" => $value->data_registro
    //             );
    //         }
    //         return $arr;
    //     }else{
    //         return false;
    //     }  

    // } 
    
    public function adminViewData()
    {
        $view = self::all();
        for ($i=0; $i < count($view); $i++) { 
            $arr[] = $view[$i];
        }
        return $arr;
    }

    public function getById($id)
    {
        $view = self::where('id',$id);
        for ($i=0; $i < count($view); $i++) { 
            $arr[] = $view[$i];
        }
        return $arr;
    }

}
