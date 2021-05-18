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

   /**
     * Add View.
     *
     * @return \Illuminate\View\View
     */
    public function add(Request $request, ObjetivosEstrategicos $objetivosOuse)
    {
        if ($request->is('objetivos/*')) {
           
            if($request->isMethod('post') && $request->input('_token')){
                $this->validate($request,[
                    'dataTitulo' => 'max:255'
                ]);
                $arr[] = array(                
                    'titulo'        => $this->validaData($request->dataTitulo,"string"),                    
                    'descricao'     => $this->validaData($request->dataDescricao,"string"),                
                    'justificativa'     => $this->validaData($request->dataJustificativa,"string"),                 
                    'data_registro' => $this->validaData($request->dataRegistro,"date"), 
                    'active' => 1, //#hardcoded
                );

                $data = $objetivosOuse->add($arr);
                if($data){
                    $message = "Objetivo ".$data." adicionada com sucesso";
                }

            }else{
                $message = null;
            }

            $this->contentView = array(
                "header_title" => " | ".$this->routeTitle." (add)",
                "title" => $this->routeTitle,
                "content" => "add",
                "results" => $data ?? array(),
                "url" => $request->url(),
                "message" => $message
            );

            return view('admin.objetivo_ouse_add',$this->contentView);

        }
        
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

                // print_r($request->dataTitulo);
                // exit;
                $this->validate($request,[
                    'dataTitulo' => 'max:255'
                ]);
                $arr[] = array(                            
                    'titulo'        => $request->dataTitulo != $data['titulo'] ? $request->dataTitulo : null,                    
                    'descricao'     => $request->dataDescricao != $data['descricao'] ? $request->dataDescricao : null, 
                    'justificativa'  => $request->dataJustificativa !=$data['justificativa'] ? $request->dataJustificativa : null,                  
                    'data_registro' => $request->dataRegistro != $data['data_registro'] ? $request->dataRegistro : null, 
                    'active'        => $request->dataAtivo != $data['active'] ? $request->dataAtivo : null
                );

                $upData = $this->array_remove_empty($arr);

                if(count($upData) >= 1){
                    $update = $objetivos->edit($upData,$id);
                    $message = $update ? "Objetivo ".$update." atualizado com sucesso" : null;
                }else{
                    $message = "Nada a ser atualizado!";
                }

            }else{

                if(count($data) >= 1){
                    $arr[] = array(               
                        'dataTitulo'        => $data['titulo'] ,                    
                        'dataDescricao'     => $data['descricao'],               
                        'dataJustificativa' => $data['justificativa'],                     
                        'dataRegistro'      => $data['data_registro'] , 
                        'dataAtivo'         => $data['active']
                    );
                    
                    $message = null;
                    $resData = $arr[0];
                }

            }
            
            $this->contentView = array(
                "header_title" => " | ".$this->routeTitle." (edit)",
                "title" => $this->routeTitle,
                "content"      => "edit",
                "results"      => $resData ?? [],
                "url"          => $request->url(),
                "message"      => $message
            );

            return view('admin.objetivo_ouse_edit',$this->contentView);

        }else{
            dd("Id não definido");
        }
    }
}
