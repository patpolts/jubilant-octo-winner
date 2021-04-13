<?php

namespace App\Http\Controllers;

use App\Models\Acao;
use App\Models\Eixos;
use App\Models\GrandeTema;
use App\Models\Indicadores;
use App\Models\Ouse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display the  view.
     *
     * @return \Illuminate\View\View
     */
    public function viewEixos()
    {
        return view('admin.eixos', [
            'title' => 'Eixos',
            'eixos' => Eixos::get()
        ]);
    }
    public function viewOuse()
    {
        $ouse =  Ouse::get();
        $indicadores =  Indicadores::get();
        return view('admin.ouse', [
            'title' => 'Objetivo Ouse',
            'ouse' =>  $ouse,
            'indicadores' => $indicadores
        ]);
    }
    public function viewAcao()
    {
        return view('admin.acao', [
            'title' => 'Planos de Ação',
            'acao' => Acao::get()
        ]);
    }
    public function viewIndicadores()
    {
        return view('admin.indicadores', [
            'title' => 'Indicadores',
            'indicadores' => Indicadores::get()
        ]);
    }
    public function viewGrandeTema()
    {
        return view('admin.grandetema', [
            'title' => 'Grandes Temas',
            'grandetema' => GrandeTema::get()
        ]);
    }
    
}
