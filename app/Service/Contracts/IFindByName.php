<?php

namespace App\Service\Contracts;

use App\Models\Movie;

interface IFindByName{
    public function findByName(string $name): Movie|null;
}
