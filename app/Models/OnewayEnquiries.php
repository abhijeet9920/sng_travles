<?php

namespace App\Models;

use App\Models\Schedules;
use Illuminate\Database\Eloquent\Model;

class OnewayEnquiries extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'am_oneway_enquiries';

    protected $appends = ['is_confirmed'];

    public function route()
    {
        return $this->belongsTo(OnewayRoutes::class, 'oneway_id');
    }

    public function getIsConfirmedAttribute()
    {
        return Schedules::where('event_id', $this->id)->where('type', 'oneway')->exists();
    }
}
