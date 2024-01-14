<?php

namespace BlankFramework\MinimalKernel;

use BlankFramework\MinimalKernel\Interface\InvokableControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * This kernel requires invokable classes. You then specify for each method
 * the controller that needs to be invoked. You must also specify a response
 * in the event a controller has not been specified. This is to ensure that
 * a method not allowed response can be returned.
 */
class InvokableMinimalKernel
{
    /**
     * @param class-string<InvokableControllerInterface>|null $getController
     * @param class-string<InvokableControllerInterface>|null $postController
     * @param class-string<InvokableControllerInterface>|null $putController
     * @param class-string<InvokableControllerInterface>|null $patchController
     * @param class-string<InvokableControllerInterface>|null $deleteController
     * @param class-string<InvokableControllerInterface>|null $headController
     * @param class-string<InvokableControllerInterface>|null $connectController
     * @param class-string<InvokableControllerInterface>|null $optionsController
     * @param class-string<InvokableControllerInterface>|null $traceController
     */
    public static function handle(
        Request $request,
        Response $methodNotAllowedResponse,
        string $getController = null,
        string $postController = null,
        string $putController = null,
        string $patchController = null,
        string $deleteController = null,
        string $headController = null,
        string $connectController = null,
        string $optionsController = null,
        string $traceController = null,
    ): Response {
        $controller = match ($request->getMethod()) {
            'GET' => $getController,
            'POST' => $postController,
            'PUT' => $putController,
            'PATCH' => $patchController,
            'DELETE' => $deleteController,
            'HEAD' => $headController,
            'CONNECT' => $connectController,
            'OPTIONS' => $optionsController,
            'TRACE' => $traceController,
            default => null,
        };

        if (is_null($controller)) {
            return $methodNotAllowedResponse;
        }

        $controllerInstance = new $controller();
        return $controllerInstance($request);
    }
}
