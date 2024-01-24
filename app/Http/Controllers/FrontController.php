<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulo;
use Carbon\Carbon;
use App\categoria;
use App\tag;
use App\SluggableInterface;


class FrontController extends Controller
{

    
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    /**
     * Función para la vista index del front desde la cual se listan los artículos
     * creados con un máximo de 3 para evitar cansancio en el usuario de mover 
     * muco el scroll
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = articulo::orderBy('id','Desc')->paginate(3);
        $articulos->each(function($articulos){
            $articulos->categoria;
            $articulos->imagenes;
        });
        return view('front.index')
        ->with('articulos', $articulos);
    }

    /*
    * Con esta función se realiza la relación entre artículos y categorías, de igual manera
    * se define la relación con las imágenes de cada artículo que se muestra en el index del 
    * blog (View composer - AsideComposer.php)
    */
    public function searchCategoria($nombreCat)
    {
        $categoria = categoria::searchCategoria($nombreCat)->first();
        $articulos = $categoria->articulos()->paginate(4);
        $articulos->each(function($articulos){
            $articulos->categoria;
            $articulos->imagenes;
        });

        return view('front.index')
        ->with('articulos', $articulos);
    }

    /**
     * De igual manera que la anterior función (View composer - AsideartComposer.php)
     */
    public function searchTag($nombreTag)
    {
        $tag = tag::searchTag($nombreTag)->first();
        $articulos = $tag->articulos()->paginate(4);
        $articulos->each(function($articulos){
            $articulos->categoria;
            $articulos->imagenes;
        });
        
        return view('front.index')
        ->with('articulos', $articulos);

    }

    /**
     * Valida que el artículo seleccionado exista su slug para mostrarse 
     * en una vista independiente
     */
    public function viewArticulo($slug)
    {
        
        $articulo = articulo::where('slug','=', $slug)->firstOrFail(); 
        return redirect()->route('front.view.articulo', compact('articulo'));
        
    }

}
