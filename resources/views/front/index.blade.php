@extends('admin.template.template')

@section('content')
<div class="content-grids">
  <div class="col-md-8 content-main">
    <!-- <div class="content-grid"> -->
      @foreach($articulos as $articulo)
        <div class="content-grid-info">
          <div class="panel panel-default">
            <div class="panel-body">
            
            <a href="{{ route('articulos.show', [$articulo->slug]) }}">
            
              @foreach($articulo->imagenes as $imagen)
                <img src="{{ asset('imagenes/articulos/' . $imagen->nombreImg) }}" width="620" heigth = "320" />
              @endforeach
            </a>
              <div class="post-info">
                <h4>
                  <a href="{{ route('articulos.show', [$articulo->slug]) }}">
                    {{ $articulo->titulo }}
                  </a>
                  <i class="fa fa-calendar"></i>{{ $articulo->created_at->isoFormat('LL') }} / <i class="fa fa-folder-open"></i> 
                  <a href="{{ route('front.search.categoria', $articulo->categoria->nombreCat) }}">
                    {{ $articulo->categoria->nombreCat }} 
                  </a>
                </h4>
                <p>{{ $articulo->descripcion }}</p>
                <a href="{{ route('articulos.show', [$articulo->slug]) }}"><span></span>LEER MÁS...</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach    
    </div>
    
  </div>
  

  <div class="col-md-4">
    @include('front.partials.aside')
  </div>


    
</div>
<div class="clearfix"></div>
{!! $articulos->render() !!}






@endsection
