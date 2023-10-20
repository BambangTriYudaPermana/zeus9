<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPayout extends Model
{
    use HasFactory;

    
    protected $table = 'm_payout';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'persen',
        'payout',
        'low_min',
        'low_max',
        'hight_min',
        'hight_max',
        'created_at'
    ];

}
