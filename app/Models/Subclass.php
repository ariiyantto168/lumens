<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Session;

class Subclass extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'subclass';
    protected $primaryKey = 'idsubclass';

    protected $fillable = [
        'headmateri',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            //created by
            $model->created_by = Session::get('users.idusers');
            return true;
        });

        static::updating(function ($model) {
            //updated by
            $model->updated_by = Session::get('users.idusers');
            return true;
        });

        static::deleting(function ($model) {
            //deleted by
            $model->deleted_by = Session::get('users.idusers');
            $model->save();
            return true;
        });
    }

    public function class_belong()
    {
        return $this->belongsTo('App\Models\Classes','idclass');
    }

    public function materies()
    {
        return $this->hasMany('App\Models\Materies','idsubclass');
    }
   
    
    
}
