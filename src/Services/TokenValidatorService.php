<?php
/**
 * Created by PhpStorm.
 * User: mariano
 * Date: 17/10/18
 * Time: 14:25
 */

namespace App\Services;


class TokenValidatorService
{

    public function validate(string $token)
    {
        $authorizationType = 'Bearer';
        $desiredToken = '123a';
        $tokenEvaluated = $authorizationType.' '.$desiredToken;
        $result = ( $token === $tokenEvaluated)? true : false ;
        return $result;
    }

}