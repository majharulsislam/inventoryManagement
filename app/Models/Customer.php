<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'shopname', 'photo', 'accountholder', 'accountnumber', 'bankname', 'bankbranch', 'city',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
