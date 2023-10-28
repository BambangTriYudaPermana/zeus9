<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HisTransaction extends Model
{
    use HasFactory;

    protected $table = 'his_transaction';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'id_user',
        'contractRet',
        'txID',
        'get_amount',
        'amount',
        'owner_address_hex',
        'to_address_hex',
        'timestamp',
        'date_timestamp',
        'created_at'

    ];
}
