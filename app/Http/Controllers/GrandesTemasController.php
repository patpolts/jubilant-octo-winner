<?php

namespace App\Http\Controllers;

use App\Models\GrandesTemas;
use Illuminate\Http\Request;

class GrandesTemasController extends Controller
{
    
    public $routeTitle = 'Grandes Temas';
    
    public function view(GrandesTemas $grandetema)
    {
        $data = $grandetema->adminViewData();
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

    public function add(Request $request, GrandesTemas $grandetema)
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
            $add = $grandetema->add($arr);

            if($add){
                $message = "Grande Tema ".$add." adicionado com sucesso";
            }else{
                $message = "Erro ao adicionar grandetema";
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

        return view('admin.grandetema_add',$this->contentView);
    }

/**
 * EDIT
 */
    public function edit(Request $request, GrandesTemas $grandetema)
    {
        if($request->grandeTemaId){ 
            $id = $request->grandeTemaId;
            $data = $grandetema->getById($id);
            
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
                   
                    $update = $grandetema->edit($upData,$id);
                }

                if($update){
                    $message = "Grande Tema  ".$update." atualizada com sucesso";
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

            return view('admin.grandetema_edit',$this->contentView);

        }else{
            return false;
        }
    }
}
