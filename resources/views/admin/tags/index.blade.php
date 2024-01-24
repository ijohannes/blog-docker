@extends('dashboard')

@section('title')
Listado de tags
@endsection

@section('ventana')
@include('flash::message')
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->nombreTag }}</td>
                    <td>
                    <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-danger">
                        <span class="fas fa-tools" aria-hidden="true"></span>
                    </a>
                    <a href=" {{ route('tags.destroy',$tag->id) }}" onclick="return confirm('Seguro que desea eliminarlo?')" class="btn btn-warning">
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
    {!! $tags->render() !!}
</div>
<div class="container col-md-4">
</div>

@endsection()