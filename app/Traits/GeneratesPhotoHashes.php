<?php

namespace App\Traits;

trait GeneratesPhotoHashes
{
    public function generatePhotoHash(int $length = 8): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $hash = '';

        for ($i = 0; $i < $length; $i++) {
            $hash .= $chars[random_int(0, 61)];
        }

        return $hash;
    }
}
