<?php
/**
 * Created by PhpStorm.
 * User: jstormes
 * Date: 6/28/2018
 * Time: 11:21 AM
 */

use PHPUnit\Framework\TestCase;
use App\Authorizer;
use App\System;

class MockeryTest extends TestCase
{

    public function testConstructorUsingDummy()
    {
        $authorizer = \Mockery::mock(Authorizer::class);

        $system = new System($authorizer);

        $this->assertInstanceOf(System::class, $system, 'Failed to create System object.');
    }

    public function testLoginUserUsingStub()
    {
        $authorizer = \Mockery::mock(Authorizer::class);
        $authorizer->shouldReceive('authorize')->andReturn(true);

        $system = new System($authorizer);

        $this->assertTrue($system->loginUser('test', 'test'), 'loginUser failed.');
    }

//    public function testLoginCalledUsingSpy()
//    {
//        $authorizer = \Mockery::spy(Authorizer::class );
//
//        $system = new System($authorizer);
//        $system->loginUser('test', 'test');
//
//        $authorizer->shouldHaveReceived()->authorize();
//    }
}