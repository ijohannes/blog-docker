<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\tag;
use Laracasts\Flash\Flash;

class TagsController extends Controller
{
    /**
     * Función para la vista de tags creados con sus botones de editar y eliminar.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = tag::orderBy('id', 'ASC')->paginate(5);
        return view('admin.tags.index')->with('tags',$tags);
    }

    /**
     * Función que muestra la vista create de tags
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Funcíon que recibe el método post del formulario de create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag = new tag($request->all());
        $tag->save();

        Flash::success('El tag ' . $tag->nombreTag . ' ha sido creada con exito');
        return redirect()->route('tags.create');
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
     * Muestra la vista editar para realizar modificaciones de los tags buscando por
     * el id de cada tag
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = tag::find($id);
        return view('admin.tags.edit')->with('tag', $tag);
    }

    /**
     * Función para actualizar los tags
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = tag::find($id);
        $tag->fill($request->all());
        $tag->save();

        Flash::warning('El tag ' . $tag->nombreTag . ' ha sido editada con éxito!');
        return redirect()->route('tags.index');
    }

    /**
     * Función para eliminar un tag seleccionado y su parametro es id del tag
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = tag::find($id);
        $tag->delete();

        Flash::error('El tag ' . $tag->nombreTag . ' ha sido borrado con éxito!');
        return redirect()->route('tags.index');
    }
}
