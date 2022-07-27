<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductoIngresado
 *
 * @property $id
 * @property $productosId
 * @property $cantidadIngresar
 * @property $created_at
 * @property $updated_at
 * @property $fechaIngreso
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductoIngresado extends Model
{
    
    static $rules = [
		'productosId' => 'required',
		'cantidadIngresar' => 'required|numeric',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['productosId','cantidadIngresar','fechaIngreso'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'productosId');
    }

}
