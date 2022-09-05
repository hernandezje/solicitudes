<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $name
 * @property $puesto_id
 * @property $area_id
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @property puesto $puesto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{

    static $rules = [
		'name' => 'required',
		'puesto_id' => 'required',
		'area_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','puesto_id','area_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puesto()
    {
        return $this->hasOne('App\Models\Puesto', 'id', 'puesto_id');
    }


}
