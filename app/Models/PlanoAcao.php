<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoAcao extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eixo_id',
        'objetivo_id',
        'tema_id',
        'nome',
        'descricao',
        'justificativa',
        'ator',
        'desempenho',
        'data_registro',
        'logs',
        'active',
    ];
    
   
    protected $casts = [
        'logs' => 'array',
    ];

    protected $atributes = [
        'active' => true,
    ];

    
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
