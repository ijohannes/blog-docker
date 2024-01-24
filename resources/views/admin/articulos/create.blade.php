@extends('dashboard')

@section('title')
Crear artículos
@endsection

@section('ventana')

@include('flash::message')
    {!! Form::open(['route' => 'articulos.store', 'method' => 'POST', 'enctype' => 'multipart/form-data','files' => true]) !!}
        <div class="form-group col-md-6">
            {!! Form::label('titulo', 'Titulo del artículo') !!} 
            {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Titulo del artículo...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('categoria_id', 'Categoria') !!}
            {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('contenido', 'Contenido de la noticia') !!}
            {!! Form::textarea('contenido', null, ['class' => 'form-control', 'placeholder' => 'Contenido...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('descripcion', 'Descripción breve del artículo') !!}
            {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Contenido Descriptivo...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('video', 'URL del video') !!} 
            {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => 'Pegar URL del video...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('tags', 'Tags') !!} <br>
            {!! Form::select('tags[]', $tags, null, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('imagen', 'Imagen') !!} <br>
            {!! Form::file('imagen') !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::submit('Agregar artículo', ['class' => 'btn btn-primary']) !!}
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