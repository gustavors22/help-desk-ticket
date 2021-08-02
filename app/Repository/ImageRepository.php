<?php

namespace App\Repository;

use App\Models\Models\Image;

class ImageRepository
{
    private $solution;

    function __construct()
    {
        $this->solution = new Image();
    }

    public function save($image)
    {
        return $this->solution->create($image);
    }
}