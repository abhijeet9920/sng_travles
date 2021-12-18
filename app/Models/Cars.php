<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'am_cars';

    public function getIsCarrierAttachedAttribute($value)
    {
        if($value == 1){
            return 'Roof carrier available';
        }
        return 'Roof carrier not available';
    }

    public function getImagesAttribute($value){
        return ['source' => base64_encode(file_get_contents(storage_path('uploads').DIRECTORY_SEPARATOR.$value)), 'mime' => mime_content_type(storage_path('uploads').DIRECTORY_SEPARATOR.$value)];
    }
}
