<?php

/** 
 * TODO:
 * response api  */


namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Eixos;
use App\Models\GrandesTemas;
use App\Models\Indicadores;
use App\Models\IndicadoresAnos;
use App\Models\Metas;
use App\Models\ObjetivosEstrategicos;
use App\Models\AcoesEstrategicas as PlanoAcao;
use App\Models\Ods;
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
        $this->metas = Metas::class;
    }
    public function index(Request $request, Metas $metas, Indicadores $indicadores, IndicadoresAnos $indicadoresAnos,ObjetivosEstrategicos $objetivos, Ods $ods)
    {
        
      $statusIndicadores =   $this->statusIndicadores();
    //   $metas = 

        $dataMetas = $metas->getMetas();
        // print_r('<pre>');
        // print_r($dataMetas);
        // exit;
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
            "results" => array(
                "metas" =>   $dataMetas ?? array(),
                "objetivos" =>   $objetivos->getSelectData() ?? array(),
                "ods" =>   $ods->getSelectData() ?? array(),
                "anos" =>   $indicadoresAnos->getSelectData() ?? array(),
                "total" => $dataMetas ? count($dataMetas) : 0
            )
        );
        // print_r('<pre>');
        // print_r($this->contentView);

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
                 array("index"=>"0","item"  => "1. Ética, integridade e respeito à coisa pública"),
                 array("index"=>"1","item"  => "2. Defesa da vida,  da educação pública e da dignidade humana"),
                 array("index"=>"2","item"  => "3. Autonomia universitária"),
                 array("index"=>"3","item"  => "4. Compromisso  público e social com a redução das desigualdades"),
                 array("index"=>"4","item"  => "5. Democracia, transparência e equidade"),
                 array("index"=>"5","item"  => "6. Liberdade de pensamento e de expressão"),
                 array("index"=>"6","item"  => "7. Cooperação, solidariedade e empatia"),
                 array("index"=>"7","item"  => "8. Qualidade e relevância no ensino, pesquisa e extensão"),
                 array("index"=>"9","item"  => "9. Unidade na diversidade, com pluralismo científico e formação crítica"),
                 array("index"=>"10","item"  => "10. Sustentabilidade e responsabilidade socioambiental"),
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

    public function metasView(Request $request, Metas $metas, Ods $ods)
    {
       if(isset($request->metasId)){
            $id = $request->metasId;
            $dataMetas = $metas->getTemplateData($id);
            $dataOds = $ods->templateView();
            // print_r($dataOds);

       }else{
           $dataMetas = [];
       }

        $this->contentView = array(
            "header_title" => "PDI ",
            "title" => "PDI - Metas",
            "site_url" => route('home'),
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
            "ods" => $dataOds ?? '',
            "pne" => [
                ['id' => 11,
                'titulo' => 'Educação Profissional'],
                ['id' => 12,
                'titulo' => 'Educação Superior'],
                ['id' => 14,
                'titulo' => 'Pós-graduação'],
                ['id' => 19,
                'titulo' => 'Gestão democrática'],
            ],
            "results" => array(
                "metas" =>   $dataMetas ?? [],
                "total" => $dataMetas ? count($dataMetas) : 0,
            )
        );

        return view('meta', $this->contentView);
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
