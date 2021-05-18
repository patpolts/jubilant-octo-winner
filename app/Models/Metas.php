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

                $indicadores     = $this->getMetaIndicador($value->indicador_id);
                $indicadoresAnos = $this->getMetaIndicadorAno($value->indicador_id);
                $objetivos       = $this->getMetaObjetivo($value->objetivo_id);
                $eixos           = $this->getMetaEixo($value->eixo_id);
                $ods             = $this->getMetaOds($value->ods_id);
                $pne             = $this->getMetaPne($value->pne_id);
                $final = $indicadores["valor_meta"] ?? 4200;
                $inicial = $indicadoresAnos["valor"] ?? 3200;
                $arr[] = array(
                    'id' => $value->id,
                    'indicadores' => $indicadores,    
                    'indicadores_anos' => $indicadoresAnos,                 
                    'objetivos' => $objetivos,                   
                    'eixos' => $eixos,                   
                    'ods' => $ods,                    
                    'pne' => $pne,                    
                    'titulo' => $value->titulo,                    
                    'descricao' => $value->descricao,                 
                    'valor' => $value->valor,                 
                    'valor_inicial' => $value->valor_inicial,                 
                    'data_registro' => $value->data_registro,                 
                    'active' => $value->active,               
                    'desempenho' => $this->getDesempenho($final,$inicial),            
                );
                        

            }
            
            return $arr;
        }
    }
    public function getDesempenho($final,$inicial)
    {
        return ($final - $inicial) / $inicial * 100;
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

    public function metasEdit($arr,$id)
    {
        if(count($arr) >=1 ){
            $data = self::where('id',$id)->update($arr[0]);
            if($data){
                return $data;
            }
            
        }else{
            return false;
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
        
        $data = self::where('id',$id)->get();
        if($data){
            return $data;
        }else{
            return false;
        }
       
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

    public function getMetaIndicador($id)
    {
        
        if(!$id){
            ddd("Id inválido");
        }
        $data = DB::table('indicadores')->where('id',$id)->get();
        if(count($data) >=1 ){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'id' => $value->id,
                    'titulo' => $value->titulo,
                    'descricao' => $value->descricao,
                    'indicador_anos_id' => $value->indicador_anos_id,
                    'valor_atual' => $value->valor_atual,
                    'valor_meta' => $value->valor_meta,
                    'data_registro' => $value->data_registro,
                    'active' => $value->active
                ];
            }
            return $arr[0];
        }else{
            return false;
        }
    }

    public function getMetaIndicadorAno($id)
    {
        
        if(!$id){
            ddd("Id inválido");
        }
        $data = DB::table('indicadores_anos')->where('indicador_id',$id)->get();
        if(count($data) >=1 ){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'id' => $value->id,
                    'titulo' => $value->titulo,
                    'indicador_id' => $value->indicador_id,
                    'ano' => $value->ano,
                    'valor' => $value->valor,
                    'data_registro' => $value->data_registro,
                    'active' => $value->active
                ];
            }
            return $arr[0];
        }else{
            return false;
        }
    }

    public function getMetaObjetivo($id)
    {
        
        if(!$id){
            ddd("Id inválido");
        }
        $data = DB::table('objetivos_estrategicos')->where('id',$id)->get();
        if(count($data) >=1 ){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'id' => $value->id,
                    'titulo' => $value->titulo,
                    'descricao' => $value->descricao,
                    'justificativa' => $value->justificativa,
                    'data_registro' => $value->data_registro,
                    'active' => $value->active
                ];
            }
            return $arr[0];
        }else{
            return false;
        }
    }

    public function getMetaEixo($id)
    {
        
        if(!$id){
            ddd("Id inválido");
        }
        $data = DB::table('eixos')->where('id',$id)->get();
        if(count($data) >=1 ){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'id' => $value->id,
                    'titulo' => $value->titulo,
                    'descricao' => $value->descricao,
                    'data_registro' => $value->data_registro,
                    'active' => $value->active
                ];
            }
            return $arr[0];
        }else{
            return false;
        }
    }

    public function getMetaOds($id)
    {
        
        if(!$id){
            ddd("Id inválido");
        }
        $data = DB::table('ods')->where('id',$id)->get();
        if(count($data) >=1 ){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'id' => $value->id,
                    'titulo' => $value->titulo,
                    'slug' => $value->slug,
                ];
            }
            return $arr[0];
        }else{
            return false;
        }
    }

    public function getMetaPne($id)
    {
        
        if(!$id){
            ddd("Id inválido");
        }
        $data = DB::table('pnes')->where('id',$id)->get();
        if(count($data) >=1 ){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'id' => $value->id,
                    'titulo' => $value->titulo,
                    'slug' => $value->slug,
                ];
            }
            return $arr[0];
        }else{
            return false;
        }
    }

}
