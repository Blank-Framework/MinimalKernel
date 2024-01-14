<?php

namespace BlankFramework\MinimalKernel\Interface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface InvokableControllerInterface
{
    public function __invoke(Request $request): Response;
}
