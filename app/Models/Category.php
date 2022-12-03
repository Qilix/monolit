<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }


    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

        public function childrenCategories()
    {
        return $this->categories();
//        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }
}
