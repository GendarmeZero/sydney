<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Make sure to import the User model

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'zip',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
