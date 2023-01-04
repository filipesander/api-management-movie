<?php

namespace App\Service;

use App\Models\Movie;
use App\Service\Contracts\ICreate;
use App\Service\Contracts\IFindById;
use App\Service\Contracts\IFindByTitle;
use App\Service\Contracts\IListAll;

class MovieService implements ICreate, IFindByTitle, IListAll, IFindById{

    // TODO Não pode cadastrar mesmo nome
    public function create(mixed $data): Movie
    {
        return Movie::create($data);
    }

    public function findByTitle(string $title): Movie|null
    {
        $response = Movie::where('title', $title)->first();
        return $response;
    }

    public function listAll(): mixed
    {
        return Movie::paginate(5);
    }

    public function findById(int $id): mixed
    {
        $response = Movie::where('id', $id)->first();
        return $response;
    }


}
