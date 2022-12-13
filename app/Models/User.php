<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory;

    const NUMBER_ROLES = [
        '0' => 'Użytkownik',
        '1' => 'Administrator'
    ];

    protected $date = [
        'registered_at'
    ];

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nickname',
        'email',
        'image_path',
        'password',
        'email_verify_token',
        'email_confirmed'
    ];

    protected $hidden = [
        'password'
    ];

    protected $attributes = [
        'image_path' => 'uploaded/images/default-avatar.png',
        'role' => 0,
        'email_confirmed' => 0
    ];

    public $timestamps = false;

    protected function role() : Attribute {
        return Attribute::make(
            get: fn ($value) => self::NUMBER_ROLES[(string)$value],
        );
    }

    public function hasRole(string $roleName) : bool {
        list($roleName, $modelRole) = [
            strtolower($roleName),
            strtolower($this->role)
        ];
        return ($roleName == $modelRole);
    }

    public function getUserID() : int {
        return $this->id;
    }

}
