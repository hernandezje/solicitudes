<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 *
 * @property $id
 * @property $fecha
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Requerimiento[] $requerimientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estado extends Model
{

    static $rules = [
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requerimientos()
    {
        return $this->hasMany('App\Models\Requerimiento', 'estado_id', 'id');
    }


}
