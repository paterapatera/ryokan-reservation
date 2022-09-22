<?php

namespace App\Models;

use App\Domains\Employee\Employee as DomainEmployee;
use App\Domains\Employee\Id;
use App\Domains\Employee\Name;
use App\Domains\Employee\Password;
use App\Domains\Employee\Email;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;

class Employee extends Authenticatable
{
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    function toDomain(): DomainEmployee
    {
        return new DomainEmployee(
            new Id($this->id),
            new Name($this->name),
            new Email($this->email),
            new Password($this->password),
        );
    }
}
