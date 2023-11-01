<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    protected $table = 'bonus';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'id_user',
        'free_spin',
        'status',
        'created_at'
    ];
}
