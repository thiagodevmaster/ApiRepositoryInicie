<?php

namespace App\Repositories\Posts;

use Illuminate\Support\Facades\Http;

class PostRepository
{
    protected $apiKey;
    private $header = [
        'Accept'        => 'application/json',
        'Content-Type'  => 'application/json',
    ];

    public function __construct()
    {
        $this->apiKey = env('API_KEY');
    }

    public function allPosts(int $id): array
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->get("https://gorest.co.in/public/v2/users/{$id}/posts")->json();
    }

    public function addPost(int $id, array $data)
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->post("https://gorest.co.in/public/v2/users/{$id}/posts", $data);
    }

    public function addAll(int $id, array $data)
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->post("https://gorest.co.in/public/v2/users/{$id}/todos", $data);
    }

    public function findPostById(int $id): array
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->get("https://gorest.co.in/public/v2/users/{$id}/posts")->json();
    }
}