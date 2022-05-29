<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $guard = 'admin';
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function notifications()
    {
        return $this->morphMany(AdminNotification::class, 'notifiable')->orderby('created_at', 'desc');
    }

    public function createNotif($data)
    {
        $notif = new AdminNotification();
        $notif->type = 'App\Notifications\AdminNotification';
        $notif->notifiable_type = 'App\User';
        $notif->notifiable_id = $this->id;
        $notif->data = $data;
        $notif->save();
    }


}
