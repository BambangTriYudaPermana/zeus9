<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HisPlay extends Model
{
    use HasFactory;

    protected $table = 'his_play';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'id_user',
        'game',
        'bet',
        'win_amount',
        'result',
        'created_at'
    ];
}
