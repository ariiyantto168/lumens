<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Referals extends Model 
{

    protected $dates = ['deleted_at'];

    protected $table = 'referals';
    protected $primaryKey = 'idreferals';

    protected $fillable = [
        'name','code_referals','description'
    ];

   
}