<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MRole extends Model
{
    use HasFactory;

    protected $table = 'm_role';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'role',
        'status',
        'created_at'

    ];
}
