<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Eixos;
use App\Models\GrandesTemas;
use App\Models\Indicadores;
use App\Models\ObjetivosEstrategicos;
use App\Models\PlanoAcao;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $contentView = array();

    public function getById_indicadores($id)
    {
        return DB::table('indicadores')->where('id','=',$id)->get();
    }

    public function getById_eixos($id)
    {
        return DB::table('eixos')->where('id','=',$id)->get();
    }

    public function getById_objetivos($id)
    {
        return DB::table('objetivos_estrategicos')->where('id','=',$id)->get();
    }

    public function getById_tema($id)
    {
        return DB::table('grandes_temas')->where('id','=',$id)->get();
    }

    /**
     * Display the  view.
     *
     * @return \Illuminate\View\View
     */
    public function viewEixos(Eixos $model)
    {
        $this->contentView["data"] = array(
            "title" => "Eixos",
            "results" => $model::get()
        );

        $this->contentView["header_title"] = "| Eixos (view)";

        return view('admin.eixos', $this->contentView);
    }
    public function viewOuse(ObjetivosEstrategicos $model)
    {
        $this->contentView["data"] = array(
            "title" => "Objetivos Ouse",
            "results" => $model::get()
        );

        $this->contentView["header_title"] = "| Ouse (view)"; 
        return view('admin.ouse', $this->contentView);
    }
    public function viewAcao(PlanoAcao $model)
    {
        $results = [];
        $resAcao = $model::get();
        foreach ($resAcao as $value) {
            $results =  array(
                "acao" => $value, 
                "eixo" => $this->getById_eixos($value['eixo_id']), 
                "objetivo" => $this->getById_objetivos($value['objetivo_id']));
        }

        $this->contentView["data"] = array(
            "title" => "Plano de Ações ",
            "results" => $results,
        );

        $this->contentView["header_title"] = "| Plano de Ações (view)"; 
        return view('admin.acao',$this->contentView);
    }
    public function viewIndicadores(Indicadores $model)
    {
        $this->contentView["data"] = array(
            "title" => "Objetivos Ouse",
            "results" => $model::get()
        );

        $this->contentView["header_title"] = "| Indicadores (view)"; 
        return view('admin.indicadores', $this->contentView);
    }
    public function viewGrandeTema(GrandesTemas $model)
    {
        $this->contentView["data"] = array(
            "title" => "Grandes Temas",
            "results" => $model::get()
        );

        $this->contentView["header_title"] = "| Grandes Temas (view)"; 
        return view('admin.grandetema', [
            'title' => 'Grandes Temas',
            'grandetema' => GrandesTemas::get()
        ]);
    }

    public function GetObjetivos(Request $request, Auth $user, MetasController $metas, Indicadores $indicadores, ObjetivosEstrategicos $objetivos)
    {
        # code...
        //get all objectives
        $arr = [];
        $resObj = $objetivos::get();
        foreach ($objetivos as $key => $value) {
            $arr[] = $value;
        }
        // response()->sendHeaders();
        return $arr;
    }
    
}
