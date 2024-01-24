@extends('admin.template.template')

@section('title')
  lista de programas
@endsection

@section('content')
<div class="content-grids">
  <div class="col-md-8 content-main">
    <!-- <div class="content-grid"> -->

        <div class="content-grid-info">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="post-info">
                <h4>
                  <a href="#">
                    {{ $programa->titulo }}
                  </a>
                </h4>
              </div>
                {!! $programa->video !!}
              <div class="post-info">
                <h4> 
                  <i class="fa fa-calendar"></i>{{ $programa->created_at->isoFormat('LL') }} / <i class="fa fa-folder-open"></i> 
                  <a href="#">
                    {{ $programa->categoria->nombreCat }} 
                  </a>
                </h4>
                <p>{{ $programa->contenido }}</p>
                
              </div>
            </div>
          </div>
        </div>

    </div>

  </div>


</div>
<div class="clearfix"></div>


@endsection
