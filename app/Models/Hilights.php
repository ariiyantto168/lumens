<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hilights extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'hilights';
    protected $primaryKey = 'idhilights';

    protected $fillable = [
        'namehilights',
    ];
}
