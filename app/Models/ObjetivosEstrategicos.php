<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivosEstrategicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'justificativa',
        'data_registro',
        'active',
    ];

    protected $casts = [
    ];

    protected $atributes = [
    ];

    public function view()
    {
        # code...
    }
    public function adminViewData()
    {
        $view = self::all()->toArray();
        for ($i=0; $i < count($view); $i++) { 
            $arr[] = $view[$i];
        }
        return $arr;
    }

    public function getById($id)
    {
        $view = self::where('id',$id);
        for ($i=0; $i < count($view); $i++) { 
            $arr[] = $view[$i];
        }
        return $arr;
    }

    public function getRelated($id)
    {
        //
    }
}
