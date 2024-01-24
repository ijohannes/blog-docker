<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\categoria;
use App\tag;
use App\imagen;
use App\articulo;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Requests\ArticuloRequest;


class ArticulosController extends Controller
{
    /**
     * Esta función muestra el listado de los artículos con un paginate de 5 
     * y con dos enlaces de opción para editar y eliminar el artículo.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $articulos = articulo::orderBy('id', 'DESC')->paginate(5);
        $articulos->each(function($articulos){
            $articulos->categoria;
            $articulos->user;
        });

        return view('admin.articulos.index')
        ->with('articulos',$articulos);
    }

    /**
     * Función para la vista de creación de artículos, adicional a esto se llama a la relación de 
     * categoría donde muestra el nombre y guarda su id, de igual manera para los tags
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = categoria::orderBY('nombreCat', 'ASC')->pluck('nombreCat', 'id');
        $tags = tag::orderBY('nombreTag', 'ASC')->pluck('nombreTag', 'id');

        return view('admin.articulos.create')
            ->with('categorias', $categorias)
            ->with('tags', $tags);
    }

    /**
     * Función que recibe el método post del guardar artículo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Manipulación de imágenes
        //dd($request);
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/articulos/', $name);   
        }

        //Guardar datos del artículo

        $articulo = new articulo($request->all());
        $articulo->user_id = \Auth::user()->id;
        $articulo->slug = str_replace(' ','-',$request->titulo);
        // dd($articulo);
        $articulo->save();

        //Guardar los tags en la tabla muchos a muchos articulo_tag
        $articulo->tags()->sync($request->tags);

        //Guardar ruta de la imagen

        $imagen = new imagen();
        $imagen->nombreImg = $name;
        // $imagen->articulo_id = $articulo->id;
        $imagen->articulo()->associate($articulo);
        $imagen->save();

        Flash::success('Se ha creado el artículo ' . $articulo->titulo . ' satisfactoriamente!');
        return redirect()->route('articulos.index');

        
    }

    /**
     * Para mostrar el artículo en una vista individual
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $articulo = articulo::where('slug','=', $slug)->firstOrFail(); //con este funciona
        $articulo->each(function($articulo){
            $articulo->categoria;
            $articulo->user;
            $articulo->imagenes;
        });

        return view('admin.articulos.verarticulo', compact('articulo'))
        ->with('articulo',$articulo)
        ;
    }

    /**
     * Función para vista editar de los artículos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = articulo::find($id);
        $articulo->categoria;
        $categorias = categoria::orderBy('id','DESC')->pluck('nombreCat','id');
        $tags = tag::orderBy('id','DESC')->pluck('nombreTag','id');

        $my_tags = $articulo->tags->pluck('id')->ToArray();
        
        return view('admin.articulos.edit')
        ->with('categorias',$categorias)
        ->with('articulo',$articulo)
        ->with('tags',$tags)
        ->with('my_tags',$my_tags);
    }

    /**
     * Función para actualizar la edición de un artículo
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articulo = articulo::find($id);
        $articulo->fill($request->all());
        $articulo->save();
        
        $articulo->tags()->sync($request->tags);
        
        Flash::warning('Se ha editado el artículo '. $articulo->titulo . ' de forma exitosa!');
        return redirect()->route('articulos.index');
    }

    /**
     * Elimina un artículo seleccionado desde la vista index de artículos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = articulo::find($id);
        $articulo->delete();

        Flash::error('Se ha eliminado el artículo '. $articulo->titulo . ' Exitosamente!');
        return redirect()->route('articulos.index');
    }
}
