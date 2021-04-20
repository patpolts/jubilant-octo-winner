<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;

class Indicadores extends Model
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
        'descricao',
        'justificativa',
        'valor_inicial',
        'valor',
        'valor_final',
        'data_registro',
        'logs',
        'active',
    ];
    
    protected $atributes = [
        'active' => true,
    ];

    protected $casts = [
        'logs' => 'array',
    ];
    
public function getById($id)
{
   if(!is_numeric($id) || !is_integer(($id))){
       return throw "error";
   }
       try {    
          $data = self::where('id','=',$id)->get();
          $arr = [];
            foreach ($data as $value) {
                $arr[] = array(
                'indicador_id' => $value->id,
                'titulo' => $value->titulo,
                'descricao' => $value->descricao,
                'justificativa' => $value->justificativa,
                'valor_inicial' => $value->valor_inicial,
                'valor' => $value->valor,
                'valor_final' => $value->valor_final,
                'data_registro' => $value->data_registro,
                );
            }
          
          return $arr;
       } catch (\Throwable $th) {
           return throw $th;
       }

}

    public function adminViewData()
    {
        $arr = [];
        $view = self::all();
        for ($i=0; $i < count($view); $i++) { 
            foreach ($this->viewTable as  $key => $value) {
               $arr[$i] = [$key => $value];
            }
        }
        return $arr;
    }
}
