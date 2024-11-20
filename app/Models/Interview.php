<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'interview_date', 'user_id', 'resume_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // An interview belongs to a user
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class); // An interview belongs to a resume
    }
}
