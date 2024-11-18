<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_image',
        'resume_id',
        'linked_user_id',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class); // Additional information belongs to one user
    }
    public function resume()
    {
        return $this->belongsTo(Resume::class); // Additional information belongs to one resume
    }
}

