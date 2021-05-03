<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;
use Illuminate\Support\Facades\DB;
use Throwable;

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

                $indicadores   = DB::table('indicadores')->where('id',$value->indicador_id)->get();
                if(count($indicadores) >=1 ){
                    foreach ($indicadores as $idc) {
                       $arr2[] = [
                        'id' => $idc->id,
                        'indicador_anos' => $arr3 ?? [],
                        'titulo' => $idc->titulo,
                        'descricao' => $idc->descricao,
                        'valor_atual' => $idc->valor_atual,
                        'valor_meta' => $idc->valor_meta,
                        'data_registro' => $idc->data_registro,
                       ];
                    }
                }
                $arr[] = array(
                    'id' => $value->id,
                    'indicadores' => $arr2 ?? [],                  
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
    public function homeMetasData()
    {
        $dataMetas = self::where('active',1)->get();

        if(count($dataMetas) >= 1){
            return $dataMetas;
        }else{
            return false;
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
    public function adminEditData($arr)
    {
        if(count($arr) >=1 ){
            #
        }
    }
    public function adminAddData($arr)
    {
        $view = self::insert($arr);
        if($view == 1){
            return $view;
        }else{
            return false;
        }
       
    }

    public function getById($id)
    {
        $view = self::where('id',$id);
        for ($i=0; $i < count($view); $i++) { 
            $arr[] = $view[$i];
        }
        return $arr;
    }

    public function getTemplateData($id)
    {
        $view = self::where('id',$id)->get();
        $arr = [];
        if($view){
            foreach ($view as $value) {
                $indicadores   = DB::table('indicadores')->where('id',$value->indicador_id)->get();
                if(count($indicadores) >=1 ){
                    foreach ($indicadores as $idc) {
                        $anos = DB::table('indicadores_anos')->where('indicador_id',$idc->id)->get()->toArray();
                       $arr2[] = [
                        'id' => $idc->id,
                        'indicador_anos' => $anos ?? [],
                        'titulo' => $idc->titulo,
                        'descricao' => $idc->descricao,
                        'valor_atual' => $idc->valor_atual,
                        'valor_meta' => $idc->valor_meta,
                        'data_registro' => $idc->data_registro,
                       ];
                    }
                }
               $arr[] = array(
                'id'            => $value->id,
                'titulo'        => $value->titulo,                    
                'descricao'     => $value->descricao, 
                'indicadores'   => $arr2 ?? $value->indicador_id,                  
                'objetivo_id'   => $value->objetivo_id,                   
                'eixo_id'       => $value->eixo_id,                   
                'ods_id'        => $value->ods_id,                    
                'pne_id'        => $value->pne_id,                    
                'valor'         => $value->valor,                 
                'valor_inicial' => $value->valor_inicial,                 
                'data_registro' => $value->data_registro, 
               );
            }
            if(count($arr) >= 1){
                return $arr;
            }
        }else{
            return false;
        }

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
