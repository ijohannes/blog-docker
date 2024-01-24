<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use App\Http\Requests;
use App\categoria;
use Laracasts\Flash\Flash;

class CategoriasController extends Controller
{
    /**
     * Función para la vista index donde se listan las categorías creadas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = categoria::orderBy('id', 'ASC')->paginate(5);
        return view('admin.categorias.index')->with('categorias',$categorias);

    }

    /**
     * Muestra la vista crear categoría
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Recibe el método POST del a vista create de categorías
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $categoria = new categoria($request->all());
        $categoria->save();

        Flash::success('La categoria ' . $categoria->nombreCat . ' ha sido creada con exito');
        return redirect()->route('categorias.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Función para la vista editar categorías
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = categoria::find($id);
        return view('admin.categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Función para actualizar información de una categoría
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();

        Flash::warning('La categoría ' . $categoria->nombreCat . ' ha sido editada con éxito!');
        return redirect()->route('categorias.index');
    }

    /**
     * Función para eliminar una categoría seleccionada
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        Flash::error('La categoría ' . $categoria->nombreCat . ' ha sido borrada con éxito!');
        return redirect()->route('categorias.index');
    }
}
