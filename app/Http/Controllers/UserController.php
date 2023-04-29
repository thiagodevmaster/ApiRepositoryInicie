<?php

namespace App\Http\Controllers;

use App\Repositories\Users\UsersRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // ao criar a classe UserConrtoller recebe como depêndencia um repositório de usuários
    // onde serão realizadas todas as tarefas referente ao uso da api
    public function __construct(private UsersRepository $repository)
    {
    }


    // O método index nos leva a página inicial do sistema e também pode ou não receber como parametro 
    // o número da página e a quantidade de usuários por página
    public function index(Request $request)
    {   
        $successMessage = session('success_message');

        if(!isset($request->page) || !isset($request->per_page)){
            $users = $this->repository->all();
            return view('users.index', [
                'users' => $users,
                'successMessage' => $successMessage
            ]);
        }
        
        $users = $this->repository->all($request->page, $request->per_page);
        return view('users.index', [
            'users' => $users,
            'successMessage' => $successMessage
        ]);
    }


    // O método create tem apenas a função de renderizar a  view de criação de usuário
    public function create()
    {
        return view('users.create');
    }


    // O método store de a função de pegar os dados do formulário de criação de usuário
    // retornar o id do usuário criado
    // e de chamar o método do repositório que faz a função de inserção de usuários 
    public function store(Request $request)
    {
        $data = [
            'name'   => $request->name,
            'gender' => $request->gender,
            'email'  => $request->email,
            'status' => 'active'
        ];

        $id = explode('/', $this->repository->addUser($data)->headers()['location'][0])[6];
        $this->repository->addUser($data);
        
        return to_route('users.index')
            ->with('success_message', "User {$data['name']} successfully created and its ID is '$id'");
    }


    // O método edit tem a função de buscar o usuário que queremos editar e
    // renderizar a view de edição
    public function edit(int $id)
    {   
        $user = $this->repository->findUserById($id);
        
        return view('users.edit', [
            'user' => $user,
            'id' => $id
        ]);
    }


    // O método update tem a função de recuperar os novos dados passados no formulário de edição
    // e de chamar o método que atualiza a Api
    public function update(Request $request, int $id)
    {
        $data = [
            'name'   => $request->name,
            'email'  => $request->email,
            'status' => 'active'
        ];

        $this->repository->updateUser($data, $id);

        return to_route('users.index')
            ->with('success_message', "Change made successfully");
    }


    // Este é o metodo que deleta o Usuario da Api (use com moderação kkk)
    public function destroy(int $id)
    {
        $user = $this->repository->findUserById($id);
        $this->repository->deleteUser($id);
        
        return to_route('users.index')
            ->with("success_message", "User {$user['name']} successfully removed");
    }


    public function search(Request $request)
    {
        $users = $this->repository->all();
        $successMessage = session('success_message');
        
        foreach($users as $user){
            if(in_array($request->search_name, $user)){
                return view('users.index', [
                    'search_name' => $request->search_name,
                    'users' => $users,
                    'successMessage' => $successMessage
                ]);
            }
        }
        
        
        return view('users.index', [
            'users' => $users,
            'successMessage' => $successMessage
        ]);
    }
}
