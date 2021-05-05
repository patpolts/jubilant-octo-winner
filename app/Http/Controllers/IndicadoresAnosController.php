<?php

namespace App\Http\Controllers;

use App\Models\Indicadores;
use App\Models\IndicadoresAnos;
use App\Models\User as User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class IndicadoresAnosController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function view( IndicadoresAnos $indicadoresAnos)
    {
        $data = $indicadoresAnos->adminViewData();
        if($data){
            $indicadores = $data;
        }else{
            $indicadores = [];
        }
            $this->contentView = array(
                "header_title" => " | Indicadores (view)",
                "title" => "Indicadores",
                "content" => "view",
                "results" => $indicadores,
                "message" => null,
            );
            return view('admin.indicadores_anos', $this->contentView);
      
    }

    public function add(Request $request, Indicadores $indicadores, IndicadoresAnos $indicadoresAnos)
    {
        
         if($request->isMethod('post') && $request->input('_token')){

            $this->validate($request,[
                'titulo' => 'max:255|required|string',
                'ano' => 'required|integer|max:4',
                'valor' => 'required|integer|max:4',
            ]);

            $arr[] = array(                
                'indicador_id' => $request->dataIndicador,
                'titulo'        => $request->dataTitulo,
                'ano'           => $request->dataAno,
                'valor'         => $request->dataValor,
                'data_registro' => $request->dataRegistro,
                'active' => 1,
            );
            $add = $indicadoresAnos->indicadoresAnosAdd($arr);

            if($add){
                $message = "Ano ".$add." adicionado com sucesso";
            }else{
                $message = "Erro ao adicionar ano";
            }

         }else{

            $indicadorSelect = $indicadores->getSelectData();

         }

         $this->contentView = array(
            "header_title" => " | Indicadores -> Anos (add)",
            "title"        => "Indicadores -> Anos",
            "content"      => "edit",
            "results"      => $indicadorSelect ?? [],
            "url"          => $request->url(),
            "message"      => $message ?? null,
        );

        return view('admin.indicadoresAnos_add',$this->contentView);
    }

/**
 * EDIT
 */
    public function edit(Request $request, IndicadoresAnos $indicadoresAnos)
    {
        if($request->idcAnosId){ 
            $id = $request->idcAnosId;
            $data = $indicadoresAnos->getById($id);
            
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
                   
                    $update = $indicadoresAnos->edit($upData,$id);
                }

                if($update){
                    $message = "Indicador Ano ".$update." atualizado com sucesso";
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

            return view('admin.indicadores_anos_edit',$this->contentView);

        }else{
            return false;
        }
    }
}
