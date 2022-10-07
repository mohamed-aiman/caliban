<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'mtime',
        'images',
        'category',
        'sub_category',
        'third_level_category',
        'fourth_level_category',
        'fifth_level_category',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function thirdLevelCategory()
    {
        return $this->belongsTo(Category::class, 'third_level_category_id');
    }

    public function fourthLevelCategory()
    {
        return $this->belongsTo(Category::class, 'fourth_level_category_id');
    }

    public function fifthLevelCategory()
    {
        return $this->belongsTo(Category::class, 'fifth_level_category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getImagesAttribute($value)
    {
        return json_decode($value);
    }

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }
}
