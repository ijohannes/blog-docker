@extends('admin.template.template')
@section('title')
  lista de programas
@endsection
@section('content')
<div class="content-grids">
  <div class="col-md-8 content-main">
    <!-- <div class="content-grid"> -->
      @foreach($programas as $programa)
        <div class="content-grid-info">
          <div class="panel panel-default">
            <div class="panel-body">
            
            <a href="{{ route('programas.show', [$programa->slug]) }}">
            
              @foreach($programa->imagenes as $imagen)
                <img src="{{ asset('imagenes/programas/' . $imagen->nombreImg) }}" alt="" width="620" heigth = "320" />
              @endforeach
            </a>
              <div class="post-info">
                <h4>
                  <a href="{{ route('programas.show', [$programa->slug]) }}">
                    {{ $programa->titulo }}
                  </a>
                  <i class="fa fa-calendar"></i>{{ $programa->created_at->isoFormat('LL') }} / <i class="fa fa-folder-open"></i> 
                  <a href="#">
                    {{ $programa->categoria->nombreCat }} 
                  </a>
                </h4>
                <p>{{ $programa->descripcion }}</p>
                <a href="{{ route('programas.show', [$programa->slug]) }}"><span></span>LEER MÁS...</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach    
    </div>
    
  </div>

    
</div>
<div class="clearfix"></div>
{!! $programas->render() !!}






@endsection
