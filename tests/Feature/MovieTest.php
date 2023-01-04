<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Ramsey\Uuid\Type\Integer;
use Tests\TestCase;

class MovieTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_find_by_title()
    {
        $movie = Movie::factory(1)->createOne();
        Movie::factory(1)->createOne();

        $response = $this->get("/api/movie?title=$movie->title");
        $response->assertJson(function(AssertableJson $json) use($movie) {

            $json->whereAllType([
                "id"              => "integer",
                "title"           => "string",
                "description"     => "string",
                "category"        => "string",
                "duration"        => "string",
                "classification"  => "string",
            ])->etc();

            $json->whereAll([
                "id"              => $movie->id,
                "title"           => $movie->title,
                "description"     => $movie->description,
                "category"        => $movie->category,
                "duration"        => $movie->duration,
                "classification"  => $movie->classification,
            ]);

        });

        $response->assertStatus(200);
    }

    public function test_find_by_id()
    {
        $movie = Movie::factory(1)->createOne();
        Movie::factory(1)->createOne();

        $response = $this->get("/api/movie/$movie->id");
        $response->assertJson(function(AssertableJson $json) use($movie) {

            $json->whereAllType([
                "id"              => "integer",
                "title"           => "string",
                "description"     => "string",
                "category"        => "string",
                "duration"        => "string",
                "classification"  => "string",
            ])->etc();

            $json->whereAll([
                "id"              => $movie->id,
                "title"           => $movie->title,
                "description"     => $movie->description,
                "category"        => $movie->category,
                "duration"        => $movie->duration,
                "classification"  => $movie->classification,
            ]);

        });

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $movie = [
            "title"             => "Rede Social",
            "description"       => "Um estudante Mark Zuck",
            "category"          => "Drama",
            "duration"          => "2:15h",
            "classification"    => "12 anos"
        ];

        $response = $this->postJson("/api/movie", $movie);

        $response->assertJson(function(AssertableJson $json) use($movie) {

            $json->whereAllType([
                "title"           => "string",
                "description"     => "string",
                "category"        => "string",
                "duration"        => "string",
                "classification"  => "string",
            ])->etc();

            $json->whereAll([
                "title"           => $movie['title'],
                "description"     => $movie['description'],
                "category"        => $movie['category'],
                "duration"        => $movie['duration'],
                "classification"  => $movie['classification'],
            ]);

        });

        $response->assertStatus(201);
    }

    public function test_list_all()
    {

        Movie::factory(7)->create();

        $response = $this->getJson("/api/movie/list");

        $response->assertJson(function(AssertableJson $json) {

            $arrayMovie = $json->toArray()['data'];

            $json->whereAllType([
                "data.0.id"  => "integer"
            ])->etc();

            $this->assertCount(5, $arrayMovie);
        });

        $response->assertStatus(200);
    }

}
