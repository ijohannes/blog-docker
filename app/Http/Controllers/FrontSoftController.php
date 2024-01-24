<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\programa;
use Carbon\Carbon;
use App\categoria;
use App\tag;
use App\SluggableInterface;

class FrontSoftController extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = programa::orderBy('id','Desc')->paginate(3);
        $programas->each(function($programas){
            $programas->categoria;
            $programas->imagenes;
        });
        return view('front.softapoyo')
        ->with('programas', $programas);
    }


    public function searchCat($nombreCat)
    {
        $categoria = categoria::searchCategoria($nombreCat)->first();
        $programas = $categoria->articulos()->paginate(4);
        $programas->each(function($programas){
            $programas->categoria;
            $programas->imagenes;
        });

        return view('front.softapoyo')
        ->with('programas', $programas);
    }

    public function viewPrograma($slug)
    {
        
        $programa = programa::where('slug','=', $slug)->firstOrFail(); 
        return redirect()->route('front.view.programa', compact('programa'));
        
    }
}
