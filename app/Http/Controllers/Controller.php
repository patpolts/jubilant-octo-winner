<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Eixos;
use App\Models\GrandesTemas;
use App\Models\Indicadores;
use App\Models\ObjetivosEstrategicos;
use App\Models\AcoesEstrategicas as PlanoAcao;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Providers\AppServiceProvider;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->contentView = [];
    }

    public function adminIndex(Request $request)
    {
        $this->contentView = array(
            "header_title" =>  "| Admin (home)",
            "title" => "Dashboard",
            "content" => "view",
            "results" => [],
        );
        return view('dashboard',$this->contentView);
    }
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
    public function viewGrandeTema(Request $request, GrandesTemas $grandesTemas)
    {
        $this->contentView = array(
            "header_title" => " |  Grandes Temas (view)",
            "title" => "Grandes Temas",
            "results" => $grandesTemas->getGrandeTemasData(),
        );
        print_r($grandesTemas->getGrandeTemasData());
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
    
    public function validaData($msg,$param = '')
    {
        $this->contentView = array(
            "header_title" =>  "| Admin (metas)",
            "title" => "Metas",
            "content" => "view",
            "results" => ['error' => $msg],
        );
        return true;
    }


    function array_remove_empty($haystack)
    {
        foreach ($haystack as $key => $value) {
            if (is_array($value)) {
                $haystack[$key] = $this->array_remove_empty($haystack[$key]);
            }

            if (empty($haystack[$key])) {
                unset($haystack[$key]);
            }
        }

        return $haystack;
    }
   
}
