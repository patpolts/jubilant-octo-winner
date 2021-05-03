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

    public function getRelated($id)
    {
        //
    }

}
