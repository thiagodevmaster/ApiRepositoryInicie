<?php

namespace App\Repositories\Posts;

use Illuminate\Support\Facades\Http;

class PostRepository
{
    private $header = [
        'Accept'        => 'application/json',
        'Content-Type'  => 'application/json',
        'Authorization' => 'Bearer 383247dccffbb3325bbaada038c111dc16223dc40aff8aa0cb7dc071d6830eda' 
    ];

    public function allPosts(int $id): array
    {
        return Http::withHeaders($this->header)->get("https://gorest.co.in/public/v2/users/{$id}/posts")->json();
    }

    public function addPost(int $id, array $data)
    {
        return Http::withHeaders($this->header)->post("https://gorest.co.in/public/v2/users/{$id}/posts", $data);
    }

    public function addAll(int $id, array $data)
    {
        return Http::withHeaders($this->header)->post("https://gorest.co.in/public/v2/users/{$id}/todos", $data);
    }

    public function findPostById(int $id): array
    {
        return Http::withHeaders($this->header)->get("https://gorest.co.in/public/v2/users/{$id}/posts")->json();
    }
}