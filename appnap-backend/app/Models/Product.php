<?php

namespace App\Models;

use App\Services\ProductService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    /**
     * @return void
     */
    public function setImageAttribute()
    {
        $new_avatar = request()->file('image');
        $old_avatar = $this->attributes['image'];
        $this->attributes['image'] = ProductService::storeImage($old_avatar, $new_avatar);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
