<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTransactionShoe
 */
class TransactionShoe extends Model
{
    protected $fillable = [
        "price", "qty"
    ];

    public function transaction()
    {
        return $this->belongsTo("App\Transaction");
    }

    public function shoe()
    {
        return $this->belongsTo("App\Shoe");
    }
}
