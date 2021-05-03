<?php

namespace App\Http\Controllers;

use App\Models\Indicadores;
use App\Models\User as User;
use App\Providers\RouteServiceProvider;
use Error;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Throw_;
use Throwable;

class IndicadoresController extends Controller
{

    public $contentView = array();

    public function __construct()
    {
        $this->indicadorAnos = DB::table('indicadores_anos');
    }

    public function viewIndicadores( Indicadores $indicadores)
    {
        $data = $indicadores->indicadoresView();

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
            return view('admin.indicadores', $this->contentView);
      
    }

    /**
     * ADD Indicadores.
     *
     * @return \Illuminate\View\
     * TODO: validation
     */
    public function addIndicadores(Request $request, Indicadores $indicadores)
    {
        if ($request->is('indicadores/*')) {
            //
            if($request->isMethod('post') && $request->input('_token')){
                $this->validate($request,[
                    'titulo' => 'max:255'
                ]);
                $arr[] = array(                
                    'indicador_anos_id' => $request->dataAnos ?? null,
                    'titulo' => $request->dataTitulo ?? null,
                    'descricao' => $request->dataDescricao ?? null,
                    'valor_atual' => $request->dataValorAtual ?? null,
                    'valor_meta' => $request->dataValorMeta ?? null,
                    'data_registro' => $request->dataRegistro ?? null,
                    'active' => 1,
                );

                $add = $indicadores->adminAddIndicadores($arr);
                if($add){
                    $message = "Indicadores ".$add." adicionado com sucesso";
                }

            }else{
                $message = null;
            }
            $this->contentView = array(
                "header_title" => " | Indicadores (add)",
                "title" => "Indicadores",
                "content" => "add",
                "results" => [],
                "url" => $request->url(),
                "message" => $message
            );

            return view('admin.indicadores_add',$this->contentView);

        }
        
    }


    /**
     * Edit Indicadores.
     *
     * @return \Illuminate\View\
     * TODO: validation
     */
    public function editIndicadores(Request $request, Indicadores $indicadores)
    {
        if($request->indicadorId){ 
            $id = $request->indicadorId;
            $data = $indicadores->getById($id);
            
            if($request->isMethod('post') && $request->input('_token')){
           
                $arr[] = array(                
                    'indicador_anos_id' => $request->dataAnos != $data[0]->indicador_anos_id ? $request->dataAnos : null,
                    'titulo'            => $request->dataTitulo != $data[0]->titulo ? $request->dataTitulo : null,
                    'descricao'         => $request->dataDescricao != $data[0]->descricao ? $request->dataDescricao : null,
                    'valor_atual'       => $request->dataValorAtual != $data[0]->valor_atual ? $request->dataValorAtual : null,
                    'valor_meta'        => $request->dataValorMeta != $data[0]->valor_meta ? $request->dataValorAtual : null,
                    'data_registro'     => $request->dataRegistro != $data[0]->data_registro ? $request->dataRegistro : null,
                    'active'            => $request->dataAtivo != $data[0]->active ? $request->dataAtivo : null,
                );
                $upData = $this->array_remove_empty($arr);

                if(count($upData) >= 1){
                   
                    $update = $indicadores->indicadoresEdit($upData,$id);
                }

                if($update){
                    $message = "Indicador ".$update." atualizado com sucesso";
                }else{
                    $message = null;
                }

            }else{
                if(count($data) >= 1){
                    foreach ($data as $value) {
                        $arr[] = array(               
                            'id'       => $value->id, 
                            'dataAnos'       => $value->indicador_anos_id ?? null,
                            'dataTitulo'     => $value->titulo ?? null,
                            'dataDescricao'  => $value->descricao ?? null,
                            'dataValorAtual' => $value->valor_atual ?? null,
                            'dataValorMeta'  => $value->valor_meta ?? null,
                            'dataRegistro'  => $value->data_registro ?? null,
                            'dataAtivo'      => $value->active ?? null,
                        );
                    }
                    $message = null;
                    $indicadoresData = $arr;
                    
                }
            }
            // print_r('<pre>');
            // print_r($indicadoresData);
            $this->contentView = array(
                "header_title" => " | Indicadores (edit)",
                "title" => "Indicadores",
                "content" => "edit",
                "results" => $indicadoresData ?? [],
                "url" => $request->url(),
                "message" => $message
            );

            return view('admin.indicadores_edit',$this->contentView);

        }else{
            return false;
        }
    }

    function array_remove_empty($haystack)
    {
        foreach ($haystack as $key => $value) {
            if (is_array($value)) {
                $haystack[$key] = $this->array_remove_empty($haystack[$key]);
            }

            if (empty($haystack[$key])) {
                unset($haystack[$key]);
            }
        }

        return $haystack;
    }
   
}
