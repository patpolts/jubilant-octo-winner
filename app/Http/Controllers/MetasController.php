<?php

namespace App\Http\Controllers;

use App\Models\Indicadores;
use App\Models\User as User;
use App\Models\Metas as Metas;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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

        public function getById_indicadores($id)
        {
            return DB::table('indicadores')->where('id','=',$id)->get();
        }

    public function view(Metas $model) {
        $dataMetas = $model::get();
        $results = [];
        foreach ($dataMetas as $value) {
            $results =  array(
                "metas" => $value, 
                "indicadores" => parent::getById_indicadores($value['indicador_id']));
        }
        
        $this->contentView = array(
            "header_title" => config('app.name')." | Admin (metas)",
            "title" => "Metas",
            "results" => $results,
        );
        $this->contentView["header_title"] = 'Metas (view) ';
        return view('admin.metas', $this->contentView);
    }

    /**
     * Display the  view.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $metasAll = Metas::all();
        if($request->method() == 'POST' && isset($request->metas_id)){
            $id = $request->metas_id;
            $update = Metas::find($id);
            foreach ($update as $key => $value) {
                if($value != $update->key){
                    $update->key = $value;
                }
            }
            $update->save();
            $message = 'Atualizado com sucesso';
            $metasAll->fresh();
            return response($message,200)->json();
        }else{
            return view('admin.metas_edit', [
                'title' => 'Metas',
                'metas' => $metasAll,
                'message' => ''
            ]);
        }
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function add()
    {
        return view('admin.metas_add', [
            'title' => 'Metas',
            'metas' => Metas::get()
        ]);
    }
   
   
    /**
     * Cadastra a meta
     *
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'string|max:2400',
            'justificativa' => 'string|max:2400',
            'valor_inicial' => 'integer|numeric',
            'valor_atual' => 'integer|numeric',
            'valor_final' => 'integer|numeric',
            'regras' => 'array',
            'types' => 'array',
            'categorias' => 'array',
            'tags' => 'array',
        ]);

        $metas = Metas::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'justificativa' => $request->justificativa,
            'valor_inicial' => $request->valor_inicial,
            'valor_atual' => $request->valor_atual,
            'valor_final' => $request->valor_final,
            'regras' => $request->regras,
            'types' => $request->types,
            'categorias' => $request->categorias,
            'tags' => $request->tags,
        ]);
        if($metas){
            return response($metas,200)->json();
        }else{
            return response('{error: "Cadastro Metas"}',503)->json();
        }
    }
}
