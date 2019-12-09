<?php

class AuthTest extends TestCase
{
    // ...
    
    public function test_user_true()
    {
        $parameters = [
            'email' => 'user@example.com',
            'password' => 'user',
        ];
        $this->post("api/login", $parameters, []);
        $this->seeStatusCode(200);
    }

    public function test_user_false()
    {
        
        $parameters = [
            'email' => 'user@example.com',
            'password' => 'userw',
        ];
        $this->post("api/login", $parameters, []);
        $this->seeStatusCode(401);
    }

    public function test_user_required()
    {
        
        $parameters = [
            'email' => '',
            'password' => '',
        ];
        $this->post("api/login", $parameters, []);
        $this->seeStatusCode(422);
    }
}