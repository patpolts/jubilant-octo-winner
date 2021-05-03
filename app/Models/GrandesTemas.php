<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User as User;
use Illuminate\Support\Facades\DB;

class GrandesTemas extends Model
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
        'layout',
        'active',
    ];
    
    protected $table = 'grande_tema';

    public $grandeTemasData = array();

    public function __construct()
    {
        $this->acoes = DB::table('acoes');
        $this->objetivos = DB::table('objetivos_estrategicos');

    }

    public function buildTemas()
    {
        $data = self::where('active',1)->get();
        foreach ($data as $key => $value) {
            $arr[] = array(
                'acao_id'     => $value->acao_id,
                'objetivo_id' => $value->objetivo_id,
                'titulo'      => $value->titulo,
                'descricao'   => $value->descricao,
                'layout'      => $value->layout,
                'active'      => $value->active,
            );
        }
       $this->setGrandeTemasData($arr);
       return $this->getGrandeTemasData();
    }

   
    public function adminViewData()
    {
        $view = self::all();
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

    /** Get methods */
    public function getGrandeTemasData()
    {
        return $this->grandeTemasData;
    }
    
    /** Set methods */
    public function setGrandeTemasData($arr)
    {
        $this->grandeTemasData = $arr;
    }
    
}
