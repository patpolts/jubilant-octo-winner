<?php

namespace App\Http\Controllers;

use App\Models\Eixos;
use App\Models\Indicadores;
use App\Models\User as User;
use App\Models\Metas as Metas;
use App\Models\ObjetivosEstrategicos;
use App\Models\Ods;
use App\Models\Pne;
use App\Providers\RouteServiceProvider;
use Error;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Throw_;
use Throwable;

class MetasController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display the  view.
     *
     * @return \Illuminate\View\View
     */
    
    public $contentView = array();

    public function __construct()
    {
        #
    }

    /**
     * Methods
     */
  
   
    public function view(Metas $model,Indicadores $indicadores) {
        
        $dataMetas = $model->adminViewData();
        if(count($dataMetas) >= 1){
            $results = $dataMetas;
            $msg = null;
        }else{
            $results = [];
            $msg = "Erro ao carregar metas";
        }

        $this->contentView = array(
            "header_title" => "| Admin (metas)",
            "title" => "Metas",
            "content" => "view",
            "results" => $results,
            "message" => $msg
            
        );
        return view('admin.metas', $this->contentView);
       
        
    }

    /**
     * Edit.
     *
     * @return \Illuminate\View\View
     */
   
    public function edit(Request $request, Metas $metas, Indicadores $indicadores, ObjetivosEstrategicos $objetivos, Eixos $eixos, Ods $ods, Pne $pne)
    {
        if($request->metasId){ 
            $id = $request->metasId;
            $data = $metas->getById($id);
            $idcSelect = $indicadores->getSelectData();
            $objSelect = $objetivos->getSelectData();
            $eixoSelect = $eixos->getSelectData();
            $odsSelect = $ods->getSelectData();
            $pneSelect = $pne->getSelectData() ? $pne->getSelectData()  : [];
            
            if($request->isMethod('post') && $request->input('_token')){

                $this->validate($request,[
                    'titulo' => 'max:255'
                ]);

                $arr[] = array(                            
                    'titulo'        => $request->dataTitulo != $data[0]->titulo ? $request->dataTitulo : null,                    
                    'descricao'     => $request->dataDescricao != $data[0]->descricao ? $request->dataDescricao : null, 
                    'indicador_id'  => $request->dataIndicadores != $data[0]->indicador_id ? $request->dataIndicadores : null,                  
                    'objetivo_id'   => $request->dataObjetivos != $data[0]->objetivo_id ? $request->dataObjetivos : null,                   
                    'eixo_id'       => $request->dataEixos != $data[0]->eixo_id ? $request->dataEixos : null,                   
                    'ods_id'        => $request->dataOds != $data[0]->ods_id ? $request->dataOds : null,                    
                    'pne_id'        => $request->dataPne != $data[0]->pne_id ? $request->dataPne : null,                    
                    'valor'         => $request->dataValor != $data[0]->valor ? $request->dataValor : null,                 
                    'valor_inicial' => $request->dataValorInicial != $data[0]->valor_inicial ? $request->dataValorInicial : null,                 
                    'data_registro' => $request->dataRegistro != $data[0]->data_registro ? $request->dataRegistro : null, 
                    'active'        => $request->dataAtivo != $data[0]->active ? $request->dataAtivo : null
                );

                $upData = $this->array_remove_empty($arr);

                if(count($upData) >= 1){
                    $update = $metas->metasEdit($upData,$id);
                }

                $update ? $message = "Meta ".$update." atualizado com sucesso" :  $message = null;

            }else{

                if(count($data) >= 1){
                    foreach ($data as $value) {
                        $arr[] = array(               
                            'dataTitulo'        => $value->titulo,                    
                            'dataDescricao'     => $value->descricao, 
                            'dataIndicadores'   => $idcSelect,
                            'dataIndicadoresId' => $value->indicador_id,                  
                            'dataObjetivos'     => $objSelect,                  
                            'dataObjetivosId'   => $value->objetivo_id,                   
                            'dataEixos'         => $eixoSelect,                      
                            'dataEixosId'       => $value->eixo_id,                  
                            'dataOds'           => $odsSelect,                   
                            'dataOdsId'         => $value->ods_id,                  
                            'dataPne'           => $pneSelect,                      
                            'dataPneId'         => $value->pne_id,                    
                            'dataValor'         => $value->valor,                 
                            'dataValorInicial'  => $value->valor_inicial,                 
                            'dataRegistro'      => $value->data_registro, 
                            'dataAtivo'         => $value->active
                        );
                    }
                    $message = null;
                    $resData = $arr;
                }

            }
            
            $this->contentView = array(
                "header_title" => " | Metas (edit)",
                "title"        => "Metas",
                "content"      => "edit",
                "results"      => $resData ?? [],
                "url"          => $request->url(),
                "message"      => $message
            );

            return view('admin.metas_edit',$this->contentView);

        }else{
            return false;
        }
    }

    /**
     * View.
     *
     * @return \Illuminate\View\View
     */
    public function add(Request $request, Metas $metas, Indicadores $indicadores, ObjetivosEstrategicos $objetivos, Eixos $eixos, Ods $ods, Pne $pne)
    {
        if ($request->is('metas/*')) {
            $idcSelect = $indicadores->getSelectData();
            $objSelect = $objetivos->getSelectData();
            $eixoSelect = $eixos->getSelectData();
            $odsSelect = $ods->getSelectData();
            $pneSelect = $pne->getSelectData() ? $pne->getSelectData()  : [];
           
            if($request->isMethod('post') && $request->input('_token')){
                $this->validate($request,[
                    'dataTitulo' => 'max:255'
                ]);
                $arr[] = array(          
                    'titulo'        => $this->validaData($request->dataTitulo,"string"),                    
                    'descricao'     => $this->validaData($request->dataDescricao,"string"), 
                    'indicador_id'  => $this->validaData($request->dataIndicadores,"integer"),                  
                    'objetivo_id'   => $this->validaData($request->dataObjetivos,"integer"),                   
                    'eixo_id'       => $this->validaData($request->dataEixos,"integer"),                   
                    'ods_id'        => $this->validaData($request->dataOds,"integer"),                    
                    'pne_id'        => $this->validaData($request->dataPne,"integer"),                    
                    'valor'         => $this->validaData($request->dataValor,"integer"),                 
                    'valor_inicial' => $this->validaData($request->dataValorInicial,"integer"),                 
                    'data_registro' => $this->validaData($request->dataRegistro,"date"), 
                    'active' => 1, //#hardcoded
                );

                $data = $metas->adminAddData($arr);
                if($data){
                    $message = "Meta ".$data." adicionada com sucesso";
                }

            }else{
                $message = null;

                $data["indicadores"] = $idcSelect;
                $data["objetivos"]   = $objSelect;
                $data["eixos"]       = $eixoSelect;
                $data["ods"]         = $odsSelect;
                $data["pne"]         = $pneSelect;
            }

            $this->contentView = array(
                "header_title" => " | Metas (add)",
                "title" => "Metas",
                "content" => "add",
                "results" => $data,
                "url" => $request->url(),
                "message" => $message
            );

            return view('admin.metas_add',$this->contentView);

        }
        
    }   
   
}