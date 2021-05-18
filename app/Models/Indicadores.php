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

    public function indicadoresView()
    {
        $data = self::all();
        if(count($data) >= 1){
            $anosData = '';
           foreach ($data as $value) {
                $anos = DB::table('indicadores_anos')->where('indicador_id',$value->id)->get()->toArray();
                if(count($anos)== 1){
                    $anosData .= $anos[0]->ano;
                }else{
                    foreach ($anos as $idca) {
                        $anosData .= $idca->ano.", ";
                    }
                }
                $arr[] = [
                'id'            => $value->id,
                'anos'          => $anosData,
                'titulo'        => $value->titulo,
                'descricao'     => $value->descricao,
                'valor_atual'   => $value->valor_atual,
                'valor_meta'    => $value->valor_meta,
                'data_registro' => $value->data_registro,
                'active'        => $value->active,
                ];
           }
           return $arr;
        }else{
            return false;
        }
    }

    public function indicadoresEdit($arr,$id)
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
    public function adminAddIndicadores($arr)
    {
        $data = self::insert($arr);
        if($data == 1){
            return $data;
        }else{
            return false;
        }
       
    }
    
    public function adminViewData()
    {
        
        $data = self::all();
        for ($i=0; $i < count($data); $i++) { 
            $arr[] = $data[$i];
        }
        return $arr;
        
    }

    public function getById($id)
    {
        if(!$id){
            ddd("Id inválido");
        }
        $data = self::where('id',$id)->get();
        if(count($data) >=1 ){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'id' => $value->id,
                    'titulo' => $value->titulo,
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

    public function getSelectData()
    {
        $data = self::get();
        if(count($data) >=1 ){
            foreach ($data as $value) {
                $arr[] = [
                    'id' => $value->id,
                    'titulo' => $value->titulo
                ];
            }
            return $arr;
        }else{
            return false;
        }
       
    }

}
