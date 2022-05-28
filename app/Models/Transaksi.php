<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TransaksiDetail;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'courier_id',
        'timeout',
        'address',
        'province',
        'regency',
        'total',
        'shipping_cost',
        'sub_total',
        'proof_of_payment',
        'code',
        'slug',
        'payment_token',
        'payment_url',
        'city_id',
        'shipping_package',
        'status',
    ];

    public function transaction_details()
    {
        return $this->hasMany(TransaksiDetail::class, 'transaction_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
