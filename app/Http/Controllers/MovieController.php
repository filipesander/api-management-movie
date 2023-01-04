<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Movie;
use App\Service\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public $serviceMovie;

    public function __construct()
    {
        $this->serviceMovie = new MovieService();
    }

    public function create(Request $request)
    {
        return $this->serviceMovie->create($request->all());
    }

    public function findByTitle(Request $request)
    {
        $data = $request->all();
        $result = $this->serviceMovie->findByTitle($data['title']);

        if (empty($result)) {
            return response()->json(['error' => 'Movie Not Found'], 404);
        }

        return $result;
    }

    public function listAll()
    {
        return $this->serviceMovie->listAll();
    }

    public function findById($id): mixed
    {
        $result = $this->serviceMovie->findById($id);

        if(empty($result)){
            return response()->json(['error' => 'Movie Not Found'], 404);
        }

        return $result;
    }

}
