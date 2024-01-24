@extends('dashboard')

@section('title')
Listado de categorías
@endsection

@section('ventana')
@include('flash::message')
<!-- Buscardor de categorias -->
<!-- {!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar navbar-form pull-right']) !!}
    <div class="input-group">
        {!! Form::text('nombreCat', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'aria-describedby' => 'search']) !!}
        <span class="input-group-addon" id="search">
            <span class="fa fa-search-plus" aria-hidden="true"></span>
        </span>
    </div>
{!! Form::close() !!} -->
<!-- Fin del Buscardor de categorias -->
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombreCat }}</td>
                    <td>
                    <a href="{{ route('categorias.edit',$categoria->id) }}" class="btn btn-danger">
                        <span class="fas fa-tools" aria-hidden="true"></span>
                    </a>
                    <a href=" {{ route('categorias.destroy',$categoria->id) }}" onclick="return confirm('Seguro que desea eliminarlo?')" class="btn btn-warning">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<div class="container col-md-4">
</div>
<div class="container col-md-4">
    {!! $categorias->render() !!}
</div>
<div class="container col-md-4">
</div>
@endsection()