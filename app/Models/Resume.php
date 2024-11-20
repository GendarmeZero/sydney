<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'filename',
        'original_filename',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // A resume belongs to one user
    }
    public function additionalInformation()
    {
        return $this->hasOne(AdditionalInformation::class); // A resume can have one additional information
    }
    public function interviews()
    {
        return $this->hasMany(Interview::class); // A resume can have many interviews
    }


}

