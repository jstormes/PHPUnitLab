<?php
/**
 * Created by PhpStorm.
 * User: jstormes
 * Date: 6/27/2018
 * Time: 2:52 PM
 */

use PHPUnit\Framework\TestCase;

use test\DummyAuthorizer;
use test\StubAuthorizerTrue;
use test\SpyAuthorizer;
use App\System;


class NoMockToolsTest extends TestCase
{
    public function testConstructorUsingDummy()
    {
        $authorizer = new DummyAuthorizer();

        $system = new System($authorizer);

        $this->assertInstanceOf(System::class, $system, 'Failed to create System object.');
    }

    public function testLoginUserUsingStub()
    {
        $authorizer = new StubAuthorizerTrue();

        $system = new System($authorizer);

        $this->assertTrue($system->loginUser('test', 'test'), 'loginUser failed.');

    }

    public function testLoginCalledUsingSpy()
    {
        $authorizer = new SpyAuthorizer();

        $system = new System($authorizer);

        $system->loginUser('test', 'test');

        $this->assertTrue($authorizer->isAuthorizeCalled(),'Authorizer->authorize() was not called by System->loginUser()');

    }
}