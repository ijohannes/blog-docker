@extends('dashboard')

@section('title')
Crear tags
@endsection

@section('ventana')

    @include('flash::message')
    {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
        <div class="form-group col-md-6">
            {!! Form::label('nombreTag', 'Nombre del nuevo tag') !!} <br>
            {!! Form::text('nombreTag', null, ['class' => 'form-control', 'placeholder' => 'Nombre del tag...' , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection()
