<?php

namespace App\Http\Controllers;

use App\Models\Eixos;
use Illuminate\Http\Request;

class EixosController extends Controller
{
    public $routeTitle = 'Eixos';
    
    public function view( Eixos $eixos)
    {
        $data = $eixos->adminViewData();
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
            return view('admin.eixos', $this->contentView);
      
    }

    public function add(Request $request, Eixos $eixos)
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
            $add = $eixos->add($arr);

            if($add){
                $message = "Eixo ".$add." adicionado com sucesso";
            }else{
                $message = "Erro ao adicionar eixo";
            }

         }else{

            $formInfo = array();

         }

         $this->contentView = array(
            "header_title" => " | ".$this->routeTitle." (add)",
            "title"        => $this->routeTitle,
            "content"      => "edit",
            "results"      => $indicadorSelect ?? [],
            "url"          => $request->url(),
            "message"      => $message ?? null,
        );

        return view('admin.eixos_add',$this->contentView);
    }

/**
 * EDIT
 */
    public function edit(Request $request, EixosController $acoes)
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
            $this->contentView = array(
                "header_title" => " | ".$this->routeTitle."  (edit)",
                "title" => $this->routeTitle,
                "content" => "edit",
                "results" => $indicadoresData ?? [],
                "url" => $request->url(),
                "message" => $message ?? null
            );

            return view('admin.eixos_edit',$this->contentView);

        }else{
            return false;
        }
    }
}
