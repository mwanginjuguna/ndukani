<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyFeature extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'name', 'details'];

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
