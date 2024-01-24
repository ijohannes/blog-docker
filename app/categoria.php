<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = "categorias";

    protected $fillable = ['nombreCat'];
    
    //Plural porque una categoría puede tener varios artículos
    public function articulos(){
        return $this->hasMany('App\articulo');
    }

    public function programas(){
        return $this->hasMany('App\programa');
    }

    public function scopeSearchCategoria($query, $nombreCat)
    {
        return $query->where('nombreCat', '=', $nombreCat);
    }
    
}
