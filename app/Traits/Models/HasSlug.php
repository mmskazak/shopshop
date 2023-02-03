<?php


namespace App\Traits\Models;


use Illuminate\Database\Eloquent\Model;

trait HasSlug
{

    protected static function bootHasSlug()
    {
        parent::boot();

        static::creating(function (Model $model)
        {

            $generateNewSlug = static function($nameField, $counter = 0) use ($model,&$generateNewSlug) {

                $newSlug = str($model->{$nameField})->slug() . ($counter !== 0) ?"-{$counter}": '';

                $isExistSlug = $model::query()->where('slug',$newSlug)->exists();

                if($isExistSlug) {
                   return $generateNewSlug($nameField,++$counter);
                }

                return $newSlug;
            };

            $model->slug = $product->slud ?? $generateNewSlug(static::slugFrom());
        });
    }

    public static function slugFrom(): string
    {
        return 'title';
    }

}
