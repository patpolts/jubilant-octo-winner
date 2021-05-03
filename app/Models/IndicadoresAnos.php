<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;

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

    public function adminViewData()
    {
        $arr = [];
        $view = self::all();
        for ($i=0; $i < count($view); $i++) { 
            foreach ($view as  $key => $value) {
               $arr[$i] = [$key => $value];
            }
        }
        return $arr;
    }

    public function getById($id)
    {
        $arr = [];
        $view = self::where('id',$id);
        for ($i=0; $i < count($view); $i++) { 
            foreach ($view as  $key => $value) {
               $arr[$i] = [$key => $value];
            }
        }
        return $arr;
    }

    // public function indicadorAnos($id)
    // {

    //     $data  = $this->where('id',$id)->get();

    //     if(count($data) >= 1){
    //         foreach ($data as $value) {
    //             $arr[]  = array(
    //                 "id" => $value->id,
    //                 "ano" => $value->ano,
    //                 "valor" => $value->valor,
    //                 "justificativa" => $value->justificativa
    //             );
    //         }  

    //         return $arr;
    //     }else{
    //         return false;
    //     }  

    // }
}
