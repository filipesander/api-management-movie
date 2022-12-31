<?php

namespace App\Service;

use App\Models\Movie;
use App\Service\Contracts\ICreate;

class MovieService implements ICreate{

    // TODO Não pode cadastrar mesmo nome
    public function create(mixed $data): Movie
    {
        return Movie::create($data);
    }


}
