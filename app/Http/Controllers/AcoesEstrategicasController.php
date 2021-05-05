<?php

namespace App\Http\Controllers;

use App\Models\AcoesEstrategicas;
use App\Models\Eixos;
use App\Models\GrandesTemas;
use App\Models\Indicadores;
use App\Models\ObjetivosEstrategicos;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;



class AcoesEstrategicasController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $routeTitle = 'Ações Estrategicas';
    
    public function view( AcoesEstrategicas $acoes)
    {
        $data = $acoes->adminViewData();
        if($data){
            $resData = $data;
        }else{
            $resData = [];
        }
            $this->contentView = array(
                "header_title" => " | ".$this->routeTitle." (view)",
                "title" => $this->routeTitle,
                "content" => "view",
                "results" => $resData,
                "message" => null,
            );
            return view('admin.acoes', $this->contentView);
      
    }

    /**
     * @param objetivo_especifico
     *  1 = Garantir o adequado funcionamento das estruturas básicas para as atividades de pesquisa e extensão
     *  2 = Aprimorar os fluxos e procedimentos da área de formalização e gestão de recursos para convênios e parcerias
     *  
     */

    public function add(Request $request, Eixos $eixos, ObjetivosEstrategicos $objetivo, GrandesTemas $temas, AcoesEstrategicas $acoes)
    {
        
         if($request->isMethod('post') && $request->input('_token')){

            $this->validate($request,[
                'dataTitulo' => 'max:255|string'
            ]);

            $arr[] = array(                  
                'eixo_id'             => $request->dataEixos,      
                'titulo'              => $request->dataTitulo,            
                'descricao'           => $request->dataDescricao,
                'justificativa'       => $request->dataJustificativa,
                'objetivo_especifico' => $request->dataObjetivoEspecifico,
                'ator'                => $request->dataAtor,
                'desempenho'          => $request->dataDesempenho,             
                'data_registro'       => $request->dataRegistro,              
                'active'              => $request->dataAtivo ?? 1, 
            );
            $add = $acoes->add($arr);

            if($add){
                $message = "Ação ".$add." adicionada com sucesso";
            }else{
                $message = "Erro ao adicionar ação";
            }

         }else{

            $formInfo = array(
                'eixoSelect'     => $eixos->getSelectData() ?? array(),
                'atorSelect'     => array(
                    ["id" => 1, "titulo" => "PROGRAD"],
                    ["id" => 2, "titulo" => "PROPLAN"],
                    ["id" => 3, "titulo" => "STI"],
                ),
            );
         }


         $this->contentView = array(
            "header_title" => " | ".$this->routeTitle." (add)",
            "title"        => $this->routeTitle,
            "content"      => "edit",
            "results"      => $formInfo ?? [],
            "url"          => $request->url(),
            "message"      => $message ?? null,
        );

        return view('admin.acoes_add',$this->contentView);
    }

/**
 * EDIT
 */
    public function edit(Request $request, AcoesEstrategicas $acoes, Eixos $eixos)
    {
        if($request->acoesId){ 
            $id = $request->acoesId;
            $data = $acoes->getById($id);
            
            if($request->isMethod('post') && $request->input('_token')){
           
                $arr[] = array(     
                    'eixo_id'             => $request->dataEixos != $data[0]->eixo_id ? $request->dataEixos : null,       
                    'titulo'              => $request->dataTitulo != $data[0]->titulo ? $request->dataTitulo : null,             
                    'descricao'           => $request->dataDescricao != $data[0]->descricao ? $request->dataDescricao : null, 
                    'justificativa'       => $request->dataJustificativa != $data[0]->justificativa ? $request->dataJustificativa : null, 
                    'objetivo_especifico' => $request->dataObjetivoEspecifico != $data[0]->objetivo_especifico ? $request->dataObjetivoEspecifico : null, 
                    'ator'                => $request->dataAtor != $data[0]->ator ? $request->dataAtor : null, 
                    'desempenho'          => $request->dataDesempenho != $data[0]->desempenho ? $request->dataDesempenho : null,              
                    'data_registro'       => $request->dataRegistro != $data[0]->data_registro ? $request->dataRegistro : null,               
                    'active'              => $request->dataAtivo != $data[0]->active ? $request->dataAtivo : null, 

                );
                $upData = $this->array_remove_empty($arr);

                if(count($upData) >= 1){
                   
                    $update = $acoes->edit($upData,$id);
                }

                if($update){
                    $message = "Ação  ".$update." atualizada com sucesso";
                }else{
                    $message = null;
                }

            }else{
                if(count($data) >= 1){
                    foreach ($data as $value) {
                        $arr[] = array(               
                            'id'                     => $value->id, 
                            'dataEixos'              => $value->eixo_id ?? null, 
                            'dataTitulo'             => $value->titulo ?? null, 
                            'dataDescricao'          => $value->descricao ?? null, 
                            'dataJustificativa'      => $value->justificativa ?? null, 
                            'dataObjetivoEspecifico' => $value->objetivo_especifico ?? null, 
                            'dataAtor'               => $value->ator ?? null, 
                            'dataDesempenho'         => $value->desempenho ?? null, 
                            'dataRegistro'           => $value->data_registro ?? null, 
                            'dataAtivo'              => $value->active ?? null, 
                        );
                    }
                    $message = null;
                    $formInfo = array(
                        'eixoSelect'     => $eixos->getSelectData() ?? array(),
                        'atorSelect'     => array(
                            ["id" => 1, "titulo" => "PROGRAD"],
                            ["id" => 2, "titulo" => "PROPLAN"],
                            ["id" => 3, "titulo" => "STI"],
                        ),
                    );
                    $infoData = array($formInfo,$arr);
                    
                }
            }
            // print_r('<pre>');
            // print_r($infoData);
            $this->contentView = array(
                "header_title" => " | ".$this->routeTitle." (edit)",
                "title" => $this->routeTitle,
                "content" => "edit",
                "results" => $infoData ?? [],
                "url" => $request->url(),
                "message" => $message ?? null
            );

            return view('admin.acoes_edit',$this->contentView);

        }else{
            return false;
        }
    }
}
