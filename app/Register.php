<?php

namespace Carnet;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
	protected $table = "registers";
	
	protected $fillable = [
		'student_id', 
		'person_id', 
		'escolaridad_id', 
		'mencion_id', 
		'ano_id', 
		'seccion_id'];

    public function student()
    {
    	return $this->belongsTo('Carnet\Student', 'student_id');
    }

    public function person()
    {
    	return $this->belongsTo('Carnet\Person', 'person_id');
    }
    public function escolaridad()
    {
    	return $this->belongsTo('Carnet\Escolaridad', 'escolaridad_id');
    }
    public function mencion()
    {
    	return $this->belongsTo('Carnet\Mencion', 'mencion_id');
    }
    public function ano()
    {
    	return $this->belongsTo('Carnet\Ano', 'ano_id');
    }
    public function seccion()
    {
    	return $this->belongsTo('Carnet\Seccion', 'seccion_id');
    }
}
