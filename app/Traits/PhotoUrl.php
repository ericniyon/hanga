<?php

namespace App\Traits;

trait PhotoUrl
{
    public function getPhotoUrl($name): string
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=F34D10&background=FBCAB8';
    }
}
