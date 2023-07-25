<?php

namespace App\Models;

use App\Traits\HasMedia;
use App\Traits\Product\HasScopes;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\InteractsWithMedia;
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property array|null $description Описание
 * @property int|null $price
 * @property int|null $quantity
 * @property int|null $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Category|null $category
 * @property-read File|null $file
 * @property-read Collection|File[] $files
 * @property-read int|null $files_count
 * // * @property-read Collection|OrderProduct[] $orderProducts
 * // * @property-read int|null $order_products_count
 *
 * @method static Builder|Product filterBy($filters)
 * @method static Builder|Product joinNestedRelationship(string $relationships, $callback = null, $joinType = 'join', $useAlias = false, bool $disableExtraConditions = false)
 * @method static Builder|Product joinRelation($relationName, $callback = null, $joinType = 'join', $useAlias = false, bool $disableExtraConditions = false)
 * @method static Builder|Product joinRelationship($relationName, $callback = null, $joinType = 'join', $useAlias = false, bool $disableExtraConditions = false)
 * @method static Builder|Product joinRelationshipUsingAlias($relationName, $callback = null, bool $disableExtraConditions = false)
 * @method static Builder|Product leftJoinRelation($relation, $callback = null, $useAlias = false, bool $disableExtraConditions = false)
 * @method static Builder|Product leftJoinRelationship($relation, $callback = null, $useAlias = false, bool $disableExtraConditions = false)
 * @method static Builder|Product leftJoinRelationshipUsingAlias($relationName, $callback = null, bool $disableExtraConditions = false)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static Builder|Product orderByLeftPowerJoins($sort, $direction = 'asc')
 * @method static Builder|Product orderByLeftPowerJoinsAvg($sort, $direction = 'asc')
 * @method static Builder|Product orderByLeftPowerJoinsCount($sort, $direction = 'asc')
 * @method static Builder|Product orderByLeftPowerJoinsMax($sort, $direction = 'asc')
 * @method static Builder|Product orderByLeftPowerJoinsMin($sort, $direction = 'asc')
 * @method static Builder|Product orderByLeftPowerJoinsSum($sort, $direction = 'asc')
 * @method static Builder|Product orderByPowerJoins($sort, $direction = 'asc', $aggregation = null, $joinType = 'join')
 * @method static Builder|Product orderByPowerJoinsAvg($sort, $direction = 'asc')
 * @method static Builder|Product orderByPowerJoinsCount($sort, $direction = 'asc')
 * @method static Builder|Product orderByPowerJoinsMax($sort, $direction = 'asc')
 * @method static Builder|Product orderByPowerJoinsMin($sort, $direction = 'asc')
 * @method static Builder|Product orderByPowerJoinsSum($sort, $direction = 'asc')
 * @method static Builder|Product powerJoinHas($relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder|Product powerJoinWhereHas($relation, $callback = null, $operator = '>=', $count = 1)
 * @method static Builder|Product query()
 * @method static Builder|Product rightJoinRelation($relation, $callback = null, $useAlias = false, bool $disableExtraConditions = false)
 * @method static Builder|Product rightJoinRelationship($relation, $callback = null, $useAlias = false, bool $disableExtraConditions = false)
 * @method static Builder|Product rightJoinRelationshipUsingAlias($relationName, $callback = null, bool $disableExtraConditions = false)
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereGameGenreIs(string $genre_id)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereProduct()
 * @method static Builder|Product whereProductCategoryIs(string $category_id)
 * @method static Builder|Product whereQuantity($value)
 * @method static Builder|Product whereType($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 *
 * @mixin Eloquent
 */
class Product extends Model implements \Spatie\MediaLibrary\HasMedia
{
    use HasFactory,
        HasScopes,
        InteractsWithMedia;

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getImage(): string
    {
        return $this->file->getFile() ?? asset('default_image.png');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class,);
    }
}
