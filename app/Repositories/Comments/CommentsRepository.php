<?php

namespace App\Repositories\Comments;

use Illuminate\Support\Facades\Http;

class CommentsRepository
{
    private $header = [
        'Accept'        => 'application/json',
        'Content-Type'  => 'application/json',
        'Authorization' => 'Bearer 383247dccffbb3325bbaada038c111dc16223dc40aff8aa0cb7dc071d6830eda' 
    ];

    public function addComment(int $id, array $data)
    {
        return Http::withHeaders($this->header)->post("https://gorest.co.in/public/v2/posts/{$id}/comments", $data);
    }

    public function getAll(int $idPost): array
    {
        return Http::withHeaders($this->header)->get("https://gorest.co.in/public/v2/posts/{$idPost}}/comments")->json();
    }

    public function deleteComment(int $id)
    {
        return Http::withHeaders($this->header)->delete("https://gorest.co.in/public/v2/comments/{$id}")->json();
    }
}