<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ball extends Model
{
    protected $table = 'balls';
    protected $fillable = [
        'user_id',
        'amount'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'id','user_id');
    }
}
