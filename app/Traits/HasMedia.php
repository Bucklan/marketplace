<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasMedia
{
    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function getFile(): ?string
    {
        return $this->file->getFile() ?? asset('default_image.png');
    }

    public function filterMediasByType(string $type): ?Collection
    {
        return $this->files->filter(fn(File $file) => $file->type == $type);
    }

    public function findMediaByType(string $type): ?File
    {
        return $this->files
            ->filter(fn(File $file) => $file->type == $type)
            ->first();
    }

    public function getMedia($type = false, string $by_default = null): string
    {
        if ($type) {
            $media = $this->findMediaByType($type);
        } else {
            $media = $this->file;
        }

        return $media
            ? $media->getFile()
            : (!is_null($by_default) ? $by_default : asset('default_image.png'));
    }

    public function deleteMedias(string $type = null): void
    {
        if ($type) {
            $this->filterMediasByType($type)->each->delete();
        } else {
            $this->files->each->delete();
        }
    }
}
