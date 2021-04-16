<?php

/** 
 * TODO:
 * response api  */


namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Eixos;
use App\Models\GrandesTemas;
use App\Models\Indicadores;
use App\Models\ObjetivosEstrategicos;
use App\Models\PlanoAcao;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $contentView = array();
    public $isMobile = false;

    public function __construct()
    {   
        //
    }
    public function index(Request $request)
    {

        // $x =  BaseController::statusIndicadores();
        
      $statusIndicadores =   $this->statusIndicadores();

        $this->contentView = array(
            "header_title" => "PDI ",
            "title" => "PDI - Home",
            "site_url" => getenv('APP_URL'),
            "mobile" => $this->isMobile,
            "isHome" => true,
            "navmenu" => array(
                0 => array(
                    "title" => "início",
                    "link" => $request->getUri(),
                    "tab" => "home",
                    "role" => "presentation",
                    "class" => "nav-item ",
                    "item_class" => "active"
                    ),
                1 => array(
                    "title" => "sobre o pdi",
                    "link" => $request->getUri().'sobre',
                    "tab" => "sobre",
                    "role" => "presentation",
                    "class" => "nav-item",
                    "item_class" => ""
                    ),
                2 => array(
                    "title" => "contato",
                    "link" => $request->getUri(),
                    "tab" => "contato",
                    "role" => "presentation",
                    "class" => "nav-item",
                    "item_class" => ""
                    )
            ),
            "data" => array(
                "status_indicadores" =>   $statusIndicadores
            )
        );

        return view('home', $this->contentView);
    }
    public function sobre(Request $request)
    {

        // $x =  BaseController::statusIndicadores();
        
      $statusIndicadores =   $this->statusIndicadores();

        $this->contentView = array(
            "header_title" => "PDI ",
            "title" => "PDI - Home",
            "mobile" => $this->isMobile,
            "isHome" => false,
            "navmenu" => array(
                0 => array(
                    "title" => "início",
                    "link" => getenv('APP_URL'),
                    "tab" => "home",
                    "role" => "presentation",
                    "class" => "nav-item",
                    "item_class" => "border-0"
                    ),
                1 => array(
                    "title" => "sobre o pdi",
                    "link" => '',
                    "tab" => "sobre",
                    "role" => "presentation",
                    "class" => "nav-item",
                    "item_class" => "active border-0"
                    ),
                2 => array(
                    "title" => "contato",
                    "link" => $request->getUri(),
                    "tab" => "contato",
                    "role" => "presentation",
                    "class" => "nav-item",
                    "item_class" => "border-0"
                    )
            ),
            "dummySelect" => array(
                0 => "1. Ética, integridade e respeito à coisa pública",
                1 => "2. Defesa da vida,  da educação pública e da dignidade humana",
                2 => "3. Autonomia universitária",
                3 => "4. Compromisso  público e social com a redução das desigualdades",
                4 => "5. Democracia, transparência e equidade",
                5 => "6. Liberdade de pensamento e de expressão",
                6 => "7. Cooperação, solidariedade e empatia",
                7 => "8. Qualidade e relevância no ensino, pesquisa e extensão",
                9 => "9. Unidade na diversidade, com pluralismo científico e formação crítica",
                9 => "10. Sustentabilidade e responsabilidade socioambiental",
            ),
            "data" => array(
                "status_indicadores" =>   $statusIndicadores
            )
        );

        return view('sobre', $this->contentView);
    }

    public function statusIndicadores()
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
   /***
    * Objetivos estrategicos
    */
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
