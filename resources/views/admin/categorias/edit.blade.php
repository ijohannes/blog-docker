@extends('dashboard')

@section('title')
Editar categoria
@endsection

@section('ventana')

    @include('flash::message')
    {!! Form::open(['route' => ['categorias.update',$categoria], 'method' => 'PUT']) !!}
        <div class="form-group col-md-6">
            {!! Form::label('nombreCat', 'Nombre de la categoría') !!} <br>
            {!! Form::text('nombreCat', $categoria->nombreCat, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection()


<!-- @section('js')
        <script>
            $('#textarea-content').trumbowyg();
        </script>
@endsection() -->