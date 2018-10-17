<?php
/**
 * Created by PhpStorm.
 * User: mariano
 * Date: 17/10/18
 * Time: 14:28
 */

namespace App\EventListener;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

use App\Services\TokenValidatorService;


class TokenListener
{
    private $tokenValidatorService;

    public function __construct(TokenValidatorService $tokenValidatorService)
    {
        $this->tokenValidatorService = $tokenValidatorService;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $token = $event->getRequest()->headers->get('Authorization');

        if (!$this->tokenValidatorService->validate($token))
            throw new AccessDeniedHttpException('Sin Autorización. Token inválido.');
    }

}