<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['nombreTag'];

    public function articulos(){
        return $this->belongsToMany('App\articulo')->withTimestamps();
    }

    public function scopeSearchTag($query, $nombreTag)
    {
        return $query->where('nombreTag', '=', $nombreTag);
    }

}
