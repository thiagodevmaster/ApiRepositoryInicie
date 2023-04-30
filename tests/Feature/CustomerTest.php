<?php

namespace Tests\Feature;

use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test*/
    public function only_logged_in_users_can_see_customers_list(): void
    {
        $this->get('/')->assertRedirect('/login');
        $this->get('/home')->assertRedirect('/login');
    }

    /** @test*/
    public function only_logged_in_users_can_access_customer_creation()
    {
        $this->get('/home/create')->assertRedirect('/login');
    }

    /** @test*/
    public function only_logged_in_users_can_search_for_clients()
    {
        $this->get('/home/search')->assertRedirect('/login');
    }

    /** @test */
    public function only_logged_in_users_can_edit_clients()
    {
        $this->get('/home/1175984/edit')->assertRedirect('login');
    }

    /** @test */
    public function only_logged_in_users_can_remove_clients()
    {
        $this->delete('/home/1175984')->assertRedirect('login');
    }

    /** @test */
    public function  only_logged_in_users_can_see_list_of_posts()
    {
        $this->get('/posts/1268635')->assertRedirect('login');
    }

    /** @test */
    public function only_logged_in_users_can_create_a_post()
    {
        $this->get('/posts/create/1268635')->assertRedirect('login');
    }
}
