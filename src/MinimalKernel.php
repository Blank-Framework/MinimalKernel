<?php

namespace BlankFramework\MinimalKernel;

use BlankFramework\MinimalKernel\Interface\MinimalControllerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MinimalKernel
{
    /**
     * @throws \Exception
     */
    public static function run(ServerRequestInterface $request, MinimalControllerInterface $controller): void
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

        self::sendResponse($response);
    }

    private static function sendResponse(ResponseInterface $response): void
    {
        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }

        http_response_code($response->getStatusCode());

        echo $response->getBody();
    }
}
