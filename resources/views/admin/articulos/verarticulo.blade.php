@extends('admin.template.template')

@section('content')
<div class="content-grids">
  <div class="col-md-8 content-main">
    <!-- <div class="content-grid"> -->

        <div class="content-grid-info">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="post-info">
                <h4>
                  <a href="single.html">
                    {{ $articulo->titulo }}
                  </a>
                </h4>
              </div>
                {!! $articulo->video !!}
              <div class="post-info">
                <h4> 
                  <i class="fa fa-calendar"></i>{{ $articulo->created_at->isoFormat('LL') }} / <i class="fa fa-folder-open"></i> 
                  <a href="{{ route('front.search.categoria', $articulo->categoria->nombreCat) }}">
                    {{ $articulo->categoria->nombreCat }} 
                  </a>
                </h4>
                <p>{{ $articulo->contenido }}</p>
                
              </div>
            </div>
          </div>
        </div>

    </div>

  </div>


  <div class="col-md-4">
  
    @include('front.partials.asideart')
  
  </div>



</div>
<div class="clearfix"></div>


@endsection
