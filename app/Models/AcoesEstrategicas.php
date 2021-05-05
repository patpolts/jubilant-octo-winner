<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Notifications\Notifiable;

class AcoesEstrategicas extends Model
{
    use HasFactory, Notifiable, InteractsWithDatabase;


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
        'ator', //id array
        'desempenho',             
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
    
    public function adminViewData()
    {
        $view = self::all()->toArray();
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
        $view = self::insert($arr);
        if($view == 1){
            return $view;
        }else{
            return false;
        }
       
    }

}
