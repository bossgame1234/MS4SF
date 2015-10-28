<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/20/2015
 * Time: 10:37 PM
 */
class UserControllerTest extends TestCase
{
    public function testRegister(){
        $this->action('POST', 'userController@register', array('username' => "testReg", "password"=>"testReg","name"=>"Reg","lastname"=>"Reg","phoneNumber"=>"083000000","email"=>"reg@reg.com","role"=>"test"));
        $this->seeInDatabase("users",array('username' => "testReg"));
        $this->action('POST', 'userController@register', array('username' => "testReg", "password"=>"testReg","name"=>"Reg","lastname"=>"Reg","phoneNumber"=>"083000000","email"=>"reg@reg.com","role"=>"test"));
        $this->assertResponseStatus(502);
        $this->action('POST', 'userController@register', array('username' => "testReg2", "password"=>"testReg","name"=>"Reg","lastname"=>"Reg","farmID"=>(\App\Farm::where("name","=","TestActivityFarm")->first()->id*100+320001),"phoneNumber"=>"083000000","email"=>"reg@reg.com","role"=>"test"));
        $this->seeInDatabase("users",array('username' => "testReg2"));
        $this->action('POST', 'userController@register', array('username' => "testReg2", "password"=>"testReg","name"=>"Reg","lastname"=>"Reg","farmID"=>1,"phoneNumber"=>"083000000","email"=>"reg@reg.com","role"=>"test"));
        $this->assertResponseStatus(502);
    }
    public function testGetMemberProfile(){
        $this->action('GET', 'userController@getMemberProfile',array('username'=>"testReg"));
        $this->assertResponseStatus(200);
        $this->seeJsonContains(array("username"=>"testReg"));
        $this->action('GET', 'userController@getMemberProfile',array("id" => \App\User::where("username","=","testReg")->first()->id));
        $this->assertResponseStatus(200);
        $this->seeJsonContains(array("username"=>"testReg"));
        $this->action('GET', 'userController@getMemberProfile');
        $this->isEmpty();
        $this->action('GET', 'userController@getMemberProfile',array('username'=>"abcd1234"));
        $this->isEmpty();
        $this->action('GET', 'userController@getMemberProfile',array('id'=>"abcd1234"));
        $this->isEmpty();
    }
    public function testUpdateProfile(){
        $this->action('PUT', 'userController@updateProfile', array('id'=>\App\User::where("username","=","testReg")->first()->id,'username' => "testReg", "password"=>"testRegUpdate","name"=>"Reg2","lastname"=>"Reg2","phoneNumber"=>"083111111","email"=>"reg2@reg.com","role"=>"test"));
        $this->seeInDatabase("users",array('username' => "testReg","phoneNumber"=>"083111111"));
        $this->action('PUT', 'userController@updateProfile');
        $this->seeStatusCode(500);
    }

}