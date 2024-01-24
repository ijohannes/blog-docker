<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\categoria;
use App\tag;
use App\imagen;
use App\programa;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Requests\ProgramaRequest;


class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = programa::orderBy('id', 'DESC')->paginate(5);
        $programas->each(function($programas){
            $programas->categoria;
            $programas->user;
        });

        return view('admin.programas.index')
        ->with('programas',$programas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = categoria::orderBY('nombreCat', 'ASC')->pluck('nombreCat', 'id');

        return view('admin.programas.create')
            ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request);
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/programas/', $name);
        }

        //Guardar datos del programa

        $programa = new programa($request->all());
        $programa->user_id = \Auth::user()->id;
        $programa->slug = str_replace(' ','-',$request->titulo);
        // dd($programa);
        $programa->save();

        //Guardar ruta de la imagen

        $imagen = new imagen();
        $imagen->nombreImg = $name;
        // $imagen->articulo_id = $articulo->id;
        $imagen->programa()->associate($programa);
        $imagen->save();

        Flash::success('Se ha creado el programa ' . $programa->titulo . ' satisfactoriamente!');
        return redirect()->route('programas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $programa = programa::where('slug','=', $slug)->firstOrFail(); //con este funciona
        $programa->each(function($programa){
            $programa->categoria;
            $programa->user;
            $programa->imagenes;
        });

        return view('admin.programas.verprograma', compact('programa'))
        ->with('programa',$programa)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa = programa::find($id);
        $programa->categoria;
        $categorias = categoria::orderBy('id','DESC')->pluck('nombreCat','id');
        
        return view('admin.programas.edit')
        ->with('categorias',$categorias)
        ->with('programa',$programa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $programa = programa::find($id);
        $programa->fill($request->all());
        $programa->save();
        
        Flash::warning('Se ha editado el programa de título '. $programa->titulo . ' de forma exitosa!');
        return redirect()->route('programas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programa = programa::find($id);
        $programa->delete();

        Flash::error('Se ha eliminado el programa de título '. $programa->titulo . ' Exitosamente!');
        return redirect()->route('programas.index');
    }
}
