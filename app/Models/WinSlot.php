<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinSlot extends Model
{
    use HasFactory;

    protected $table = 'win_slot';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'symbol',
        'img_name',
        'code_symbol',
        'dua_symbol',
        'tiga_symbol',
        'free_spin',
        'status',
        'created_at'

    ];
}
