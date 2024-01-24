@extends('dashboard')

@section('title')
Editar tags
@endsection

@section('ventana')

    @include('flash::message')
    {!! Form::open(['route' => ['tags.update',$tag], 'method' => 'PUT']) !!}
        <div class="form-group col-md-6">
            {!! Form::label('nombreTag', 'Nombre del tag') !!} <br>
            {!! Form::text('nombreTag', $tag->nombreTag, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria...' , 'required']) !!}
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