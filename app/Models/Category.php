<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class,'category_id','id');
    }
}
