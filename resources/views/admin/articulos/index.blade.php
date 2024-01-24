@extends('dashboard')

@section('title')
Listado de artículos
@endsection

@section('ventana')
@include('flash::message')

<table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Título</th>
            <th>Categoría</th>
            <th>Usuario</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach($articulos as $articulo)
                <tr>
                    <td>{{ $articulo->id }}</td>
                    <td>{{ $articulo->titulo }}</td>
                    <td>{{ $articulo->categoria->nombreCat }}</td>
                    <td>{{ $articulo->user->name }}</td>
                    <td>
                    <a href="{{ route('articulos.edit',$articulo->id) }}" class="btn btn-danger">
                        <span class="fas fa-tools" aria-hidden="true"></span>
                    </a>
                    <a href=" {{ route('articulos.destroy',$articulo->id) }}" onclick="return confirm('Seguro que desea eliminarlo?')" class="btn btn-warning">
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
    {!! $articulos->render() !!}
</div>
<div class="container col-md-4">
</div>

@endsection()