<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'alamat',
        'telepon',
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
    ];

    public function notifications()
    {
        return $this->morphMany(UserNotification::class, 'notifiable')->orderby('created_at', 'desc');
    }

    public function user_notification()
    {
        return $this->hasMany(UserNotification::class, "notifiable_id");
    }

    public function createNotifUser($data)
    {
        $notif = new UserNotification();
        $notif->type = 'App\Notifications\UserNotification';
        $notif->notifiable_type = 'App\User';
        $notif->notifiable_id = $this->id;
        $notif->data = $data;
        $notif->save();
    }

}
