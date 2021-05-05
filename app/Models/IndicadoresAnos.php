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
    
        return $arr;
    }

    public function getById($id)
    {
       
        $data = self::where('id',$id);
        foreach ($data as   $value) {
            $arr[] = $value;
        }
        
        return $arr ?? [];
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

    public function indicadoresAnosAdd($arr)
    {
        $data = self::insert($arr);
        if($data){
            return $data;
        }else{
            return false;
        }
       
    }

}
