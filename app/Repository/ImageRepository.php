<?php

namespace App\Repository;

use App\Models\Models\Image;

class ImageRepository
{
    private $image;

    function __construct()
    {
        $this->image = new Image();
    }

    public function save($image)
    {
        return $this->image->create($image);
    }

    public function delete($ticket_id)
    {
        return $this->image->where('ticket_id', $ticket_id)->delete();
    }
}