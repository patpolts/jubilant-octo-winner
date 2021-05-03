<?php

namespace App\Http\Controllers;

use App\Models\Indicadores;
use App\Models\User as User;
use App\Models\Metas as Metas;
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

class MetasController extends Controller
{
    
    protected $model = Metas::class;


    /**
     * Instantiate a new controller instance.
     *
     * @return void
     * TODO:
     * 
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('log')->only('index');
    //     $this->middleware('subscribed')->except('store');
    // }
   
    /**
     * Display the  view.
     *
     * @return \Illuminate\View\View
     */
    
    public $contentView = array();

    public function __construct()
    {

        // $this->metas         = self::class;
        $this->indicador     = DB::table('indicadores');
        $this->indicadorAnos = DB::table('indicadores_anos');
        $this->objetivos     = DB::table('objetivos_estrategicos');
        $this->eixos         = DB::table('eixos');
        $this->ods           = DB::table('ods');
        $this->pne           = DB::table('pne');

    }

    /**
     * Methods
     */
    public function validaData($msg,$param = '')
    {
        $this->contentView = array(
            "header_title" => config('app.name')." | Admin (metas)",
            "title" => "Metas",
            "content" => "view",
            "results" => ['error' => $msg],
        );
        return true;
    }
   
    public function view(Metas $model,Indicadores $indicadores) {
        
        $dataMetas = $model->adminViewData();
        if($dataMetas){
            $this->contentView["results"] = $dataMetas;
            $this->contentView["message"] = null;
        }else{
            $this->contentView["results"] = [];
            $this->contentView["message"] = "Erro ao trazer metas";
        }

        $this->contentView = array(
            "header_title" => config('app.name')." | Admin (metas)",
            "title" => "Metas",
            "content" => "view",
            
        );
        return view('admin.metas', $this->contentView);
       
        
    }

    /**
     * Display the  view.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, Metas $metas)
    {
        // $dataMetas = $metas->adminEditData($request->,);

    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function addMetas(Request $request, Metas $metas)
    {
        if ($request->is('metas/*')) {
            //
            if($request->isMethod('post') && $request->input('_token')){
                $this->validate($request,[
                    'titulo' => 'max:255'
                ]);
                $arr[] = array(                
                    'titulo'        => $this->validaData($request->dataTitulo) ? $request->dataTitulo : null,                    
                    'descricao'     => $this->validaData($request->dataDescricao) ? $request->dataDescricao : null, 
                    'indicador_id'  => $this->validaData($request->dataIndicadores) ? $request->dataIndicadores : null,                  
                    'objetivo_id'   => $this->validaData($request->dataObjetivos) ? $request->dataObjetivos : null,                   
                    'eixo_id'       => $this->validaData($request->dataEixos) ? $request->dataEixos : null,                   
                    'ods_id'        => $this->validaData($request->dataOds) ? $request->dataOds : null,                    
                    'pne_id'        => $this->validaData($request->dataPne) ? $request->dataPne : null,                    
                    'valor'         => $this->validaData($request->dataValor) ? $request->dataValor : null,                 
                    'valor_inicial' => $this->validaData($request->dataValorInicial) ? $request->dataValorInicial : null,                 
                    'data_registro' => $this->validaData($request->dataRegistro) ? $request->dataRegistro : null, 
                    'active' => 1,
                );

                $updateMetas = $metas->adminAddData($arr);
                if($updateMetas){
                    $message = "Meta ".$updateMetas." adicionada com sucesso";
                }

            }else{
                $message = null;
            }
            $this->contentView = array(
                "header_title" => " | Metas (add)",
                "title" => "Metas",
                "content" => "add",
                "results" => [],
                "url" => $request->url(),
                "message" => $message
            );

            return view('admin.metas_add',$this->contentView);

        }
        
    }
   
   
    /**
     * Cadastra a meta
     *
     */
    public function store(Request $request)
    {
        // $user = Auth::user();

        // $request->validate([
        //     'titulo' => 'required|string|max:255',
        //     'descricao' => 'string|max:2400',
        //     'justificativa' => 'string|max:2400',
        //     'valor_inicial' => 'integer|numeric',
        //     'valor_atual' => 'integer|numeric',
        //     'valor_final' => 'integer|numeric',
        //     'regras' => 'array',
        //     'types' => 'array',
        //     'categorias' => 'array',
        //     'tags' => 'array',
        // ]);

        // $metas = Metas::create([
        //     'titulo' => $request->titulo,
        //     'descricao' => $request->descricao,
        //     'justificativa' => $request->justificativa,
        //     'valor_inicial' => $request->valor_inicial,
        //     'valor_atual' => $request->valor_atual,
        //     'valor_final' => $request->valor_final,
        //     'regras' => $request->regras,
        //     'types' => $request->types,
        //     'categorias' => $request->categorias,
        //     'tags' => $request->tags,
        // ]);
        // if($metas){
        //     return response($metas,200)->json();
        // }else{
        //     return response('{error: "Cadastro Metas"}',503)->json();
        // }
    }
}
