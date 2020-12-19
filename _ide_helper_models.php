<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App {
    /**
     * App\Cart
     *
     * @mixin IdeHelperCart
     * @property int $id
     * @property int $qty
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property int $user_id
     * @property int $shoe_id
     * @property-read \App\Shoe $shoe
     * @property-read \App\User $user
     * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
     * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Cart whereQty($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Cart whereShoeId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
     */
    class IdeHelperCart extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Shoe
     *
     * @mixin IdeHelperShoe
     * @property int $id
     * @property string $name
     * @property string $description
     * @property int $price
     * @property string $image
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe query()
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Shoe whereUpdatedAt($value)
     */
    class IdeHelperShoe extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Transaction
     *
     * @mixin IdeHelperTransaction
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property int $user_id
     * @property int $total
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\TransactionShoe[] $shoes
     * @property-read int|null $shoes_count
     * @property-read \App\User $user
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTotal($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
     */
    class IdeHelperTransaction extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\TransactionShoe
     *
     * @mixin IdeHelperTransactionShoe
     * @property int $id
     * @property int $qty
     * @property int $price
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property int $transaction_id
     * @property int $shoe_id
     * @property-read \App\Shoe $shoe
     * @property-read \App\Transaction $transaction
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe query()
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe whereQty($value)
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe whereShoeId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe whereTransactionId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|TransactionShoe whereUpdatedAt($value)
     */
    class IdeHelperTransactionShoe extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\User
     *
     * @mixin IdeHelperUser
     * @property int $id
     * @property string $username
     * @property string $email
     * @property string $password
     * @property string $role
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Cart[] $cart
     * @property-read int|null $cart_count
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Transaction[] $transactions
     * @property-read int|null $transactions_count
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
     */
    class IdeHelperUser extends \Eloquent
    {
    }
}

