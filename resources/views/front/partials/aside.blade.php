<div class="recent">
      <h3>CATEGORIAS</h3>
      <ul>
        @foreach($categorias as $categoria)
          <li class="list-group-item">
            <a href="{{ route('front.search.categoria', $categoria->nombreCat) }}">
              {{ $categoria->nombreCat }}
            </a>
            <span class="badge">{{ $categoria->articulos->count() }}</span>
          </li>
        @endforeach
      </ul>
</div>
  <!-- </div> -->
  <div class="comments">
      <h3>TAGS</h3>
      <ul>
        @foreach($tags as $tag)
            <!-- <li class="list-group-item"> -->
            <span class="label label-default">
              <a href="{{ route('front.search.tag', $tag->nombreTag) }}">
                {{ $tag->nombreTag }}
              </a>
            </span>
            <!-- </li> -->
        @endforeach
      </ul>
    </div>
    <div class="clearfix"></div>
    <!-- <div class="archives">
      <h3>ARCHIVES</h3>
      <ul>
      <li><a href="#">October 2013</a></li>
      <li><a href="#">September 2013</a></li>
      <li><a href="#">August 2013</a></li>
      <li><a href="#">July 2013</a></li>
      </ul>
    </div>
    <div class="categories">
      <h3>CATEGORIES</h3>
      <ul>
      <li><a href="#">Vivamus vestibulum nulla</a></li>
      <li><a href="#">Integer vitae libero ac risus e</a></li>
      <li><a href="#">Vestibulum commo</a></li>
      <li><a href="#">Cras iaculis ultricies</a></li>
      </ul>
    </div> -->