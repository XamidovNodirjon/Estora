<?php

namespace App\Models;

use Illuminate\Container\Attributes\Tag;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'subcategory_id',
        'user_id',
        'region_id',
        'metro_id',
        'university_id',
        'city_id',
        'price',
        'description',
        'images',
        'phone',
        'floor',
        'building_floor',
        'square',
        'rooms',
        'repair',
        'sotix',
        'status',
        'landmark',
    ];


    protected $casts = [
        'images' => 'array',
        'status' => 'boolean',
    ];

    public function isPhoneVisibleTo($user)
    {
        return \App\Models\ProductView::where('manager_id', $user->id)
            ->where('product_id', $this->id)
            ->exists();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(ReservationProduct::class);
    }


    protected $appends = ['image_array'];

    public function getImageArrayAttribute()
    {
        if (is_array($this->images)) {
            return $this->images;
        }

        $decoded = json_decode($this->images, true);
        return is_array($decoded) ? $decoded : [];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }

    public function features()
    {
        return $this->belongsToMany(
            ProductFeatures::class,           // bog‘lanadigan model
            'product_feature_product',       // pivot table nomi
            'product_id',                    // product_id ustuni
            'product_feature_id'             // feature_id ustuni
        );
    }

    public function metros()
    {
        return $this->belongsTo(Metro::class);
    }

    public function universities()
    {
        return $this->belongsTo(University::class);
    }



}
