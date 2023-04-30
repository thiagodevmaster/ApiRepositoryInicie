<?php

namespace App\Repositories\Comments;

use Illuminate\Support\Facades\Http;

class CommentsRepository
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

    public function addComment(int $id, array $data)
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->post("https://gorest.co.in/public/v2/posts/{$id}/comments", $data);
    }

    public function getAll(int $idPost): array
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->get("https://gorest.co.in/public/v2/posts/{$idPost}}/comments")->json();
    }

    public function deleteComment(int $id)
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->delete("https://gorest.co.in/public/v2/comments/{$id}")->json();
    }
}