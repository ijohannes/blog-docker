<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class programa extends Model
{
    protected $table = "programas";

    protected $fillable = ['titulo','descripcion','video', 'slug', 'contenido','categoria_id','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function categoria(){
        return $this->belongsTo('App\categoria');
    }
    
    public function imagenes(){
        return $this->hasMany('App\imagen');
    }

    public function scopeSearchSlug($query, $slug) {
        return $query->where('slug', '=', $slug);
    }
}
