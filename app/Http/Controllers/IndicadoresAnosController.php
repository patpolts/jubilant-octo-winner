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
    
    public function view( IndicadoresAnos $indicadoresAnos, Indicadores $indicadores)
    {
        $idca = $indicadoresAnos->adminViewData();
        if($idca){
            $idcSelect = $indicadores->getSelectData(); 
            foreach ($idca as  $value) {
                $idc = $indicadores->getById($value->indicador_id); 
                $arr[] = array(                
                    'id'            => $value->id,
                    'indicador'     => $idc["titulo"],
                    'titulo'        => $value->titulo,
                    'ano'           => $value->ano,
                    'valor'         => $value->valor,
                    'data_registro' => $value->data_registro,
                    'active' => 1,
                );
            }
        }

            $data["indicadores"] = $idcSelect;
            $data["indicadores_anos"] = $arr;
            $this->contentView = array(
                "header_title" => " | Indicadores Anos(view)",
                "title" => "Indicadores Anos",
                "content" => "view",
                "results" => $data ?? array(),
                "message" => null,
            );
            return view('admin.indicadores_anos', $this->contentView);
      
    }

    public function add(Request $request, Indicadores $indicadores, IndicadoresAnos $indicadoresAnos)
    {
        
         $indicadorSelect = $indicadores->getSelectData();
         if($request->isMethod('post') && $request->input('_token')){

            $this->validate($request,[
                'dataTitulo' => 'max:255|required|string',
            ]);

            $arr[] = array(                
                'indicador_id' => $this->validaData($request->dataIndicador,"integer"),
                'titulo'        => $this->validaData($request->dataTitulo,"string"),
                'ano'           => $this->validaData($request->dataAno,"ano"),
                'valor'         => $this->validaData($request->dataValor,"integer"),
                'data_registro' => $this->validaData($request->dataRegistro,"date"),
                'active' => 1,
            );
            $add = $indicadoresAnos->add($arr);

            if($add){
                $message = "Ano  adicionado com sucesso";
            }

         }else{
            $message = null;

         }

         $data["indicadores"] = $indicadorSelect;

         $this->contentView = array(
            "header_title" => " | Indicadores -> Anos (add)",
            "title"        => "Indicadores -> Anos",
            "content"      => "edit",
            "results"      => $data ?? [],
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
