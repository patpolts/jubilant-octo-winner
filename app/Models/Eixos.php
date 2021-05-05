<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;

class Eixos extends Model
{
    use HasFactory,Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'data_registro'
    ];

    /**
     * 
     */
    protected $atributes = [
        'active' => true,
    ];

    protected $casts = [
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
            return $arr;
        }else{
            return false;
        }
       
    }

}
