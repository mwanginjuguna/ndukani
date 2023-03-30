<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'tag_id', 'brand_id', 'seller_id', 'rating_id', 'price', 'currency',  'description', 'quantity', 'in_stock'];

    public function category()
    {
        $this->belongsTo(Category::class);
    }
    public function tag()
    {
        $this->belongsTo(Tag::class);
    }
    public function brand()
    {
        $this->belongsTo(Brand::class);
    }
    public function seller()
    {
        $this->belongsTo(Seller::class);
    }
    public function ratings()
    {
        $this->hasMany(Rating::class);
    }
}
