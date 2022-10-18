<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable, HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'mtime',
        'images',
        'created_at',
        'updated_at',
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

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }

    public function buildPath()
    {
        $path = $this->category_name;
        
        if ($this->sub_category_name) {
            $path .= ' > ' . $this->sub_category_name;
        }
        
        if ($this->third_level_category_name) {
            $path .= ' > ' . $this->third_level_category_name;
        }
        
        if ($this->fourth_level_category_name) {
            $path .= ' > ' . $this->fourth_level_category_name;
        }
        
        if ($this->fifth_level_category_name) {
            $path .= ' > ' . $this->fifth_level_category_name;
        }

        return $path;
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
                'source' => ['name','parent_id']
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
