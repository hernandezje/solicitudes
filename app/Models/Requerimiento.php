<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Requerimiento
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $estado_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Productosw[] $productosws
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Requerimiento extends Model
{

    static $rules = [
    'fec_creacion' => 'required',
    'fec_entrega' => 'required',
		'titulo' => 'required',
		'descripcion' => 'required',
    'observacion' => 'nullable',
		'estado_id' => 'required',
    'empleados_id' => 'required',
    'rq_pdf' => 'nullable',
    'fec_final' => 'nullable',
    ];


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fec_creacion','titulo','descripcion','estado_id','empleados_id','observacion','rq_pdf'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'estado_id');
    }

    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleados_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productosws()
    {
        return $this->hasMany('App\Models\Productosw', 'requerimientos_id', 'id');
    }


}
