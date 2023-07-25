<?php

namespace App\SubActions\Category;

use App\Facades\Media;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use App\Tasks as Tasks;

class UploadMediaSubAction
{
    public function run(Category $genre, ?UploadedFile $file, bool $delete_current_media = true): void
    {
        if ($file) {
            if ($delete_current_media) {
                $genre->deleteMedias();
            }

            app(Tasks\Category\CreateMediaTask::class)->run(
                $genre, Media::addMedia($file)->toStoragePath(config('filesystems.storage.category'))
            );
        }
    }
}
