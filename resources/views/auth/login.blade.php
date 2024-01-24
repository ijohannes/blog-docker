@extends('layouts.app')

@section('title')
    Inicio de sesión
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 offset-md-4 main-section">
        <div class="card card-default">
            <div class="card-header">
                <h1 class="card-title text-center">Inicio de sesión</h1>
            </div>
            <div class="card-body">
                {!! Form::open(['route'=>'login', 'method' => 'POST']) !!}
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('cedula') ? 'has-error' : '' }}">
                        {!! Form::label('email', 'email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                        {!!$errors->first('email', '<span class="help-block">:message</span>')!!}
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}} ">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                        {!!$errors->first('password', '<span class="help-block">:message</span>')!!}
                    </div>
                    {!! Form::submit('Acceder', ['class' => 'col-md-4 offset-md-4 btn btn-primary btn-block', 'id' => 'botonAcceder']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
