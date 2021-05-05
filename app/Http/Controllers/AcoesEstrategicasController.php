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

    public function add(Request $request, Eixos $eixos, ObjetivosEstrategicos $objetivo, GrandesTemas $temas, AcoesEstrategicas $acoes)
    {
        
         if($request->isMethod('post') && $request->input('_token')){

            $this->validate($request,[
                'titulo' => 'max:255|required|string',
                'ano' => 'required|integer|max:4',
                'valor' => 'required|integer|max:4',
            ]);

            $arr[] = array(                  
                'eixo_id'             => $request->dataEixos,
                'objetivo_id'         => $request->dataObjetivos,
                'tema_id'             => $request->dataTemas,          
                'titulo'              => $request->dataTitulo,            
                'descricao'           => $request->dataDescricao,
                'justificativa'       => $request->dataJustificativa,
                'objetivo_especifico' => $request->dataObjetivoEspecifico,
                'ator'                => $request->dataAtor,
                'desempenho'          => $request->dataDesempenho,             
                'data_registro'       => $request->dataRegistro,              
                'active'              => $request->dataAtivo, 
            );
            $add = $acoes->add($arr);

            if($add){
                $message = "Ação ".$add." adicionado com sucesso";
            }else{
                $message = "Erro ao adicionar ação";
            }

         }else{

            $formInfo = array(
                'eixoSelect'     => $eixos->getSelectData(),
                'objetivoSelect' => $objetivo->getSelectData(),
                'temaSelect'     => $temas->getSelectData(),
                'atorSelect'     => [],
            );

         }

         $this->contentView = array(
            "header_title" => " | ".$this->routeTitle." (add)",
            "title"        => $this->routeTitle,
            "content"      => "edit",
            "results"      => $indicadorSelect ?? [],
            "url"          => $request->url(),
            "message"      => $message ?? null,
        );

        return view('admin.acoes_add',$this->contentView);
    }

/**
 * EDIT
 */
    public function edit(Request $request, AcoesEstrategicas $acoes)
    {
        if($request->idcAnosId){ 
            $id = $request->idcAnosId;
            $data = $acoes->getById($id);
            
            if($request->isMethod('post') && $request->input('_token')){
           
                $arr[] = array(                
                    'indicador_id'      => $request->dataIndicador != $data[0]->indicador_id ? $request->dataIndicador : null,
                    'ano'               => $request->dataAnos != $data[0]->ano ? $request->dataAnos : null,
                    'titulo'            => $request->dataTitulo != $data[0]->titulo ? $request->dataTitulo : null,
                    'valor'             => $request->dataValor != $data[0]->valor ? $request->dataValor : null,
                    'data_registro'     => $request->dataRegistro != $data[0]->data_registro ? $request->dataRegistro : null,
                    'active'            => $request->dataAtivo != $data[0]->active ? $request->dataAtivo : null,
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
                            'id'            => $value->id, 
                            'dataIndicador' => $value->indicador_id ?? null,
                            'dataAnos'      => $value->ano ?? null,
                            'dataTitulo'    => $value->titulo ?? null,
                            'dataValor'     => $value->valor ?? null,
                            'dataRegistro'  => $value->data_registro ?? null,
                            'dataAtivo'     => $value->active ?? null,
                        );
                    }
                    $message = null;
                    $indicadoresData = $arr;
                    
                }
            }
            // print_r('<pre>');
            // print_r($indicadoresData);
            $this->contentView = array(
                "header_title" => " | Indicadores Anos (edit)",
                "title" => "Indicadores Anos",
                "content" => "edit",
                "results" => $indicadoresData ?? [],
                "url" => $request->url(),
                "message" => $message ?? null
            );

            return view('admin.acoes_edit',$this->contentView);

        }else{
            return false;
        }
    }
}
