<?php

namespace Carnet;

use Illuminate\Database\Eloquent\Model;

class Ano extends Model
{
    protected $table = "anos";
    protected $fillable = ['ano'];

    public function mencion()
    {
    	return $this->belongsTo('Carnet\Mencion', 'mencion_id');
    }

    public function secciones()
    {
    	return $this->hasMany('Carnet\Seccion', 'ano_id');
    }

    public function inscripciones()
    {
        return $this->hasMany('Carnet\Inscripcion', 'ano_id');
    }

    public function registers()
    {
        return $this->hasMany('Carnet\Register', 'ano_id');
    }
}
