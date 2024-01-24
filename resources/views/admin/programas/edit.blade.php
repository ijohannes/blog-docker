@extends('dashboard')

@section('title')
Editar programa
@endsection

@section('ventana')

@include('flash::message')
    {!! Form::open(['route' => ['programas.update', $programa], 'method' => 'PUT']) !!}
        <div class="form-group col-md-6">
            {!! Form::label('titulo', 'Titulo del programa') !!} 
            {!! Form::text('titulo', $programa->titulo, ['class' => 'form-control', 'placeholder' => 'Titulo del programa...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('categoria_id', 'Categoria') !!}
            {!! Form::select('categoria_id', $categorias, $programa->categoria->id, ['class' => 'form-control', 'placeholder' => 'Seleccione...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('contenido', 'Contenido del artículo del programa') !!}
            {!! Form::textarea('contenido', $programa->contenido, ['class' => 'form-control', 'placeholder' => 'Contenido...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('descripcion', 'Descripción breve del programa') !!}
            {!! Form::textarea('descripcion', $programa->descripcion, ['class' => 'form-control', 'placeholder' => 'Contenido Descriptivo...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('video', 'URL del video') !!} 
            {!! Form::text('video', $programa->video, ['class' => 'form-control', 'placeholder' => 'Pegar URL del video...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::submit('Editar programa', ['class' => 'btn btn-primary']) !!}
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