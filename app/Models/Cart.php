<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Cart
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $quantity Количество
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Product $product
 *
 * @method static Builder|Cart newModelQuery()
 * @method static Builder|Cart newQuery()
 * @method static Builder|Cart query()
 * @method static Builder|Cart whereCityId($value)
 * @method static Builder|Cart whereClientId($value)
 * @method static Builder|Cart whereCreatedAt($value)
 * @method static Builder|Cart whereId($value)
 * @method static Builder|Cart wherePriceId($value)
 * @method static Builder|Cart whereProductId($value)
 * @method static Builder|Cart whereQuantity($value)
 * @method static Builder|Cart whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class Cart extends BaseModel
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
