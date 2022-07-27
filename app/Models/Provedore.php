<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provedore
 *
 * @property $id
 * @property $Nombres
 * @property $Telefono
 * @property $Direccion
 * @property $Correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Provedore extends Model
{
    
    static $rules = [
		'Nombres' => 'required|string',
		'Telefono' => 'required|numeric|digits:8',
		'Direccion' => 'required|string',
		'Correo' => 'required|email:rfc,dns',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombres','Telefono','Direccion','Correo'];



}
