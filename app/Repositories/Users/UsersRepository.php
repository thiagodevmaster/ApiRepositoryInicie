<?php

namespace App\Repositories\Users;

use Exception;
use Illuminate\Support\Facades\Http;

class UsersRepository
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

    public function all(int $page=1, int $per_page=20): array
    {
        try{
            return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
                ->get("https://gorest.co.in/public/v2/users?page={$page}&per_page={$per_page}")->json();
        }catch(Exception $e){
            return [];
        }
        
    }

    public function addUser(array $data)
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->post('https://gorest.co.in/public/v2/users', $data);

    }

    public function findUserById(int $id): array
    {
        try{
            return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
                ->get("https://gorest.co.in/public/v2/users/{$id}")->json(); 
        }catch(Exception $e){
            return [];
        }
        
    }

    public function updateUser(array $data, int $id)
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->patch("https://gorest.co.in/public/v2/users/{$id}", $data);
    }

    public function deleteUser(int $id)
    {
        return Http::withHeaders([$this->header, 'Authorization'=> $this->apiKey])
            ->delete("https://gorest.co.in/public/v2/users/{$id}");
    }


}