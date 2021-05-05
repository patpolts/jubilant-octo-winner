<?php

namespace App\Http\Controllers;

use App\Models\Pne;
use Illuminate\Http\Request;

class PneController extends Controller
{
     
    public $routeTitle = 'Pne';
    
    public function view(Pne $pne)
    {
        $data = $pne->adminViewData();
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
            return view('admin.pne', $this->contentView);
      
    }

    public function add(Request $request, Pne $pne)
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
            $add = $pne->add($arr);

            if($add){
                $message = "Pne ".$add." adicionado com sucesso";
            }else{
                $message = "Erro ao adicionar pne";
            }

         }else{

            $formInfo = array();

         }

         $this->contentView = array(
            "header_title" => " | ".$this->routeTitle." (add)",
            "title"        => $this->routeTitle,
            "content"      => "edit",
            "results"      => $resData ?? [],
            "url"          => $request->url(),
            "message"      => $message ?? null,
        );

        return view('admin.pne_add',$this->contentView);
    }

/**
 * EDIT
 */
    public function edit(Request $request, Pne $pne)
    {
        if($request->pneId){ 
            $id = $request->pneId;
            $data = $pne->getById($id);
            
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
                   
                    $update = $pne->edit($upData,$id);
                }

                if($update){
                    $message = "Pne  ".$update." atualizada com sucesso";
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

            return view('admin.pne_edit',$this->contentView);

        }else{
            return false;
        }
    }
}
