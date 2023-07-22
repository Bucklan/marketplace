<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\HasMedia;
use App\Traits\Order\HasScopes;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use App\Enums as Enums;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property float $amount Итого
 * @property int $status Статус
 * @property string $ordered_at Дата заказа
 * @property string|null $declined_at Дата отказа
 * @property string|null $confirmed_at Дата подтверждения
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read User $user
 * @property-read File|null $file
 * @property-read Collection|File[] $files
 * @property-read int|null $files_count
 * @property-read Collection|Product[] $orderProducts
 * @property-read int|null $order_products_count
 *
 * @method static Builder|Order filterBy($filters)
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereAmount($value)
 * @method static Builder|Order whereApartment($value)
 * @method static Builder|Order whereBuilding($value)
 * @method static Builder|Order whereCityId($value)
 * @method static Builder|Order whereClientId($value)
 * @method static Builder|Order whereCompleted()
 * @method static Builder|Order whereCompletedAt($value)
 * @method static Builder|Order whereConfirmedAt($value)
 * @method static Builder|Order whereCourierId($value)
 * @method static Builder|Order whereCreated()
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereDaysCount($value)
 * @method static Builder|Order whereDeclined()
 * @method static Builder|Order whereDeclinedAt($value)
 * @method static Builder|Order whereDelivered()
 * @method static Builder|Order whereDeliveredAt($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereInProcessAcceptanceByCourier()
 * @method static Builder|Order whereOrderInCity(string $city_id)
 * @method static Builder|Order whereOrderedAt($value)
 * @method static Builder|Order whereRetrieveBonus($value)
 * @method static Builder|Order whereRetrievedAt($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereStreet($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereWaitingAcceptanceByCourier()
 *
 * @mixin Eloquent
 */
class Order extends BaseModel
{
    use HasScopes,
        HasMedia,
        Filterable,
        SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class,);
    }

    public function user(): BelongsTo
    {
        return $this->belongsto(User::class);
    }


    public function getStatusDescription(): string
    {
       return Enums\Order\Status::getDescription((string)$this->status);
    }

    public function getStatusClass(): string
    {
        return match ((string)$this->status) {
            Enums\Order\Status::CREATED => 'btn btn-secondary',
            Enums\Order\Status::CANCELED => 'btn btn-danger',
            Enums\Order\Status::CONFIRMED => 'btn btn-success',
        };
    }


}
