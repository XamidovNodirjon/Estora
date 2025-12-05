<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    protected $fillable = ['name', 'lat', 'long'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
