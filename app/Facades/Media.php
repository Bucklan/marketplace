<?php

namespace App\Facades;

use App\Services\Media\MediaHandler;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Facade;

/**
 * App\Facades\Media
 *
 * @method static MediaHandler addMedia(UploadedFile|string $file, $current_file_path = null)
 * @method static array toStoragePath(string $storage_path, ?string $current_file_path = null)
 * @method static void deleteFile(?string $file_path)
 */
class Media extends Facade
{
    protected static function getFacadeAccessor(): MediaHandler
    {
        return new MediaHandler();
    }
}
