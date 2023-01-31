<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'thumbnail',
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function (Brand $brand){
            $brand->slug = $brand->slud ?? str($brand->title)->slug();
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
