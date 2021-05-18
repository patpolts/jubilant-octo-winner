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
        
          if ($request->is('pne/*')) {
           
            if($request->isMethod('post') && $request->input('_token')){
                $this->validate($request,[
                    'dataTitulo' => 'max:255'
                ]);
                $arr[] = array(                
                    'titulo'        => $this->validaData($request->dataTitulo,"string"),   
                    'slug' => 'none', //#hardcoded
                );

                $data = $pne->add($arr);
                if($data){
                    $message = "Pne ".$data." adicionada com sucesso";
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

            return view('admin.pne_add',$this->contentView);

        }
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

                // print_r($request->dataTitulo);
                // exit;
                $this->validate($request,[
                    'dataTitulo' => 'max:255'
                ]);
                $arr[] = array(                            
                    'titulo'        => $request->dataTitulo != $data['titulo'] ? $request->dataTitulo : null,                    
                    'slug'     => null, 
                );

                $upData = $this->array_remove_empty($arr);

                if(count($upData) >= 1){
                    $update = $pne->edit($upData,$id);
                    $message = $update ? "Pne ".$update." atualizado com sucesso" : null;
                }else{
                    $message = "Nada a ser atualizado!";
                }

            }else{

                if(count($data) >= 1){
                    $arr[] = array(               
                        'dataTitulo'        => $data['titulo'] ,                    
                        'dataSlug'     => $data['slug'],      
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

            return view('admin.pne_edit',$this->contentView);

        }else{
            dd("Id não definido");
        }
    }
}
