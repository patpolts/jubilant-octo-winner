<?php

namespace App\Http\Controllers;

use App\Models\Ods;
use Illuminate\Http\Request;

class OdsController extends Controller
{
    
    public $routeTitle = 'Ods';
    
    public function view( Ods $ods)
    {
        $data = $ods->adminViewData();
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
            return view('admin.ods', $this->contentView);
      
    }
  

    public function add(Request $request, Ods $ods)
    {
        
         if($request->isMethod('post') && $request->input('_token')){

            // $this->validate($request,[
            //     'titulo' => 'max:255|required|string',
            //     'ano' => 'required|integer|max:4',
            //     'valor' => 'required|integer|max:4',
            // ]);

            $arr[]       =  array(                  
                'titulo' => $request->dataTitulo,
                'slug'   => $request->dataSlug ?? $this->string_to_slug($request->dataTitulo),          
            );
            $add = $ods->add($arr);

            if($add){
                $message = "Ods ".$add." adicionado com sucesso";
            }else{
                $message = "Erro ao adicionar ods";
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

        return view('admin.ods_add',$this->contentView);
    }

/**
 * EDIT
 */
    public function edit(Request $request, Ods $ods)
    {
        if($request->odsId){ 
            $id = $request->odsId;
            $data = $ods->getById($id);
            
            if($request->isMethod('post') && $request->input('_token')){
           
                $arr[] = array(                
                    'titulo'     => $request->dataTitulo != $data[0]->titulo ? $request->dataIndicador : null,
                    'slug'       => $request->dataSlug != $data[0]->slug ? $request->dataAnos : null,
                );
                $upData = $this->array_remove_empty($arr);

                if(count($upData) >= 1){
                   
                    $update = $ods->edit($upData,$id);
                }

                if($update){
                    $message = "Ods  ".$update." atualizada com sucesso";
                }else{
                    $message = null;
                }

            }else{
                if(count($data) >= 1){
                    foreach ($data as $value) {
                        $arr[] = array(               
                            'id'     => $value->id,        
                            'titulo' => $value->titulo,
                            'slug'   => $value->slug,         
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

            return view('admin.ods_edit',$this->contentView);

        }else{
            return false;
        }
    }
}
