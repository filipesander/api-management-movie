<?php

namespace App\Service\Contracts;

use App\Models\Movie;

interface IFindByTitle{
    public function findByTitle(string $title): Movie|null;
}
