<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $cedula
 * @property $telefono
 * @property $email
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property VehiculoCliente[] $vehiculoClientes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'cedula', 'telefono', 'email', 'direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculoClientes()
    {
        return $this->hasMany(\App\Models\VehiculoCliente::class, 'id', 'cliente_id');
    }
    
}
