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

       return $arr;
    }

    public function adminViewData()
    {
        $data = self::all();
        foreach ($data as  $value) {
            $arr[] = $value;
        }
    
        return $arr ?? [];
    }

    public function getById($id)
    {
        
        $data = self::where('id',$id)->get();
        if($data){
            return $data;
        }else{
            return false;
        }
       
    }


    public function edit($arr,$id)
    {
        if(count($arr) >=1 ){
            $data = self::where('id',$id)->update($arr[0]);
            if($data){
                return $data;
            }
            
        }else{
            return false;
        }
    }

    public function add($arr)
    {
        $data = self::insert($arr);
        if($data){
            return $data;
        }else{
            return false;
        }
       
    }

}
