<?php

namespace App\Http\ViewComposers;

use\Illuminate\Contracts\View\View;
use App\categoria;
use App\tag;

class AsideComposer{

    public function compose(View $view)
    {
        $categorias = categoria::orderBy('nombreCat', 'ASC')->get();
        $tags = tag::orderBy('nombreTag', 'ASC')->get();
        $view
        ->with('categorias', $categorias)
        ->with('tags', $tags);
    }

}