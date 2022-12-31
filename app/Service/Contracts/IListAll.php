<?php

namespace App\Service\Contracts;

use App\Models\Movie;

/**
 * @return array<Movie>
 */
interface IListAll{
    public function listAll(): mixed;
}
