@extends('dashboard')

@section('title')
Crear categoría
@endsection

@section('ventana')

    @include('flash::message')
    {!! Form::open(['route' => 'categorias.store', 'method' => 'POST']) !!}
        <div class="form-group col-md-6">
            {!! Form::label('nombreCat', 'Nombre de la categoría') !!} <br>
            {!! Form::text('nombreCat', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection()


<!-- @section('js')
        <script>
            $('#textarea-content').trumbowyg();
        </script>
@endsection() -->