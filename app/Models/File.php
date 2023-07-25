<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Storage;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $name
 * @property string $mime
 * @property string $ext
 * @property int $size
 * @property string $url
 * @property int $fileable_id
 * @property string $fileable_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Model|Eloquent $fileable
 *
 * @method static Builder|File newModelQuery()
 * @method static Builder|File newQuery()
 * @method static Builder|File query()
 * @method static Builder|File whereCreatedAt($value)
 * @method static Builder|File whereExt($value)
 * @method static Builder|File whereFileableId($value)
 * @method static Builder|File whereFileableType($value)
 * @method static Builder|File whereId($value)
 * @method static Builder|File whereMime($value)
 * @method static Builder|File whereName($value)
 * @method static Builder|File whereSize($value)
 * @method static Builder|File whereUpdatedAt($value)
 * @method static Builder|File whereUrl($value)
 *
 * @mixin Eloquent
 */
class File extends BaseModel
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getFile(): ?string
    {
        return Storage::exists($this->url)
            ? asset(Storage::url($this->url))
            : '';
    }
}
