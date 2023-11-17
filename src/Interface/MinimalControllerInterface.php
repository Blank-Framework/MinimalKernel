<?php

namespace BlankFramework\MinimalKernel\Interface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface MinimalControllerInterface
{
    public function get(Request $request): ?Response;
    public function post(Request $request): ?Response;
    public function put(Request $request): ?Response;
    public function patch(Request $request): ?Response;
    public function delete(Request $request): ?Response;
    public function connect(Request $request): ?Response;
    public function options(Request $request): ?Response;
    public function trace(Request $request): ?Response;
    public function head(Request $request): ?Response;
}
