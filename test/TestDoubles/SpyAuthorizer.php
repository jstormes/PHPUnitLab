<?php
/**
 * Created by PhpStorm.
 * User: jstormes
 * Date: 6/27/2018
 * Time: 2:49 PM
 */

namespace test;

use App\Authorizer;

class SpyAuthorizer implements Authorizer
{

    /** @var bool  */
    private $called = false;

    /**
     * @param String $username
     * @param String $password
     * @return bool
     */
    public function authorize(String $username, String $password): bool
    {
        // TODO: Implement authorize() method.
        $this->called = true;
        return true;
    }

    public function isAuthorizeCalled()
    {
        return $this->called;
    }
}