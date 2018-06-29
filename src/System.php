<?php
/**
 * Created by PhpStorm.
 * User: jstormes
 * Date: 6/27/2018
 * Time: 2:09 PM
 */

namespace App;

class System
{
    /** @var Authorizer */
    private $authorizer;

    /** @var int */
    private $loginCount = 0;

    public function __construct(Authorizer $authorizer)
    {
        $this->authorizer=$authorizer;
    }

    public function getLoginCount()
    {
        return $this->loginCount;
    }

    public function loginUser(string $user, string $password)
    {
        if ($this->authorizer->authorize($user, $password)===true) {
            $this->loginCount++;
            return true;
        }
        return false;
    }

}