<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $Dni
 * @property $Nombres
 * @property $Apellidos
 * @property $Direccion
 * @property $Edad
 * @property $Sexo
 * @property $Telefono
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'Dni' => 'required|string|digits:13',
		'Nombres' => 'required|string',
		'Apellidos' => 'required|string',
		'Direccion' => 'required|string',
		'Edad' => 'required|numeric|digits_between:1,2',
		'Sexo' => 'required|string',
		'Telefono' => 'required|numeric|digits:8',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Dni','Nombres','Apellidos','Direccion','Edad','Sexo','Telefono'];



}
