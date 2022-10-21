<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function profilePicture()
    {
        return $this->belongsTo(Photo::class, 'profile_picture_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
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
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
