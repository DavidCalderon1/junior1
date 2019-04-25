<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Empresas
 * @package App\Models
 * @version April 24, 2019, 5:06 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection empleados
 * @property string name
 * @property string email
 * @property string logo
 * @property string website
 */
class Empresas extends Model
{

    public $table = 'empresas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'logo' => 'string',
        'website' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function empleados()
    {
        return $this->hasMany(\App\Models\Empleado::class);
    }
}
