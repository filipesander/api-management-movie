<?php

namespace App\Service;

use App\Models\Movie;
use App\Service\Contracts\ICreate;
use App\Service\Contracts\IFindById;
use App\Service\Contracts\IFindByName;
use App\Service\Contracts\IListAll;

class MovieService implements ICreate, IFindByName, IListAll, IFindById{

    // TODO Não pode cadastrar mesmo nome
    public function create(mixed $data): Movie
    {
        return Movie::create($data);
    }

    public function findByName(string $name): Movie|null
    {
        $response = Movie::where('name', $name)->first();
        return $response;
    }

    public function listAll(): mixed
    {
        return Movie::paginate(5);
    }

    public function findById(int $id): Movie
    {
        $responseId = Movie::where('id', $id)->first();
        return $responseId;
    }


}
