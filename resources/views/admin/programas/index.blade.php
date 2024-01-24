@extends('dashboard')

@section('title')
Listado de programas
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
            @foreach($programas as $programa)
                <tr>
                    <td>{{ $programa->id }}</td>
                    <td>{{ $programa->titulo }}</td>
                    <td>{{ $programa->categoria->nombreCat }}</td>
                    <td>{{ $programa->user->name }}</td>
                    <td>
                    <a href="{{ route('programas.edit',$programa->id) }}" class="btn btn-danger">
                        <span class="fas fa-tools" aria-hidden="true"></span>
                    </a>
                    <a href=" {{ route('programas.destroy',$programa->id) }}" onclick="return confirm('Seguro que desea eliminarlo?')" class="btn btn-warning">
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
    {!! $programas->render() !!}
</div>
<div class="container col-md-4">
</div>

@endsection()