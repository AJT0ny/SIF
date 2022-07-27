<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Facturacion
 *
 * @property $id
 * @property $clienteId
 * @property $productoId
 * @property $cliente
 * @property $direccion_cliente
 * @property $producto
 * @property $cantidad
 * @property $precio
 * @property $ISV
 * @property $subtotal
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Facturacion extends Model
{
    protected $table ='facturacion';
    static $rules = [
		'clienteId' => 'required',
		'productoId' => 'required',
		'cliente' => 'required',
		'direccion_cliente' => 'required',
		'producto' => 'required',
		'cantidad' => 'required',
		'precio' => 'required',
		'ISV' => 'required',
		'subtotal' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clienteId','productoId','cliente','direccion_cliente','producto','cantidad','precio','ISV','subtotal','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'clienteId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'productoId');
    }
    

}
