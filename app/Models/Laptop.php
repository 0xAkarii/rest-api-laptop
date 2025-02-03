<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'brand',
        'model',
        'image',
        'year',
        'processor',
        'ram',
        'storage',
        'gpu',
        'display',
        'os',
        'battery',
        'price',
        'ports',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}

?>
