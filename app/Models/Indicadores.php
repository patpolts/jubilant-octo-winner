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
        'rels',
        'titulo',
        'descricao',
        'justificativa',
        'ano_inicial',
        'ano_final',
        'status_atual',
        'status_final',
        'status',
    ];
    
    protected $atributes = [
        'active' => true,
    ];

    protected $casts = [
        'rels' => 'array',
        'types' => 'array',
        'categorias' => 'array',
        'tags' => 'array',
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
