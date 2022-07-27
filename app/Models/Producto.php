<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $categoriaId
 * @property $proveedorId
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $existencia
 * @property $presentacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Provedore $provedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'categoriaId' => 'required',
		'proveedorId' => 'required',
		'nombre' => 'required|string',
		'descripcion' => 'required|string',
		'precio' => 'required|numeric|digits_between:1,7',
		'existencia' => 'required|numeric',
		'presentacion' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categoriaId','proveedorId','nombre','descripcion','precio','existencia','presentacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoriaId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provedore()
    {
        return $this->hasOne('App\Models\Provedore', 'id', 'proveedorId');
    }
    

}
