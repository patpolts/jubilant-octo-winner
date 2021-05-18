<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivosEstrategicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'justificativa',
        'data_registro',
        'active',
    ];

    protected $casts = [
    ];

    protected $atributes = [
    ];

    
    public function adminViewData()
    {
        $data = self::all();
        if(count($data) >=1 ){
            foreach ($data as  $value) {
                $arr[] = $value;
            }
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
            return $arr;
        }else{
            return false;
        }
       
    }

}
