<?php

namespace App\Http\Controllers;

use App\Models\ObjetivosEstrategicos;
use Illuminate\Http\Request;

class ObjetivosEstrategicosController extends Controller
{
    public $routeTitle = 'Ods';
    
    public function view( ObjetivosEstrategicos $objetivos)
    {
        $data = $objetivos->adminViewData();
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
            return view('admin.objetivos', $this->contentView);
      
    }

    public function add(Request $request, ObjetivosEstrategicos $objetivos)
    {
        
         if($request->isMethod('post') && $request->input('_token')){

            $this->validate($request,[
                'titulo' => 'max:255|required|string',
                'ano' => 'required|integer|max:4',
                'valor' => 'required|integer|max:4',
            ]);

            $arr[] = array(                  
                'titulo'             => $request->dataEixos,
                'slug'         => $request->dataObjetivos,
                'layout'             => $request->dataTemas,                      
                'active'              => $request->dataAtivo, 
            );
            $add = $objetivos->add($arr);

            if($add){
                $message = "Objetivos ".$add." adicionado com sucesso";
            }else{
                $message = "Erro ao adicionar objetivos";
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

        return view('admin.objetivos_add',$this->contentView);
    }

/**
 * EDIT
 */
    public function edit(Request $request, ObjetivosEstrategicos $objetivos)
    {
        if($request->objetivosId){ 
            $id = $request->objetivosId;
            $data = $objetivos->getById($id);
            
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
                   
                    $update = $objetivos->edit($upData,$id);
                }

                if($update){
                    $message = "Objetivo  ".$update." atualizada com sucesso";
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
                    $resData = $arr;
                    
                }
            }
            $this->contentView = array(
                "header_title" => " | ".$this->routeTitle."  (edit)",
                "title" => $this->routeTitle,
                "content" => "edit",
                "results" => $resData ?? [],
                "url" => $request->url(),
                "message" => $message ?? null
            );

            return view('admin.objetivos_edit',$this->contentView);

        }else{
            return false;
        }
    }
}
