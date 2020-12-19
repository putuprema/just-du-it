<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCart
 */
class Cart extends Model
{
    protected $fillable = [
        "qty"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function shoe()
    {
        return $this->belongsTo("App\Shoe");
    }
}
