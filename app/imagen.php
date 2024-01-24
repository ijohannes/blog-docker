<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    protected $table = "imagenes";

    protected $fillable = ['nombreImg', 'articulo_id', 'programa_id'];

    public function articulo(){
        return $this->belongsTo('App\articulo');
    }

    public function programa(){
        return $this->belongsTo('App\programa');
    }
}
