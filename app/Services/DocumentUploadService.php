<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DocumentUploadService
{
    protected $disk;
    protected $baseFolder;

    public function __construct($disk = 'local', $baseFolder = 'uploads')
    {
        $this->disk = $disk;
        $this->baseFolder = $baseFolder;
    }

    /**
     * Upload a document to storage.
     */
    public function upload(UploadedFile $file, string $type = 'documents', string $prefix = ''): string
    {
        $path = $this->baseFolder . '/' . $type;

        if ($prefix) {
            $path .= '/' . $prefix;
        }

        return $file->store($path, $this->disk);
    }

    /**
     * Delete a document from storage.
     */
    public function delete(string $filePath): void
    {
        Storage::disk($this->disk)->delete($filePath);
    }

    /**
     * Get document URL.
     */
    public function getUrl(string $filePath): string
    {
        return Storage::disk($this->disk)->url($filePath);
    }
}
