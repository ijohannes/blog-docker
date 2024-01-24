@extends('dashboard')

@section('title')
Editar artículos
@endsection

@section('ventana')

@include('flash::message')
    {!! Form::open(['route' => ['articulos.update', $articulo], 'method' => 'PUT']) !!}
        <div class="form-group col-md-3">
            {!! Form::label('titulo', 'Titulo del artículo') !!} 
            {!! Form::text('titulo', $articulo->titulo, ['class' => 'form-control', 'placeholder' => 'Titulo del artículo...' , 'required']) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('categoria_id', 'Categoria') !!}
            {!! Form::select('categoria_id', $categorias, $articulo->categoria->id, ['class' => 'form-control', 'placeholder' => 'Seleccione...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('contenido', 'Contenido de la noticia') !!} <br>
            {!! Form::textarea('contenido', $articulo->contenido, ['class' => 'form-control', 'placeholder' => 'Contenido...' , 'required']) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('descripcion', 'Breve descripción del artículo') !!} <br>
            {!! Form::textarea('descripcion', $articulo->descripcion, ['class' => 'form-control', 'placeholder' => 'Texto descriptivo...' , 'required']) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('video', 'URL del video') !!} 
            {!! Form::text('video', $articulo->video, ['class' => 'form-control', 'placeholder' => 'Pegar URL del video...' , 'required']) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('tags', 'Tags') !!} <br>
            {!! Form::select('tags[]', $tags, $my_tags, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::submit('Editar artículo', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection

@section('js')
    <script>
        $(".select-tag").chosen({
            placeholder_text_multiple: 'Seleccione un máximo de 3 tags',
            max_selected_options: 3,
            search_contains:true,
            no_results_text: 'No se encontraron resultados'
        });

        $(".textarea-content").trumbowyg();

    </script>
@endsection