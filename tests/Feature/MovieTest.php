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
}
