<?php

namespace App\Models;

use App\Traits\Category\HasMutators;
use App\Traits\Category\HasScopes;
use App\Traits\Filterable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property array $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 *
 * @method static Builder|Category filterBy($filters)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCityId($value)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class Category extends BaseModel implements HasMedia
{
    use InteractsWithMedia,
        HasMutators;

    protected $fillable = ['name'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getImage(): string
    {
        return $this->file->getFile() ?? asset('default_image.png');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('category')
            ->height(368)
            ->width(232);
    }

    public function getImageAttribute(){
        return $this->getMedia('categories')->last();
    }
}
