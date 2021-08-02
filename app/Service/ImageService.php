<?php

namespace App\Service;
use App\Repository\ImageRepository;

class ImageService
{
    private $image;

    function __construct()
    {
        $this->image = new ImageRepository;
    }

    public function save($data)
    {
        return $this->image->save($data);
    }

    public function delete($ticket_id)
    {
        return $this->image->delete($ticket_id);
    }
}