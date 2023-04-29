<?php

namespace App\Http\Controllers;

use App\Repositories\Users\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    public function __construct(private UsersRepository $repository)
    {
    }


    public function index(Request $request)
    {   
        if(!isset($request->page) || !isset($request->per_page)){
            $users = $this->repository->all();
            return view('users.index', [
                'users' => $users
            ]);
        }
        
        $users = $this->repository->all($request->page, $request->per_page);
        return view('users.index', [
            'users' => $users
        ]);
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $data = [
            'name'   => $request->name,
            'gender' => $request->gender,
            'email'  => $request->email,
            'status' => 'active'
        ];

        $this->repository->addUser($data);
        
        return to_route('users.index');
    }


    public function edit(int $id)
    {   
        $user = $this->repository->findUserById($id);
        
        return view('users.edit', [
            'user' => $user,
            'id' => $id
        ]);
    }


    public function update(Request $request, int $id)
    {
        $data = [
            'name'   => $request->name,
            'email'  => $request->email,
            'status' => 'active'
        ];

        $this->repository->updateUser($data, $id);

        return to_route('users.index');
    }

    public function destroy(int $id)
    {
        $this->repository->deleteUser($id);
        
        return to_route('users.index')->with("success_message", '');
    }
}
