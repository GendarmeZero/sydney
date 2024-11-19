<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = ['additional_information_id', 'description', 'date'];

    // Define the relationship with the AdditionalInformation model
    public function additionalInformations()
    {
        return $this->belongsToMany(AdditionalInformation::class, 'additional_information_achievement');
    }

}
