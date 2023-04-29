<?php

namespace App\Repositories\Users;

use Exception;
use Illuminate\Support\Facades\Http;

class UsersRepository
{
    private $header = [
        'Accept'        => 'application/json',
        'Content-Type'  => 'application/json',
        'Authorization' => 'Bearer 383247dccffbb3325bbaada038c111dc16223dc40aff8aa0cb7dc071d6830eda' 
    ];

    public function all(int $page=1, int $per_page=20): array
    {
        try{
            return Http::withHeaders($this->header)
                ->get("https://gorest.co.in/public/v2/users?page={$page}&per_page={$per_page}")->json();
        }catch(Exception $e){
            return [];
        }
        
    }

    public function addUser(array $data)
    {
        return Http::withHeaders($this->header)
            ->post('https://gorest.co.in/public/v2/users', $data);

    }

    public function findUserById(int $id): array
    {
        try{
            return Http::withHeaders($this->header)
                ->get("https://gorest.co.in/public/v2/users/{$id}")->json(); 
        }catch(Exception $e){
            return [];
        }
        
    }

    public function updateUser(array $data, int $id)
    {
        return Http::withHeaders($this->header)
            ->patch("https://gorest.co.in/public/v2/users/{$id}", $data);
    }

    public function deleteUser(int $id)
    {
        return Http::withHeaders($this->header)->delete("https://gorest.co.in/public/v2/users/{$id}");
    }


}