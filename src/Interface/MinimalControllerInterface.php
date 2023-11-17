<?php

namespace BlankFramework\MinimalKernel\Interface;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface MinimalControllerInterface
{
    public function get(RequestInterface $request): ?ResponseInterface;
    public function post(RequestInterface $request): ?ResponseInterface;
    public function put(RequestInterface $request): ?ResponseInterface;
    public function patch(RequestInterface $request): ?ResponseInterface;
    public function delete(RequestInterface $request): ?ResponseInterface;
    public function connect(RequestInterface $request): ?ResponseInterface;
    public function options(RequestInterface $request): ?ResponseInterface;
    public function trace(RequestInterface $request): ?ResponseInterface;
}
