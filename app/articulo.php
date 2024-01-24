<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\Sluggable;


class articulo extends Model //implements SluggableInterface
{

    // use Sluggable;

    // protected $sluggable = [
    //     'build_from'    =>  'titulo',
    //     'save_to'       =>  'slug'
    // ];

    protected $table = "articulos";

    protected $fillable = ['titulo','descripcion','contenido','video','categoria_id','user_id'];

    //Un artículo solo puede tener una categoría
    public function categoria(){
        return $this->belongsTo('App\categoria');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function imagenes(){
        return $this->hasMany('App\imagen');
    }

    public function tags(){
        return $this->belongsToMany('App\tag');
    }

    public function scopeSearchSlug($query, $slug) {
        return $query->where('slug', '=', $slug);
    }

}
