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

    public function store(Request $request)
    {
        return $this->serviceMovie->create($request->all());
    }

    public function findByName(Request $request)
    {
        $data = $request->all();
        $result = $this->serviceMovie->findByName($data['name']);

        if (empty($result)) {
            return response()->json(['error' => 'Movies Not Found'], 404);
        }

        return $result;
    }

    public function listAll()
    {
        return $this->serviceMovie->listAll();
    }

    public function findById($id): Movie
    {
        return $this->serviceMovie->findById($id);
    }

}
