<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Productosw
 *
 * @property $id
 * @property $titulo
 * @property $observacion
 * @property $requerimientos_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Requerimiento $requerimiento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Productosw extends Model
{

    static $rules = [
		'titulo' => 'required',
		'observacion' => 'nullable',
		'requerimientos_id' => 'required',
    'ps_pdf' => 'nullable',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','observacion','requerimientos_id','ps_pdf'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function requerimiento()
    {
        return $this->hasOne('App\Models\Requerimiento', 'id', 'requerimientos_id');
    }


}
