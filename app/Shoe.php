<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperShoe
 */
class Shoe extends Model
{
    protected $fillable = [
        "name", "description", "price", "image"
    ];
}
