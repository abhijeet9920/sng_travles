<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarsConfiguration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars_configuration';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $casts = [
        'config_value' => 'array'
    ];
}
