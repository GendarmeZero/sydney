<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'middleName',
        'lastName',
        'email',
        'password',
        'role',
        'work_location',
        'hourly_paid',
        'weekly_paid',
        'monthly_paid',
        'yearly_paid',
        'address',
        'phone',
        'status',
        'department_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'string',  // Ensure role is cast as a string
        'password' => 'hashed',
    ];

    ////Relation:
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function employeeStatus()
    {
        return $this->hasOne(EmployeeStatus::class, 'user_id');
    }
    public function additionalInformation()
    {
        return $this->hasOne(AdditionalInformation::class); // One user can have one additional information
    }
    public function resume()
    {
        return $this->hasOne(Resume::class); // One user can have one resume
    }


}

