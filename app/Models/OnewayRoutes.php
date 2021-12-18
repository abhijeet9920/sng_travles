<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Cars;

class OnewayRoutes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'am_oneway_routes';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['short_starting', 'short_ending'];

    public function getRunningScheduleAttribute($value){
        return json_decode($value, true);
    }

    public function getAdditionalInfoAttribute($value){
        $decoded = json_decode($value, true);
        $base_64_start = json_decode(base64_decode($decoded['start_point']), true);
        $base_64_end = json_decode(base64_decode($decoded['end_point']), true);
        return ['start' => $base_64_start, 'end' => $base_64_end];
    }

    public function getShortStartingAttribute(){
        return Str::words($this->start_location, 3);
    }

    public function getShortEndingAttribute(){
        return Str::words($this->end_location, 3);
    }


    public function car()
    {
        return $this->belongsTo(Cars::class, 'vehicle');
    }
}
