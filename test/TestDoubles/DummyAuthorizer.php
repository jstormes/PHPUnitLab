<?php
/**
 * Created by PhpStorm.
 * User: jstormes
 * Date: 6/27/2018
 * Time: 12:29 PM
 */

namespace test;

use App\Authorizer;

class DummyAuthorizer implements Authorizer
{

    /**
     * @param String $username
     * @param String $password
     * @return bool
     */
    public function authorize(String $username, String $password): bool
    {
        return null;
    }
}