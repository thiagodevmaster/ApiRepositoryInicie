<?php

namespace Tests\Feature;

use App\Repositories\Comments\CommentsRepository;
use App\Repositories\Posts\PostRepository;
use App\Repositories\Users\UsersRepository;
use Tests\TestCase;

use function PHPUnit\Framework\assertIsArray;

class ApiTest extends TestCase
{

    private $data = [
        'name' => 'Me Exclua',
        'gender' => 'Male',
        'email' => 'me_exclua@emailexample.com',
        'status' => 'active'
    ];

    /** @test */
    public function creating_a_client_using_the_api()
    {
        $repository = new UsersRepository();
        $this->assertEquals(201, $repository->addUser($this->data)->status());
    }

    /** @test */
    public function viewing_all_customers_using_api()
    {
        $repository = new UsersRepository();

        $this->assertCount(20, $repository->all());
    } 

    /** @test */
    public function looking_for_the_id_a_client_using_api()
    {
        $repository = new UsersRepository();

        $user = $repository->findUserById('1301417');
        $this->assertIsArray($user);
        $this->assertCount(5, $user);
        $this->assertEquals('Baidehi Patil', $user['name']);
    }

    /** @test */
    public function updating_a_client_using_the_api()
    {
        $repository = new UsersRepository();

        $data = [
            'name' => 'novo nome atualizado',
            'email' => 'malik_ghanashyam@pfannerstill-bahringer.example',
            'status' => 'active'
        ];

        $this->assertEquals(200, $repository->updateUser($data, '1301418')->status());
    }

    /** @test */
    public function delete_a_client_using_the_api()
    {
        $repository = new UsersRepository();
        $user = $repository->all()[0];

        $this->assertEquals(204, $repository->deleteUser($user['id'])->status());
    }

    /** @test */
    public function fetching_all_posts_using_the_api()
    {
        $repository = new PostRepository();
        $posts = $repository->allPosts('1301418');

        $this->assertIsArray($posts);
    }

    /** @test */
    public function adding_a_post_using_the_API()
    {
        $repository = new PostRepository();
        $data = [
            'user_id' => '1301418',
            'title'   => 'Post para excluir',
            'body'    => 'conteudo para excluir',
        ];

        $this->assertEquals(201, $repository->addPost('1301418', $data)->status());
    }

    /** @test */
    public function find_a_posts_by_id_using_the_API()
    {
        $repository = new PostRepository();
        $posts = $repository->findPostById('1301418');

        $this->assertIsArray($posts);
    }

    /** @test */
    public function adding_a_comment_using_the_api()
    {
        $repository = new CommentsRepository();
        $data = [
            'post_id' => '16860',
            'name' => 'teste de comentario',
            'email' => 'teste@teste.com',
            'body' => 'comentado qualquer coisa para testar'
        ];

        $this->assertEquals(201, $repository->addComment('16860', $data)->status());
    }

    /** @test */
    public function get_all_comments_using_the_api()
    {
        $repository = new CommentsRepository();
        $comments = $repository->getAll('16860');
        
        $this->assertIsArray($comments);
    }

    /** @test */
    public function delete_a_comments_using_the_api()
    {
        $repository = new CommentsRepository();
        $comments = $repository->getAll('16860');
        $id = $comments[0]['id'];
        
        $this->assertEquals(null, $repository->deleteComment($id));
    }




}
