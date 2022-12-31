<?php

namespace App\Service\Contracts;

use App\Models\Movie;

interface ICreate{
    public function create(mixed $data): Movie;
}
