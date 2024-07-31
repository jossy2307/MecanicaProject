<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehiculo
 *
 * @property $id
 * @property $placa
 * @property $color
 * @property $marca
 * @property $modelo
 * @property $anio
 * @property $kilometraje
 * @property $estado_vehiculo_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property EstadoVehiculo $estadoVehiculo
 * @property User $user
 * @property VehiculoCliente[] $vehiculoClientes
 * @property VehiculoDetalle[] $vehiculoDetalles
 * @property VehiculoPrecio[] $vehiculoPrecios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vehiculo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['placa', 'color', 'marca', 'modelo', 'anio', 'kilometraje', 'estado_vehiculo_id', 'user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoVehiculo()
    {
        return $this->belongsTo(\App\Models\EstadoVehiculo::class, 'estado_vehiculo_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculoClientes()
    {
        return $this->hasMany(\App\Models\VehiculoCliente::class, 'id', 'vehiculo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculoDetalles()
    {
        return $this->hasMany(\App\Models\VehiculoDetalle::class, 'id', 'vehiculo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculoPrecios()
    {
        return $this->hasMany(\App\Models\VehiculoPrecio::class, 'id', 'vehiculo_id');
    }
    
}
