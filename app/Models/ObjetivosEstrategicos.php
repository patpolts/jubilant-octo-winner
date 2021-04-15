<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivosEstrategicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'metas',
        'indicadores',
        'ouse',
        'nome',
        'descricao',
        'justificativa',
        'logs',
        'data_registro',
        'active',
    ];

    protected $casts = [
        'metas' => 'array',
        'indicadores' => 'array',
        'ouse' => 'array',
        'descricao' => 'string',
        'justificativa' => 'array',
        'logs' => 'array',
        'data_registro' => 'datetime',
        'active' => 'boolean',
    ];

    public function view()
    {
        # code...
    }
    public function addItem($data = [],$where = null)
    {
        $res = 'none';
        if($where){
            $res = self::insert($data)->where($where);
        }else{
            $res = self::insert($data)->where($where);
        }

        return response($res)->json();
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
