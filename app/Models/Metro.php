<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metro extends Model
{
    protected $table = 'metros';
    protected $fillable = ['product_id','metro_name'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
