<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnewayEnquiries extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'am_oneway_enquiries';

    public function route()
    {
        return $this->belongsTo(OnewayRoutes::class, 'oneway_id');
    }
}
