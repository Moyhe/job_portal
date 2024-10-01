<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait GetImage
{
    public function getThumbnail()
    {

        if (str_starts_with($this->feature_image, 'https')) {
            return $this->feature_image;
        }

        return Storage::url($this->feature_image);
    }
}
