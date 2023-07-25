<?php

namespace App\SubActions\Product;

use App\Facades\Media;
use App\Models\Product;
use App\Tasks as Tasks;

class UploadMediaSubAction
{
    public function run(Product $product, ?array $files, bool $delete_current_media = true): void
    {
        if ($files) {
            if ($delete_current_media) {
                $product->deleteMedias();
            }
            foreach ($files as $file) {
                app(Tasks\Product\CreateMediaTask::class)->run(
                    $product, Media::addMedia($file)->toStoragePath(config('filesystems.storage.product'))
                );
            }
        }
    }
}
