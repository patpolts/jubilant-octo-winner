<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AcoesEstrategicas extends Model
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [    
        'eixo_id',
        'objetivo_id',
        'tema_id',          
        'titulo',            
        'descricao',
        'justificativa',
        'objetivo_especifico',
        'ator', 
        'desempenho',             
        'data_registro',              
        'active', 
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
        
        $data = self::where('id',$id)->get();
        if($data){
            return $data;
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
