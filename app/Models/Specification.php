<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'title', 'details', 'type'];

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
