<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_login_form()
    {
       $response = $this->get('/login');
       $response->assertStatus(200);
    }

    public function test_register_form()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
    public function test_register_verify_form()
    {
        $response = $this->get('/register_verify');
        $response->assertStatus(200);
    }
}