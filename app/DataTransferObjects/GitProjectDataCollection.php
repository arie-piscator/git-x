<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class GitProjectDataCollection extends DataTransferObjectCollection
{
    public function current(): GitProjectData
    {
        return parent::current();
    }

    public static function create(array $data, $callback): GitProjectDataCollection
    {
        $collection = [];

        foreach ($data as $item) {
            $collection[] = $callback($item);
        }

        return new self($collection);
    }
}
