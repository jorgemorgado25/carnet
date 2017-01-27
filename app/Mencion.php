<?php

namespace Carnet;

use Illuminate\Database\Eloquent\Model;

class Mencion extends Model
{
    protected $table = "menciones";
    protected $fillable = ["mencion"];

    public function anos()
    {
    	return $this->hasMany('Carnet\Ano', 'mencion_id');
    }

    public function inscripciones()
    {
        return $this->hasMany('Carnet\Inscripcion', 'mencion_id');
    }

    public function registers()
    {
        return $this->hasMany('Carnet\Register', 'mencion_id');
    }
}
