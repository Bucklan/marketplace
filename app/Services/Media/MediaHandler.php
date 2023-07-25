<?php

namespace App\Services\Media;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Storage;

class MediaHandler
{
    private const DISK_NAME = 'local';

    protected UploadedFile|string $file;

    protected string $storage_path;

    protected FilesystemAdapter $disk;

    public function __construct()
    {
        $this->disk = Storage::disk(self::DISK_NAME);
    }

    public function addMedia(UploadedFile|string $file): MediaHandler
    {
        $this->file = $file;

        return $this;
    }

    public function toStoragePath(string $storage_path, ?string $current_file_path = null): array
    {
        $this->storage_path = $storage_path;

        $this->deleteFile($current_file_path);

        return $this->upload();
    }

    public function deleteFile(?string $file_path): void
    {
        if ($file_path && $this->disk->exists($file_path)) {
            $this->disk->delete($file_path);
        }
    }

    private function upload(): array
    {
        return $this->file instanceof UploadedFile
            ? $this->uploadAndGetResponse()
            : $this->uploadFromContentAndGetResponse();
    }

    private function uploadAndGetResponse(): array
    {
        return [
            'name' => $this->file->getClientOriginalName(),
            'mime' => $this->file->getMimeType(),
            'ext' => $this->file->getClientOriginalExtension(),
            'size' => $this->file->getSize(),
            'url' => $this->file->store($this->storage_path, self::DISK_NAME),
        ];
    }

    private function uploadFromContentAndGetResponse(): array
    {
        $this->disk->put($this->storage_path, $this->file);

        $exploded_path = explode('/', $this->storage_path);
        $filename = end($exploded_path);
        $exploded_filename = explode('.', $filename);

        return [
            'name' => $filename,
            'mime' => $this->disk->mimeType($this->storage_path),
            'ext' => end($exploded_filename),
            'size' => $this->disk->size($this->storage_path),
            'url' => $this->storage_path,
        ];
    }
}
