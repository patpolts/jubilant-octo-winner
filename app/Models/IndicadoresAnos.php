<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;
use Exception;

class IndicadoresAnos extends Model
{
    use HasFactory,Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'indicador_id',
        'titulo',
        'ano',
        'valor',
        'data_registro',
        'active',
    ];
    protected $table = 'indicadores_anos';

    public function adminViewData()
    {
        $view = self::all();
        foreach ($view as  $value) {
            $arr[] = $value;
        }
    
        return $arr ?? [];
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
                    'indicador_id' => $value->indicador_id,
                    'ano' => $value->ano,
                    'data_registro' => $value->data_registro,
                    'active' => $value->active
                ];
            }
            return $arr[0];
        }else{
            return false;
        }
       
    }


    public function edit($arr,$id)
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

    public function add($arr)
    {
        $data = self::insert($arr);
        if($data){
            return $data;
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
            return $arr ?? [];
        }else{
            return false;
        }
       
    }

}
