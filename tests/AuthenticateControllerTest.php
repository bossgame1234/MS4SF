<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/20/2015
 * Time: 9:42 PM
 */
class AuthenticateControllerTest extends TestCase
{
    public function testAuthenticate(){
        $this->action('POST', 'AuthenticateController@authenticate', array('username' => "testAuth", "password"=>"testAuth"));
        $this->assertResponseStatus(200);
        $this->action('POST', 'AuthenticateController@authenticate', array('username' => "testAuth", "password"=>"2151561"));
        $this->assertResponseStatus(401);
        $this->action('POST', 'AuthenticateController@authenticate', array('username' => "2151561", "password"=>"testAuth"));
        $this->assertResponseStatus(401);
    }
}