<?php
/**
 * Created by PhpStorm.
 * User: jstormes
 * Date: 6/27/2018
 * Time: 2:48 PM
 */

namespace test;

use App\Authorizer;

class StubAuthorizerTrue implements Authorizer
{

    /**
     * @param String $username
     * @param String $password
     * @return bool
     */
    public function authorize(String $username, String $password): bool
    {
        // TODO: Implement authorize() method.
        return true;
    }
}