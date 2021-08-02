<?php

namespace App\Service;
use App\Repository\ImageRepository;

class ImageService
{
    private $Image;

    function __construct()
    {
        $this->Image = new ImageRepository;
    }

    public function save($data)
    {
        return $this->Image->save($data);
    }
}