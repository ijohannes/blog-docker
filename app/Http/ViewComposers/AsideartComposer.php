<?php

namespace App\Http\ViewComposers;

use\Illuminate\Contracts\View\View;
use App\categoria;
use App\tag;

class AsideartComposer{

    public function compose(View $view)
    {
        $categoriasart = categoria::orderBy('nombreCat', 'ASC')->get();
        $tagsart = tag::orderBy('nombreTag', 'ASC')->get();
        $view
        ->with('categoriasart', $categoriasart)
        ->with('tagsart', $tagsart);
    }

}