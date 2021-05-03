<?php

namespace App\Http\Controllers;

use App\Models\Eixos;
use App\Models\GrandesTemas;
use App\Models\Indicadores;
use App\Models\IndicadoresAnos;
use App\Models\Metas;
use App\Models\ObjetivosEstrategicos;
use App\Models\PlanoAcao;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    /**
     * TODO: 
     * secure token
     */

    protected $metas, $indicadores, $indicadoresAnos, $objetivosEstrategicos;
    
    public function __construct()
    {
        // $this->metas                 = Metas                ::class;
        // $this->indicadores           = Indicadores          ::class;
        // $this->indicadoresAnos       = IndicadoresAnos      ::class;
        // $this->objetivosEstrategicos = ObjetivosEstrategicos::class;
        // $this->grandesTemas          = GrandesTemas         ::class;
        // $this->eixos                 = Eixos                ::class;
        // $this->planosAcao            = PlanoAcao::class;
    }

    public function authToken($request)
    {
        
        if(Auth::user()){
            return $request->user()->user_token;
        }else{
            return response(array('error' => "Usuario não aitenticado"));
        }

    }
    public function home(Request $request, User $user)
    {
        if(!$this->authToken($request)){ 
            $res = [
                "data" => array(
                    "user" => [],
                ),
                "message" => "erro",
            ];
        }else{
            $res = [
                "data" => array(
                    "token" => $request->user()->user_token,
                ),
                "message" => "sucesso",
            ];
        }
        // print_r('<pre>');
        // print_r($res);
        return response($res,200)->header('Content-Type', 'text/json');  
    }


    public function metas(Request $request, Metas $metas)
    {
        // $token = Str::random(60);

        if($this->authToken($request)){

            $usertoken = $request->user()->user_token;
            $query = $metas::where('active',1)->get();
           
            if(count($query) >=1 ){
                foreach ($query as $value) {
                    $data[] = array(
                        'id'            => $value->id,
                        'indicador_id'  => $value->indicador_id,                  
                        'objetivo_id'   => $value->objetivo_id,                   
                        'eixo_id'       => $value->eixo_id,                   
                        'ods_id'        => $value->ods_id,                    
                        'pne_id'        => $value->pne_id,                    
                        'titulo'        => $value->titulo,                    
                        'descricao'     => $value->descricao,                 
                        'valor'         => $value->valor,                 
                        'valor_inicial' => $value->valor_inicial,                 
                        'data_registro' => $value->data_registro,                 
                        'active'        => $value->active,
                    );
                }
                $res = [
                    "data" => array(
                        "metas" => $data,
                    ),
                    "user" => $usertoken,
                    "message" => "sucesso",
                ];
            }else{

                $res = [
                    "data" => array(
                        "error" => "nenhum resultado encontrado",
                    ),
                    "user" => $usertoken,
                    "message" => "error",
                ];

            }
            // print_r('<pre>');
            // print_r($res);
            return response($res,200)->header('Content-Type', 'text/json');  

        }else{

            $res = [
                "data" => array(
                    "user" => [],
                ),
                "message" => ["erro" => "não autenticado"],
            ];
        }
    }

    public function metasAdd(Request $request)
    {
        if($request->method() == 'POST'){
            $res = [
                "data" => array(
                    "user" => Auth::user()->user_token,
                ),
                "message" => "sucess",
            ];  
        }else{
            $res = [
                "data" => array(
                    "user" => Auth::user()->user_token,
                ),
                "message" => "sucess",
            ];

            return $request->data;
        }
        print_r('<pre>');
        print_r($res);
        return response($res,200)->header('Content-Type', 'text/json');  
    }
    public function indicadores(Request $request, User $user)
    {
        # code...
        if($this->authToken($request)){
            $usertoken = Hash::make(Auth::user()->email);
            $query = $this->indicadores::where('active',true)->get();
            $data = [];
            foreach ($query as $key => $value) {
                $query2 = $this->indicadoresAnos::where('indicador_id', $value->id)->get();
                foreach ($query2 as $value2) {
                    $arr[] = array(
                        "id"            => $value2->id,
                        "ano"           => $value2->ano,
                        "justificativa" => $value2->justificativa,
                        "valor"         => $value2->valor,
                        "data_registro" => $value2->data_registro,
                    );
                }
                $data[] = array(
                    "id"            => $value->id,
                    "titulo"        => $value->titulo,
                    "descricao"     => $value->descricao,
                    "anos"          => $value->anos,
                    "metas"         => $value->metas,
                    "valor_inicial" => $value->valor_inicial,
                    "valor"         => $value->valor,
                    "valor_final"   => $value->valor_final,
                    "data_registro" => $value->data_registro,
                    "anos"          => $arr,
                    "active"        => $value->active,
                );
            }
            $res = [
                "data" => array(
                    "user" => $usertoken,
                    "indicadores" => $data,
                ),
                "message" => "sucesso",
            ];
            // print_r('<pre>');
            // print_r($res);
            // $x = json_encode($res)->toJson(JSON_PRETTY_PRINT);
            return response($res,200)->header('Content-Type', 'text/json'); 

        }else{

            $res = [
                "data" => array(
                    "user" => [],
                ),
                "message" => ["erro" => "não autenticado"],
            ];
        }
    }

    public function grandestemas(Request $request, User $user)
    {
        # code...
        if($this->authToken($request)){
            $usertoken = Hash::make(Auth::user()->email);
            $query = $this->grandesTemas::get();
            $data = [];
            foreach ($query as $key => $value) {
                $data[] = array(
                    "id"            => $value->id,
                    "titulo"        => $value->titulo,
                    "descricao"     => $value->descricao,
                    "anos"          => $value->anos,
                    "metas"          => $value->metas,
                    "valor_inicial" => $value->valor_inicial,
                    "valor"         => $value->valor,
                    "valor_final"   => $value->valor_final,
                    "data_registro" => $value->data_registro,
                    "logs"          => $value->logs,
                    "active"        => $value->active,
                );
            }
            $res = [
                "data" => array(
                    "user" => $usertoken,
                    "indicadores" => $data ,
                ),
                "message" => "sucesso",
            ];
            // print_r('<pre>');
            // print_r($query);
            return response($res,200)->header('Content-Type', 'text/json');  
        }else{

            $res = [
                "data" => array(
                    "user" => [],
                ),
                "message" => ["erro" => "não autenticado"],
            ];
        }
    }

    public function objetivos(Request $request, User $user)
    {
        # code...
        if($this->authToken($request)){
            $usertoken = Hash::make(Auth::user()->email);
            $query = $this->objetivosEstrategicos::get();
            $data = [];
            foreach ($query as $key => $value) {
                $data[] = array(
                    "id"            => $value->id,
                    "metas"         => $value->metas,
                    "indicadores"   => $value->indicadores,
                    "ouse"          => $value->ouse,
                    "nome"          => $value->nome,
                    "descricao"     => $value->descricao,
                    "justificativa" => $value->justificativa,
                    "logs"          => $value->logs,
                    "data_registro" => $value->data_registro,
                    "active"        => $value->active,
                );
            }
            $res = [
                "data" => array(
                    "user" => $usertoken,
                    "objetivos" => $data ,
                ),
                "message" => "sucesso",
            ];
            // print_r('<pre>');
            // print_r($res);
            return response($res,200)->header('Content-Type', 'text/json');  
        }else{

            $res = [
                "data" => array(
                    "user" => [],
                ),
                "message" => ["erro" => "não autenticado"],
            ];
        }
    }

    public function eixos(Request $request, User $user)
    {
        # code...
        if($this->authToken($request)){
            $usertoken = Hash::make(Auth::user()->email);
            $query = $this->eixos::get();
            $data = [];
            foreach ($query as $key => $value) {
                $data[] = array(
                    "id"            => $value->id,
                    "titulo"        => $value->titulo,
                    "justificativa" => $value->justificativa,
                    "data_registro" => $value->data_registro,
                    "active"        => $value->active,
                );
            }
            $res = [
                "data" => array(
                    "user" => $usertoken,
                    "eixos" => $data ,
                ),
                "message" => "sucesso",
            ];
            // print_r('<pre>');
            // print_r($res);
            return response($res,200)->header('Content-Type', 'text/json');  
        }else{

            $res = [
                "data" => array(
                    "user" => [],
                ),
                "message" => ["erro" => "não autenticado"],
            ];
        }
    }

    public function acoes(Request $request, User $user)
    {
        # code...
        if($this->authToken($request)){
            $usertoken = Hash::make(Auth::user()->email);
            $query = $this->planosAcao::get();
            $data = [];
            foreach ($query as $key => $value) {
                $data[] = array(
                    "id" => $value->id,
                    "eixo_id"       => $value->eixo_id,
                    "objetivo_id"   => $value->objetivo_id,
                    "tema_id"       => $value->tema_id,
                    "nome"          => $value->nome,
                    "descricao"     => $value->descricao,
                    "justificativa" => $value->justificativa,
                    "ator"          => $value->ator,
                    "desempenho"    => $value->desempenho,
                    "data_registro" => $value->data_registro,
                    "active"        => $value->active,
                );
            }
            $res = [
                "data" => array(
                    "user" => $usertoken,
                    "acoes" => $data ,
                ),
                "message" => "sucesso",
            ];
            // print_r('<pre>');
            // print_r($res);
            return response($res,200)->header('Content-Type', 'text/json');  

        }else{

            $res = [
                "data" => array(
                    "user" => [],
                ),
                "message" => ["erro" => "não autenticado"],
            ];
        }
    }


}
