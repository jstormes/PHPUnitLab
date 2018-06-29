<?php
/**
 * Created by PhpStorm.
 * User: jstormes
 * Date: 6/27/2018
 * Time: 12:26 PM
 */

namespace App;

interface Authorizer
{
    public function authorize(String $username, String $password) : bool ;
}