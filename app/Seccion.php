<?php

namespace Carnet;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'secciones';
    protected $fillable = ['seccion'];

    public function ano()
    {
    	return $this->belongsTo('Carnet\Ano', 'ano_id');
    }


    public function registers()
    {
        return $this->hasMany('Carnet\Register', 'seccion_id');
    }
}
