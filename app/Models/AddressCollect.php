<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressCollect extends Model
{
    use HasFactory;

    protected $table = 'address_collect';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'description',
        'address',
        'private_key',
        'public_key',
        'address_hex',
        'balance_address',
        'status',
        'created_at'

    ];
}
