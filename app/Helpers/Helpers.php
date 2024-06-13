<?php

use Illuminate\Support\Facades\Storage;

function photoPath(?string $filename, string $type): string
{
    $filename ??= 'default.jpg';

    return Storage::url("images/{$type}/{$filename}");
}

function userPhotoPath(?string $filename): string
{
    return photoPath($filename, 'user_photos');
}
