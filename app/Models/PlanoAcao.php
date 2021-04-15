<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;

class PlanoAcao extends Model
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
        'justificativa',
        'nome',
        'descricao',
        'ator',
        'desempenho',
        'logs',
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
        'logs' => 'array',
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
