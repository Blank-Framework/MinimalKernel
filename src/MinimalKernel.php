<?php

namespace BlankFramework\MinimalKernel;

use BlankFramework\MinimalKernel\Interface\MinimalControllerInterface;
use Symfony\Component\HttpFoundation\Request;

class MinimalKernel
{
    /**
     * @throws \Exception
     */
    public static function run(Request $request, MinimalControllerInterface $controller): void
    {
        $response = match ($request->getMethod()) {
            'GET' => $controller->get($request),
            'POST' => $controller->post($request),
            'PUT' => $controller->put($request),
            'PATCH' => $controller->patch($request),
            'HEAD' => $controller->head($request),
            'DELETE' => $controller->delete($request),
            'CONNECT' => $controller->connect($request),
            'TRACE' => $controller->trace($request),
            default => null,
        };

        if ($response === null) {
            throw new \Exception('Method Not Allowed');
        }

        $response->send();
    }
}
