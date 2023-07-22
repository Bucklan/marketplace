<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/**
 * App\Models\OrderProduct
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 *
 * @property-read Collection|Product[] $items
 * @property-read int|null $items_count
 * @property-read Order $order
 * @property-read Product $product
 *
 * @method static Builder|OrderProduct newModelQuery()
 * @method static Builder|OrderProduct newQuery()
 * @method static Builder|OrderProduct query()
 * @method static Builder|OrderProduct whereId($value)
 * @method static Builder|OrderProduct whereOrderId($value)
 * @method static Builder|OrderProduct wherePrice($value)
 * @method static Builder|OrderProduct whereProductId($value)
 * @method static Builder|OrderProduct whereQuantity($value)
 *
 * @mixin Eloquent
 */
class OrderProduct extends Model
{
    public $timestamps = false;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class,);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,);
    }

}
