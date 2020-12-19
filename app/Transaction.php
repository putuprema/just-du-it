<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTransaction
 */
class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function shoes()
    {
        return $this->hasMany("App\TransactionShoe");
    }
}
