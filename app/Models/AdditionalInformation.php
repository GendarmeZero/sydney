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
        'achievement_id',  // Include the 'achievement_id' here
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class); // Additional information belongs to one user
    }

    // Define the relationship to the Resume model
    public function resume()
    {
        return $this->belongsTo(Resume::class); // Additional information belongs to one resume
    }

    // Define the relationship with achievements
    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'additional_information_achievement', 'additional_information_id', 'achievement_id');
    }
}
