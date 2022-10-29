<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    protected $appends = ['price_formatted'];

    public function getPriceFormattedAttribute()
    {
        return number_format($this->price, 2);
    }

    public function seller()
    {
        return $this->belongsTo(Store::class, 'seller_id');
    }

    public function listedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'product_location', 'product_id', 'location_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'product_photo');
    }
}
