<?php

namespace App\Service;

use App\Models\Movie;
use App\Service\Contracts\ICreate;
use App\Service\Contracts\IFindByName;
use App\Service\Contracts\IListAll;

class MovieService implements ICreate, IFindByName, IListAll{

    // TODO Não pode cadastrar mesmo nome
    public function create(mixed $data): Movie
    {
        return Movie::create($data);
    }

    public function findByName(string $name): Movie
    {
        return Movie::where('name', $name)->first();
    }

    public function listAll(): mixed
    {
        return Movie::paginate(5);
    }


}
