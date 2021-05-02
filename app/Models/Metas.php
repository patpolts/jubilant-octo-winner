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
        'objetivo_id',                   
        'eixo_id',                   
        'ods_id',                    
        'pne_id',                    
        'titulo',                    
        'descricao',                 
        'valor',                 
        'valor_inicial',                 
        'data_registro',                 
        'active',                    
    ];

    /**
     * 
     */
    protected $atributes = [
    ];

    protected $casts = [
    ];
    // protected $indicador, $indicadorAnos, $metasData;

    
    public function getMetas()
    {
       $metas = self::where('active',true)->get();
        if(count($metas) >= 1){
            foreach ($metas as $value) { 

                // $indicadores   = $this->indicador->where('id',$value->indicador_id)->get();
                $arr[] = array(
                    'id' => $value->id,
                    'indicador_id' => $value->indicador_id,                  
                    'objetivo_id' => $value->objetivo_id,                   
                    'eixo_id' => $value->eixo_id,                   
                    'ods_id' => $value->ods_id,                    
                    'pne_id' => $value->pne_id,                    
                    'titulo' => $value->titulo,                    
                    'descricao' => $value->descricao,                 
                    'valor' => $value->valor,                 
                    'valor_inicial' => $value->valor_inicial,                 
                    'data_registro' => $value->data_registro,                 
                    'active' => $value->active,        
                );
                        

            }
            $this->setMetasData($arr);
            return $this->getMetasData();
        }
    }

    public function adminViewData()
    {
        $view = self::all();
        if(count($view) >= 1){
            for ($i=0; $i < count($view); $i++) { 
                $arr[] = $view[$i];
            }
            return $arr;
        }
        return [];
    }
/**
 * @arr = ['field' => 'value']
 */
    public function adminEditData($arr,$id)
    {
        if(is_array($arr)){
            foreach ($arr as $key => $value) {
                # code...
            }
        }
    }
    public function adminAddData()
    {
        $view = self::all();
        if(count($view) >= 1){
            for ($i=0; $i < count($view); $i++) { 
                $arr[] = $view[$i];
            }
            return $arr;
        }
        return [];
    }

    public function getById($id)
    {
        $view = self::where('id',$id);
        for ($i=0; $i < count($view); $i++) { 
            $arr[] = $view[$i];
        }
        return $arr;
    }

    public function getRelated($id)
    {
        //
    }

    public function getMetasData()
    {
        return $this->metasData;
    }
    public function setMetasData($arr)
    {
        $this->metasData = $arr;
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
