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

   /**
     * Add View.
     *
     * @return \Illuminate\View\View
     */
    public function add(Request $request, Eixos $eixos)
    {
        if ($request->is('eixos/*')) {
           
            if($request->isMethod('post') && $request->input('_token')){
                $this->validate($request,[
                    'dataTitulo' => 'max:255'
                ]);
                $arr[] = array(                
                    'titulo'        => $this->validaData($request->dataTitulo,"string"),                    
                    'descricao'     => $this->validaData($request->dataDescricao,"string"),                        
                    'data_registro' => $this->validaData($request->dataRegistro,"date"), 
                    'active' => 1, //#hardcoded
                );

                $data = $eixos->add($arr);
                if($data){
                    $message = "Eixos ".$data." adicionada com sucesso";
                }

            }else{
                $message = null;
            }

            $this->contentView = array(
                "header_title" => " | Objetivo Ouse (add)",
                "title" => "Objetivo Ouse",
                "content" => "add",
                "results" => $data ?? array(),
                "url" => $request->url(),
                "message" => $message
            );

            return view('admin.eixos_add',$this->contentView);

        }
        
    }   
   


/**
 * EDIT
 */
    public function edit(Request $request, Eixos $eixos)
    {
        
        if($request->eixosId){ 
            $id = $request->eixosId;
            $data = $eixos->getById($id);
            
            if($request->isMethod('post') && $request->input('_token')){

                // print_r($request->dataTitulo);
                // exit;
                $this->validate($request,[
                    'dataTitulo' => 'max:255'
                ]);
                $arr[] = array(                            
                    'titulo'        => $request->dataTitulo != $data['titulo'] ? $request->dataTitulo : null,                    
                    'descricao'     => $request->dataDescricao != $data['descricao'] ? $request->dataDescricao : null,               
                    'data_registro' => $request->dataRegistro != $data['data_registro'] ? $request->dataRegistro : null, 
                    'active'        => $request->dataAtivo != $data['active'] ? $request->dataAtivo : null
                );

                $upData = $this->array_remove_empty($arr);

                if(count($upData) >= 1){
                    $update = $eixos->edit($upData,$id);
                    $message = $update ? "Objetivo ".$update." atualizado com sucesso" : null;
                }else{
                    $message = "Nada a ser atualizado!";
                }

            }else{

                if(count($data) >= 1){
                    $arr[] = array(               
                        'dataTitulo'        => $data['titulo'] ,                    
                        'dataDescricao'     => $data['descricao'],                    
                        'dataRegistro'      => $data['data_registro'] , 
                        'dataAtivo'         => $data['active']
                    );
                    
                    $message = null;
                    $resData = $arr[0];
                }

            }
            
            $this->contentView = array(
                "header_title" => $this->routeTitle." (edit)",
                "title"        => $this->routeTitle,
                "content"      => "edit",
                "results"      => $resData ?? [],
                "url"          => $request->url(),
                "message"      => $message
            );

            return view('admin.eixos_edit',$this->contentView);

        }else{
            dd("Id não definido");
        }
    }
}
