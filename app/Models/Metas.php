<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;
class Metas extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'justificativa',
        'valor_inicial',
        'valor_atual',
        'valor_final',
        'regras',
        'types',
        'categorias',
        'tags',
        'active',
    ];

    /**
     * 
     */
    protected $atributes = [
        'id_rel' => null,
        'active' => true,
    ];

    protected $casts = [
        'regras' => 'array',
        'types' => 'array',
        'categorias' => 'array',
        'tags' => 'array',
    ];
    
    protected $viewTable = [
        'id',
        'titulo',
        'valor_inicial',
        'valor_atual',
        'valor_final',
        'active',
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
