<?php

namespace App\Service\Contracts;

use App\Models\Movie;

interface IFindById{
    public function findById(int $id): mixed;
}
