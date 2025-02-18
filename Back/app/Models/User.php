<?php

namespace App\Models;

use App\Enums\UserSubscriptionStatus;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    const SEX_MALE = 1;
    const SEX_FEMALE = 2;    

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
        'is_subscribed' => UserSubscriptionStatus::class,
    ];

    protected $table = 'users';
    protected $fillable = [
        'name', 
        'email', 
        'surname', 
        'patronymic', 
        'age', 
        'address', 
        'sex', 
        'postal_code', 
        'city', 
        'country', 
        'date_of_birth', 
        'phone_number', 
        'is_subscribed',
        'password',
        'email_verified_at'
    ];

    static function getSexes() {
        return [
            self::SEX_MALE => 'Male',
            self::SEX_FEMALE => 'Female',
        ];
    }

    public static function getSexValue($title) {
        $sexes = array_flip(self::getSexes());
        return $sexes[$title] ?? null;
    }

    public function getSexTitleAttribute() {
        if ($this->sex) {
            return self::getSexes()[$this->sex];
        } else {
            return '';
        }
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
}
