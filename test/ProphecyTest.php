<?php
/**
 * Created by PhpStorm.
 * User: jstormes
 * Date: 6/28/2018
 * Time: 12:46 PM
 */

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

use App\Authorizer;
use App\System;

class ProphecyTest extends TestCase
{
    public function testConstructorUsingDummy()
    {
        $authorizer = $this->prophesize( Authorizer::class );

        $system = new System($authorizer->reveal());

        $this->assertInstanceOf(System::class, $system, 'Failed to create System object.');
    }

    public function testLoginUserUsingStub()
    {
        $authorizer = $this->prophesize( Authorizer::class );
        $authorizer->authorize( Argument::any(), Argument::any() )
            ->willReturn(true);

        $system = new System($authorizer->reveal());

        $this->assertTrue($system->loginUser('test', 'test'), 'loginUser failed.');
    }

    public function testLoginCalledUsingSpy()
    {
        $authorizer = $this->prophesize( Authorizer::class );
        $authorizer->authorize( Argument::any(), Argument::any() )
            ->willReturn(true);

        $system = new System($authorizer->reveal());
        $system->loginUser('test', 'test');

        $authorizer->authorize(Argument::any(), Argument::any())->shouldHaveBeenCalled();
    }
}