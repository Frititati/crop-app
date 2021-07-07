<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notifications\PasswordResetNotification;

class User extends Authenticatable implements CanResetPassword
{
    use Notifiable;
    // use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'username',
        'name',
        'surname',
        'email',
        'password',
        'portfolio_id',
        'photo_path',
        'is_active',
        'viewed_help',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio\Portfolio::class, 'portfolio_id');
    }

    public function coin()
    {
        return $this->hasMany(Coin\Coin::class, 'user_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
}
