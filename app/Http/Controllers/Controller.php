<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Eixos;
use App\Models\GrandesTemas;
use App\Models\Indicadores;
use App\Models\ObjetivosEstrategicos;
use App\Models\PlanoAcao;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
         $contentView = array();
        
    }
    


    public function viewHome(Request $request)
    {
        $this->contentView = array(
            "header_title" => config('app.name')." | Admin (dashboard)",
            "title" => "Dashboard",
        );
        // return response($this->contentView,200)->header('Content-Type', 'text/json');

       return view('dashboard',$this->contentView);
    }
    public function usersApi(Request $request)
    {
        # code...
        if(isset($request->users->email)){
            $data[] = array(
                ["data"] => $request->user,
                ["message"] => "sucesso",
                ["page"] => [
                    "header_title" => config('app.name')." | Admin (dashboard)",
                    "title" => "Dashboard",
                ]
            );
            return response(json_encode($data),200)->header('Content-Type', 'text/json');
        }
    }
    /**
     * Display the  view.
     *
     * @return \Illuminate\View\View
     */
    public function viewEixos(Eixos $model)
    {
        $this->contentView = array(
            "title" => "Eixos",
            "results" => $model::get()
        );

        $this->contentView["header_title"] = "| Eixos (view)";

        return view('admin.eixos', $this->contentView);
    }
    public function viewOuse(ObjetivosEstrategicos $model)
    {
        $this->contentView = array(
            "header_title" => "Objetivos Ouse (view)",
            "title" => "Objetivos Ouse",
            "results" => $model::get()
        );

        return view('admin.ouse', $this->contentView);
    }
    // public function viewAcao(PlanoAcao $model)
    // {
    //     $results = [];
    //     $resAcao = $model::get();
    //     foreach ($resAcao as $value) {
    //         $results =  array(
    //             "acao" => $value, 
    //             "eixo" => $this->getById_eixos($value['eixo_id']), 
    //             "objetivo" => $this->getById_objetivos($value['objetivo_id']));
    //     }

    //     $this->contentView["data"] = array(
    //         "title" => "Plano de Ações ",
    //         "results" => $results,
    //     );

    //     $this->contentView["header_title"] = "| Plano de Ações (view)"; 
    //     return view('admin.acao',$this->contentView);
    // }
    /** 
     * Indicadores
     * ------------------
     */
    public function viewIndicadores(Indicadores $model)
    {
        $this->contentView = array(
            "title" => "Objetivos Ouse",
            "results" => $model::get()
        );

        $this->contentView["header_title"] = "| Indicadores (view)"; 
        return view('admin.indicadores', $this->contentView);
    }
    public function statusIndicadores(Indicadores $model)
    {
        //hardcoded 
        $hardcoded = array(
            0 => [
                "valor" => "220",
                "legenda" => "não realizada satisfatoriamente"
            ],
            1 => [
                "valor" => "120",
                "legenda" =>  "realizada parcialmente"
            ],
            2 => [
                "valor" => "088",
                "legenda" => "plenamente realizada"
            ]
        );
        return $hardcoded;
    }
    /** 
     * Grande Temas
     * ------------------
     */
    public function viewGrandeTema(GrandesTemas $model)
    {
        $this->contentView = array(
            "title" => "Grandes Temas",
            "results" => $model::get()
        );

        $this->contentView["header_title"] = " Grandes Temas (view)"; 
        return view('admin.grandetema', $this->contentView);
    }

    /** 
     * Ações
     * ------------------
     */
    public function viewAcao(PlanoAcao $model)
    {
        $this->contentView = array(
            "header_title" => " | Admin (Plano de Ações)",
            "title" => "Dashboard",
            "results" => $model::get()
        );
        // return response($this->contentView,200)->header('Content-Type', 'text/json');

       return view('admin.acao',$this->contentView);
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
    
    /**
     * 
     */


    // public function getById_indicadores($id)
    // {
    //     return DB::table('indicadores')->where('id','=',$id)->get();
    // }

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
}
