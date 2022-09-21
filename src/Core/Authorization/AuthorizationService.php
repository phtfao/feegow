<?php

namespace Phtfao\Feegow\Core\Authorization;

class AuthorizationService
{

    public static function getAuthorizationToken(): string
    {
        return env('FEEGOW_AUTHORIZATION_TOKEN', '');
    }
}
