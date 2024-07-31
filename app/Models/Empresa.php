<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $ruc
 * @property $email
 * @property $telefono
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property EmpresaUser[] $empresaUsers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'direccion', 'ruc', 'email', 'telefono', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empresaUsers()
    {
        return $this->hasMany(\App\Models\EmpresaUser::class, 'id', 'empresa_id');
    }
    
}
